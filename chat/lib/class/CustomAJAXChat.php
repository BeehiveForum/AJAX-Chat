<?php

/*
 * @package AJAX_Chat
 * @author Sebastian Tschan
 * @copyright (c) Sebastian Tschan
 * @license Modified MIT License
 * @link https://blueimp.net/ajax/
 *
 * Beehive Forum integration:
 * http://www.beehiveforum.net/
 */

class CustomAJAXChat extends AJAXChat
{
    // Void the built-in AJAX-Chat startSession method.
    // Beehive handles the sessions itself internally.
    public function startSession()
    {
    }

    // Void the built-in AJAX-Chat destroySession method.
    // Beehive handles the sessions itself internally.
    public function destroySession()
    {
    }

    // Void the built-in AJAX-Chat regenerateSessionID method.
    // Beehive handles the sessions itself internally.
    public function regenerateSessionID()
    {
    }

    // Initialize custom configuration settings
    public function initCustomConfig()
    {
        // Use the existing Beehive Forum database connection:
        $this->setConfig('dbConnection', 'link', db::get());
    }

    // Initialize custom request variables:
    public function initCustomRequestVars()
    {
        // Auto-login Beehive Forum users:
        if (!$this->getRequestVar('logout') && session::logged_in()) {
            $this->setRequestVar('login', true);
        }
    }

    // Replace custom template tags:
    public function replaceCustomTemplateTags($tag, $tagContent)
    {
        switch ($tag) {

            case 'FORUM_LOGIN_URL':

                if (session::logged_in()) {
                    return ($this->getRequestVar('view') == 'logs') ? './?view=logs' : './';
                } else {
                    return BH_FORUM_PATH. 'logon.php';
                }

            case 'REDIRECT_URL':
                if (session::logged_in()) {
                    return '';
                } else {
                    return $this->htmlEncode($this->getRequestVar('view') == 'logs' ? $this->getChatURL() . '?view=logs' : $this->getChatURL());
                }

            default:
                return null;
        }
    }

    // Returns true if the userID of the logged in user is identical to the userID of the authentication system
    // or the user is authenticated as guest in the chat and the authentication system
    public function revalidateUserID()
    {
        if ($this->getUserRole() === AJAX_CHAT_GUEST && !session::logged_in() || ($this->getUserID() == $_SESSION['UID'])) {
            return true;
        }
        return false;
    }

    // Returns an associative array containing userName, userID and userRole
    // Returns null if login is invalid
    public function getValidLoginUserData()
    {
        // Check if we have a valid registered user:
        if (session::logged_in()) {

            $userData = array();

            $userData['userID'] = $_SESSION['UID'];

            $userData['userName'] = $this->trimUserName($_SESSION['LOGON']);

            // Take the userrole from the Beehive Forum user permissions
            if (perm_has_admin_access($_SESSION['UID']))
                $userData['userRole'] = AJAX_CHAT_ADMIN;
            else if (perm_is_moderator($_SESSION['UID']))
                $userData['userRole'] = AJAX_CHAT_MODERATOR;
            else
                $userData['userRole'] = AJAX_CHAT_USER;

            return $userData;

        } else {
            // Guest users:
            return $this->getGuestUser();
        }
    }

    // Store the channels the current user has access to
    // Make sure channel names don't contain any whitespace
    public function &getChannels()
    {
        if ($this->_channels === null) {

            $this->_channels = array();

            $sql = sprintf(
                "SELECT FORUMS.FID,
                        FORUMS.ACCESS_LEVEL,
                        FORUMS.DEFAULT_FORUM,
                        FORUMS.WEBTAG,
                        FORUM_SETTINGS.SVALUE AS FORUM_NAME,
                        FORUMS.FORUM_PASSWD
                   FROM FORUMS
             INNER JOIN FORUM_SETTINGS ON (FORUM_SETTINGS.FID = FORUMS.FID AND FORUM_SETTINGS.SNAME = 'forum_name')
              LEFT JOIN USER_FORUM ON (USER_FORUM.FID = FORUMS.FID AND USER_FORUM.UID = %d)
                  WHERE FORUMS.ACCESS_LEVEL = 0
                     OR FORUMS.ACCESS_LEVEL = 2
                     OR (FORUMS.ACCESS_LEVEL = 1 AND USER_FORUM.ALLOWED = 1)",
                $this->db->makeSafe($_SESSION['UID'])
            );

            $result = $this->db->sqlQuery($sql);

            if ($result->numRows() > 0) {

                while ($row = $result->fetch()) {

                    $forum_name = $this->trimChannelName($row['FORUM_NAME']);

                    if ($row['DEFAULT_FORUM'] == 1) {

                        $this->setConfig('defaultChannelID', null, $row['FID']);
                        $this->setConfig('defaultChannelName', null, $forum_name);
                    }

                    if (($row['ACCESS_LEVEL'] == FORUM_PASSWD_PROTECTED)) {

                        if ($_SESSION["{$row['WEBTAG']}_PASSWORD"] == $row['FORUM_PASSWD']) {
                            $this->_channels[$forum_name] = $row['FID'];
                        }

                    } else {

                        $this->_channels[$forum_name] = $row['FID'];
                    }
                }
            }
        }

        return $this->_channels;
    }

    // Store all existing channels
    // Make sure channel names don't contain any whitespace
    public function &getAllChannels()
    {
        if ($this->_allChannels === null) {

            $this->_allChannels = array();

            $sql = "SELECT FORUMS.FID,
                           FORUMS.WEBTAG,
                           FORUMS.DEFAULT_FORUM,
                           FORUM_SETTINGS.SVALUE AS FORUM_NAME
                      FROM FORUMS
                INNER JOIN FORUM_SETTINGS ON (FORUM_SETTINGS.FID = FORUMS.FID AND FORUM_SETTINGS.SNAME = 'forum_name')
                  ORDER BY DEFAULT_FORUM DESC,
                           FORUM_NAME ASC";

            $result = $this->db->sqlQuery($sql);

            if ($result->numRows() > 0) {

                while ($row = $result->fetch()) {

                    $forum_name = $this->trimChannelName($row['FORUM_NAME']);

                    if ($row['DEFAULT_FORUM'] == 1) {

                        $this->setConfig('defaultChannelID', null, $row['FID']);
                        $this->setConfig('defaultChannelName', null, $forum_name);
                    }

                    $this->_allChannels[$forum_name] = $row['FID'];
                }
            }
        }

        return $this->_allChannels;
    }
}
