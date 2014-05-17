/*
 * @package AJAX_Chat
 * @author Sebastian Tschan
 * @copyright (c) Sebastian Tschan
 * @license Modified MIT License
 * @link https://blueimp.net/ajax/
 */

// Overriding client side functionality:

/*
// Example - Overriding the replaceCustomCommands method:
ajaxChat.replaceCustomCommands = function(text, textParts) {
	return text;
}
 
  */
    // Override to add custom user menu items:
    // Return a string with list items ( <li>menuItem</li> )
    // encodedUserName contains the userName ready to be used for javascript links
    // userID is only available for the online users menu - not for the inline user menu
    // use (encodedUserName == this.encodedUserName) to check for the current user
ajaxChat.getCustomUserMenuItems = function(encodedUserName, userID) {
        return '<li><a href="javascript:ajaxChat.sendMessageWrapper(\'/afk \');">AFK</a></li>';
    }

ajaxChat.customInitialize = function() {
    ajaxChat.addChatBotMessageToChatList('Welcome to our chat!');
}
