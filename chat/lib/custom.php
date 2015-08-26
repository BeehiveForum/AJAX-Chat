<?php

/*======================================================================
Copyright Project Beehive Forum 2002

This file is part of Beehive Forum.

Beehive Forum is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

Beehive Forum is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Beehive; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307
USA
======================================================================*/

// Constant to define where the Beehive Forum include files are on the server
define('BH_INCLUDE_PATH', __DIR__ . '/../../../BeehiveForum/forum/include/');

// Constant to define where Beehive is relative to the current HTTP request
define('BH_FORUM_PATH', '../');

// Disable Beehive's CSRF check for AJAX-Chat
define('BH_DISABLE_CSRF', true);

// Beehive Forum bootstrap
require_once __DIR__ . '/../../../BeehiveForum/forum/boot.php';

// Get forum WEBTAG
$webtag = get_webtag();

// Check we have a webtag and have access to the specified forum
if (!forum_check_webtag_available($webtag, false) || !forum_check_access_level()) {
    $request_uri = rawurlencode(get_request_uri(false));
    header_redirect(BH_FORUM_PATH . "index.php?final_uri=forums.php%3Fwebtag_error%3D$webtag%26final_uri%3D$request_uri");
}

// Check AJAX chat functionality is enabled.
if (forum_get_global_setting('ajax_chat_enabled', 'N')) {
    header_redirect(BH_FORUM_PATH . "index.php?webtag=$webtag");
}