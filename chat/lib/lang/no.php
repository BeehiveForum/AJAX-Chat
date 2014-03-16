<?php
/*
 * @package AJAX_Chat
 * @author Sebastian Tschan
 * @author DagArneKirkerod
 * @copyright (c) Sebastian Tschan
 * @license Modified MIT License
 * @link https://blueimp.net/ajax/
 */

$lang = array();
$lang['title'] = 'AJAX Chat';
$lang['userName'] = 'Brukernavn';
$lang['password'] = 'Passord';
$lang['login'] = 'Logg inn';
$lang['logout'] = 'Logg ut';
$lang['channel'] = 'Kanal';
$lang['style'] = 'Stil';
$lang['language'] = 'Språk';
$lang['inputLineBreak'] = 'Press SHIFT+ENTER to input a line break';
$lang['messageSubmit'] = 'Send';
$lang['registeredUsers'] = 'Registrerte Brukere';
$lang['onlineUsers'] = 'Påloggede brukere';
$lang['toggleAutoScroll'] = 'Autoscroll on/off';
$lang['toggleAudio'] = 'Sound on/off';
$lang['toggleHelp'] = 'Show/hide help';
$lang['toggleSettings'] = 'Show/hide settings';
$lang['toggleOnlineList'] = 'Show/hide online list';
$lang['bbCodeLabelBold'] = 'b';
$lang['bbCodeLabelItalic'] = 'i';
$lang['bbCodeLabelUnderline'] = 'u';
$lang['bbCodeLabelQuote'] = 'Siter';
$lang['bbCodeLabelCode'] = 'Kode';
$lang['bbCodeLabelURL'] = 'URL';
$lang['bbCodeLabelImg'] = 'Image';
$lang['bbCodeLabelColor'] = 'Tekst Farge';
$lang['bbCodeTitleBold'] = 'Fet tekst: [b]tekst[/b]';
$lang['bbCodeTitleItalic'] = 'Kursiv tekst: [i]tekst[/i]';
$lang['bbCodeTitleUnderline'] = 'Understrek tekst: [u]tekst[/u]';
$lang['bbCodeTitleQuote'] = 'Siter tekst: [quote]tekst[/quote] or [quote=author]tekst[/quote]';
$lang['bbCodeTitleCode'] = 'Vis kode: [code]code[/code]';
$lang['bbCodeTitleURL'] = 'Legg til url: [url]http://example.org[/url] or [url=http://example.org]text[/url]';
$lang['bbCodeTitleImg'] = 'Insert image: [img]http://example.org/image.jpg[/img]';
$lang['bbCodeTitleColor'] = 'Tekst farge: [color=red]text[/color]';
$lang['help'] = 'Hjelp';
$lang['helpItemDescJoin'] = 'Delta i en kanal:';
$lang['helpItemCodeJoin'] = '/Join kanalnavn';
$lang['helpItemDescJoinCreate'] = 'Lag et privat rom (Bare Registrerte Brukere):';
$lang['helpItemCodeJoinCreate'] = '/Join';
$lang['helpItemDescInvite'] = 'Inviter noen (for eksempel til et privat rom):';
$lang['helpItemCodeInvite'] = '/invite brukernavn';
$lang['helpItemDescUninvite'] = 'Opphev invitasjon:';
$lang['helpItemCodeUninvite'] = '/uninvite brukernavn';
$lang['helpItemDescLogout'] = 'Logg ut fra Chat:';
$lang['helpItemCodeLogout'] = '/quit';
$lang['helpItemDescPrivateMessage'] = 'Privat melding:';
$lang['helpItemCodePrivateMessage'] = '/msg brukernavn tekst';
$lang['helpItemDescQueryOpen'] = 'Åpne en privat kanal:';
$lang['helpItemCodeQueryOpen'] = '/query brukernavn';
$lang['helpItemDescQueryClose'] = 'Lukk en privat kanal:';
$lang['helpItemCodeQueryClose'] = '/query';
$lang['helpItemDescAction'] = 'Beskriv handling:';
$lang['helpItemCodeAction'] = '/action tekst';
$lang['helpItemDescDescribe'] = 'Beskriv handling i privat melding:';
$lang['helpItemCodeDescribe'] = '/describe brukernavn tekst';
$lang['helpItemDescIgnore'] = 'Ignorer/aksepter meldinger fra bruker:';
$lang['helpItemCodeIgnore'] = '/ignore brukernavn';
$lang['helpItemDescIgnoreList'] = 'Liste med ignorerte brukere:';
$lang['helpItemCodeIgnoreList'] = '/ignore';
$lang['helpItemDescWhereis'] = 'Display user channel:';
$lang['helpItemCodeWhereis'] = '/whereis Username';
$lang['helpItemDescKick'] = 'Spark ut en bruker (bare Moderatorer):';
$lang['helpItemCodeKick'] = '/kick brukernavn [minutter]';
$lang['helpItemDescUnban'] = 'Ta inn en utsparket bruker (bare Moderatorer):';
$lang['helpItemCodeUnban'] = '/unban brukernavn';
$lang['helpItemDescBans'] = 'Liste med utsparkede brukere (bare Moderatorer):';
$lang['helpItemCodeBans'] = '/bans';
$lang['helpItemDescWhois'] = 'Vis bruker IP (bare Moderatorer):';
$lang['helpItemCodeWhois'] = '/whois brukernavn';
$lang['helpItemDescWho'] = 'Vis påloggede brukere:';
$lang['helpItemCodeWho'] = '/who [kanalnavn]';
$lang['helpItemDescList'] = 'Vis tilgjenglige kanaler:';
$lang['helpItemCodeList'] = '/list';
$lang['helpItemDescRoll'] = 'Rull terning:';
$lang['helpItemCodeRoll'] = '/roll [nummer]d[sider]';
$lang['helpItemDescNick'] = 'Change username:';
$lang['helpItemCodeNick'] = '/nick Username';
$lang['settings'] = 'Settings';
$lang['settingsBBCode'] = 'Enable BBCode:';
$lang['settingsBBCodeImages'] = 'Enable image BBCode:';
$lang['settingsBBCodeColors'] = 'Enable font color BBCode:';
$lang['settingsHyperLinks'] = 'Enable hyperlinks:';
$lang['settingsLineBreaks'] = 'Enable line breaks:';
$lang['settingsEmoticons'] = 'Enable emoticons:';
$lang['settingsAutoFocus'] = 'Automatically set the focus on the input field:';
$lang['settingsMaxMessages'] = 'Maximum number of messages in the chatlist:';
$lang['settingsWordWrap'] = 'Enable wrapping of long words:';
$lang['settingsMaxWordLength'] = 'Maximum length of a word before it gets wrapped:';
$lang['settingsDateFormat'] = 'Format of date and time display:';
$lang['settingsPersistFontColor'] = 'Persist font color:';
$lang['settingsAudioVolume'] = 'Sound Volume:';
$lang['settingsSoundReceive'] = 'Sound for incoming messages:';
$lang['settingsSoundSend'] = 'Sound for outgoing messages:';
$lang['settingsSoundEnter'] = 'Sound for login and channel enter messages:';
$lang['settingsSoundLeave'] = 'Sound for logout and channel leave messages:';
$lang['settingsSoundChatBot'] = 'Sound for chatbot messages:';
$lang['settingsSoundError'] = 'Sound for error messages:';
$lang['settingsSoundPrivate'] = 'Sound for private messages:';
$lang['settingsBlink'] = 'Blink window title on new messages:';
$lang['settingsBlinkInterval'] = 'Blink interval in milliseconds:';
$lang['settingsBlinkIntervalNumber'] = 'Number of blink intervals:';
$lang['playSelectedSound'] = 'Play selected sound';
$lang['requiresJavaScript'] = 'JavaScript trengs for denne chat.';
$lang['errorInvalidUser'] = 'Ugyldig brukernavn.';
$lang['errorUserInUse'] = 'Brukernavn er i bruk.';
$lang['errorBanned'] = 'Bruker eller IP er utsparket.';
$lang['errorMaxUsersLoggedIn'] = 'Chatten har nådd maksimalt antall innloggede brukere.';
$lang['errorChatClosed'] = 'Chatten er for øyeblikket stengt .';
$lang['logsTitle'] = 'AJAX Chat - Logger';
$lang['logsDate'] = 'Dato';
$lang['logsTime'] = 'Tid';
$lang['logsSearch'] = 'Søk';
$lang['logsPrivateChannels'] = 'Private Kanaler';
$lang['logsPrivateMessages'] = 'Private Meldinger';
