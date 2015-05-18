<?php
/*
!!!!!!! AFTER UPLOADING THE LUXCAL FILES/ AND FOLDERS TO YOUR SERVER,   !!!!!!!
!!!!!!! THIS SCRIPT WILL RUN AUTOMATICALLY WHEN STARTING THE CALENDAR. !!!!!!!
!!!!!!! YOU MAY ALSO LAUNCH THIS SCRIPT VIA YOUR BROWSER AT ANY TIME.  !!!!!!!

© Copyright 2009-2014 LuxSoft - www.LuxSoft.eu
*/

//functions
function getCals($dbPfix='') {
	$calendars = array();
	//get calendar IDs (prefixes)
	$rSet = dbQuery("SHOW TABLES LIKE '%settings'"); //get table names
	if (!mysql_num_rows($rSet)) { return $calendars; }
	if ($dbPfix) { $calendars[0] = $dbPfix; }
	while ($row = mysql_fetch_row($rSet)) {
		if (substr($row[0],-9,1) == '_') { //has prefix_
			if (substr($row[0],0,-9) != $dbPfix) { $calendars[] = substr($row[0],0,-9); }
		}
	}
	//Add calendar titles from settings table
	foreach ($calendars as $k => $v) {
		$rSet = dbQuery("SELECT value FROM {$v}_settings WHERE name = 'calendarTitle'");
		if (!$rSet) { continue; }
		$row = mysql_fetch_assoc($rSet);
		$curDef = ($k == $dbPfix) ? ' <span class="mark">(default)</span>' : '';
		$calendars[$k] .= '-'.stripslashes($row['value']).$curDef; //add title
	}
	return $calendars;
}

//heredocs
$instructions = <<<EOT
<aside class="aside">
<h4>Instructions</h4>
<p><u>When this installation script runs for the first time</u> . . .</p>
<p>after entering and testing the required data, it will install a calendar with 
ID 'mycal' and title 'My Web Calendar'.</p>
<p>After successful installation:</p>
<ul>
<li>the current LuxCal version number, the MySQL Database Credentials and the 
ID of the default calendar are stored in the file <kbd>lcconfig.php</kbd> in 
the calendar root folder</li>
<li>the default calendar settings are stored in the database table 
<kbd>settings</kbd></li>
<li>the Administrator data are used to create the user account for the calendar 
administrator</li>
</ul>
<p><u>When you launch this installation script a subsequent time</u> . . .</p>
<p>it will list the currently installed calendar(s). Now you can change, test 
and save the database and administrator data.</p>
<p>When saving the data:</p>
<ul>
<li>the calendar tables will be checked and missing tables will be created.</li>
<li>the current LuxCal version number, the MySQL Database Credentials and the 
ID of the default calendar are stored in the file <kbd>lcconfig.php</kbd> in 
the calendar root folder</li>
<li>the Administrator data are updated in the users table of each installed 
calendar.</li>
</ul>
<br>
<p>Note: The administrator data can be changed later by the calendar 
administrator for each individual calendar.</p>
<br>
<p><u>Description of form fields:</u></p>
<br>
<p><b>Database server</b></p>
<p>This is the name of the database server. This could for example be 
'localhost'.</p>
<br>
<p><b>Username</b>, <b>password</b> and <b>database name</b></p>
<p>These are the values used when you created the database on the server. If the 
entered values are incorrect, the installation script cannot create the calendar 
tables and the installation will fail.</p>
<br>
<p><b>Installed calendar(s)</b></p>
<p>List of the currently installed calendars in the database. For each calendar 
the calendar ID followed by the calendar title is displayed. The first calendar 
in the list is the default calendar.</p>
<br>
<p><b>administrator name</b>, <b>email</b> and <b>password</b></p>
<p>These values must be remembered. They will be required later to log in to the 
calendar.</p>
<p>When, in case of multiple calendars, the administrator name, email or 
password are changed, the values will be changed for all calendars.</p>
</aside>
EOT;

$saveOk = <<<EOT
<h4>Saving Data Successful</h4>
<ol>
<li>The calendar tables have been checked and completed if necessary.</li>
<li>The administrator data have been successfully updated in the admin user 
account of (each of) the calendar(s).</li>
<li>The LuxCal version number and the database credentials have been saved in 
the file <kbd>lcconfig.php</kbd> in the calendar's root folder.</li>
</ol>
<br>
<p><strong>Please note that it is good practice to directly . . .</strong></p>
<ul>
<li>back up the configuration file <kbd>lcconfig.php</kbd> in the root folder of 
the calendar</li>
<li>remove the files <kbd>installxxx.php</kbd> and <kbd>upgradexxx.php</kbd> 
from the calendar's root folder</li>
</ul>
<br>
<p>If needed, you can install/start the lctools.php file to further configure 
your calendar installation.</p>
EOT;

$installOk = <<<EOT
<h4>Installation Successful</h4>
<ol>
<li>The calendar has been created / configured successfully and the default 
calendar settings have been saved in the <kbd>settings</kbd> table of the / each 
calendar.</li>
<li>A user account for the 'public user' and for the 'administrator', with the 
specified administrator values, has been created in the <kbd>users</kbd> 
table.</li>
<li>The LuxCal version number and the database credentials have been saved in 
the file <kbd>lcconfig.php</kbd> in the calendar's root folder.</li>
</ol>
<br>
<p><strong>Please note that it is good practice to directly . . .</strong></p>
<ul>
<li>back up the configuration file <kbd>lcconfig.php</kbd> in the root folder of 
the calendar</li>
<li>remove the files <kbd>installxxx.php</kbd> and <kbd>upgradexxx.php</kbd> 
from the calendar's root folder</li>
<li>Log in to the / each calendar, go to the administration menu (top right) 
and:<br>
- on the Settings page set the TimeZone to your local time zone<br>
- on the Settings page choose your preferred settings<br>
- on the Categories page define a number of useful event categories</li>
<li>Protect the <kbd>emlists</kbd>, <kbd>files</kbd> and <kbd>logs</kbd> 
folders<br>
- for instance: add to these folders a <kbd>.htaccess</kbd> file with 'Options 
-Indexes'</li>
</ul>
EOT;

//sanity check
if (version_compare(PHP_VERSION,'5.1.0') < 0) { //check PHP version
	exit('<br><br><b>Wrong PHP version</b><br><br>You need version 5.1.0 or higher<br>Your current version is: '.PHP_VERSION);
}
foreach ($_REQUEST as $key => $value) { if (is_string($value)) $_REQUEST[$key] = htmlspecialchars(strip_tags(trim($value)),ENT_QUOTES,'UTF-8'); }

require_once './common/toolbox.php';
require './common/toolboxx.php'; //admin tools

//get current LuxCal version
$lcVersion = substr(basename(__FILE__),-7,-4);
$lcVersion = $lcVersion[0].'.'.$lcVersion[1].'.'.$lcVersion[2];

//init
$newCal = 'mycal - My Web Calendar';
$test = !empty($_POST['test']) ? true : false; //test configuration
$save = !empty($_POST['save']) ? true : false; //save db + admin data
$install = !empty($_POST['install']) ? true : false; //start installation
$dbHost = !empty($_POST['dbHost']) ? $_POST['dbHost'] : ''; //db host name
$dbUnam = !empty($_POST['dbUnam']) ? $_POST['dbUnam'] : ''; //db user name
$dbPwrd = !empty($_POST['dbPwrd']) ? $_POST['dbPwrd'] : ''; //db password
$dbName = !empty($_POST['dbName']) ? $_POST['dbName'] : ''; //db name
$adName = !empty($_POST['adName']) ? $_POST['adName'] : ''; //admin name
$adMail = !empty($_POST['adMail']) ? $_POST['adMail'] : ''; //admin email adddress
$adPwrd = !empty($_POST['adPwrd']) ? $_POST['adPwrd'] : ''; //admin password
$lcv = !empty($_POST['lcv']) ? $_POST['lcv'] : ''; //luxcal version
$adPwMd5 = !empty($_POST['adPwMd5']) ? $_POST['adPwMd5'] : ''; //md5 password
$dbPfix = !empty($_POST['dbPfix']) ? $_POST['dbPfix'] : ''; //db table prefix

//start PHP session (needed to be able to unset session variables later)
session_start();

//for session test
if (!$install and !$test) { //save session variables
	$_SESSION['lcSess1'] = 42; //create var 1
	$_SESSION['lcSess2'] = 'Einstein'; //create var 2
} else { //get session values
	$lcSess1 = (isset($_SESSION['lcSess1'])) ? $_SESSION['lcSess1'] : '';
	$lcSess2 = (isset($_SESSION['lcSess2'])) ? $_SESSION['lcSess2'] : '';
	$sessOk = ($lcSess1 == 42 and $lcSess2 == 'Einstein') ? 'OK' : 'Not OK';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>LuxCal Event Calendar - Installation</title>
<meta name="description" content="LuxCal web calendar - a LuxSoft product">
<meta name="keywords" content="LuxSoft, LuxCal, LuxCal web calendar">
<meta name="author" content="Roel Buining">
<meta name="robots" content="nofollow">
<link rel="icon" href="lcal.ico">
<style type="text/css">
header, footer, aside {display:block;}
* { padding:0; margin:0; }
body {font:11px arial, sans-serif; background:#E0E0E0; color:#2B3856; cursor:default;}
a {text-decoration:none; cursor:pointer;}
header {padding:0 1%;}
h3 {margin:8px 0; font-size:14pt;}
h4 {margin:6px 0; font-size:12pt;}
h5 {margin:2px 0; font-size:11pt;}
td {vertical-align:top;}
input {font:11px arial, sans-serif;}
input[type="text"] { width:240px; }
input[type="submit"], input[type="button"] { margin:0 15px; cursor:pointer; }
ul, ol {margin:0 20px;}
li {margin:5px 0;}
.flag {color:#FF3300;}
.navBar {
	width:98%;
	padding:0 1%;
	background:#AAAAFF;
	text-align:right;
	border-top:1px solid #808080;
	border-bottom:1px solid #808080;
	line-height:20px;
	vertical-align:middle;
}
.endBar {
	position:absolute; left:0; bottom:10px;
	width:98%;
	padding:0 1%;
	background:#AAAAFF;
	text-align:right;
	border-top:1px solid #808080;
	border-bottom:1px solid #808080;
	font-size:0.8em;
}
div.content {
	position:absolute; left:0; top:110px; right:0px; bottom:90px;
	padding:0 20px;
	overflow:auto;
}
.aside {width:40%; border:1px solid #808080; background:#FFFFFF; padding:15px; float:right; text-align:justify; }
.centerBox {display:table; margin:auto;}
.form {width:350px; border:1px solid #808080; background:#FFFFFF; padding:5px 15px; }
.resultBox {width:500px; border:1px solid #808080; background:#FFFFFF; padding:5px; text-align:justify; }
.bLine {position:absolute; left:0; bottom:50px; width:98%; text-align:center;}
.hilite {background:#F0A070;}
.lolite {background:#70C070;}
.mark {color:#AA0000;}
.error {margin:10px 0; background:#F0A070;}
.center {text-align:center;}
.footLB {font:italic bold 1.1em arial,sans-serif; color:#0033FF;}
.footLR {font:italic bold 1.1em arial,sans-serif; color:#AA0066;}
</style>
</head>

<body>
<header>
<h4>LuxCal Event Calendar</h4>
</header>
<?php
echo "<div class='navBar'>Your PHP version: ".PHP_VERSION.(($test or $save or $install) ? ' - Sessions: '.$sessOk : '')."</div>\n";
echo "<div class='content'>\n";
$errMsg = $okiMsg = array();
if ($test or $save or $install) {
	//check for missing/invalid fields
	$dbH = !$dbHost ? ' class="hilite"' : '';
	$dbU = !$dbUnam ? ' class="hilite"' : '';
	$dbP = !$dbPwrd ? ' class="hilite"' : '';
	$dbN = !$dbName ? ' class="hilite"' : '';
	$adN = !$adName ? ' class="hilite"' : '';
	$adE = (!$adMail or !preg_match($rxEmailX,trim($adMail))) ? ' class="hilite"' : '';
	$adP = !$adPwrd ? ' class="hilite"' : '';
	if ($dbH or $dbU or $dbP or $dbN or $adN or $adE or $adP) {
		$errMsg[] = "Error: Missing or invalid fields (highlighted)";
	} else {
		//connect to db server
		$dbLink = @mysql_connect($dbHost,$dbUnam,$dbPwrd);
		if (!$dbLink) {
			$errMsg[] = "Connecting to database server {$dbHost}<br>Check the database server, username and password\n";
		} else {
			$okiMsg[] = "Connecting to database server {$dbHost}\n";
			//select database
			$selected = mysql_select_db($dbName,$dbLink);
			if (!$selected) {
				$errMsg[] = "Selecting database {$dbName}<br>Check the database name\n";
			} else {
				$okiMsg[] = "Selecting database {$dbName}\n";
			}
		}
		//check file permissions before creating db tables
		if (file_put_contents('./lctest.dat','LuxCal') === false) { //write test file
			$errMsg[] = "Writing to the calendar's root folder<br>Check file permissions on your server\n";
		} else {
			unlink('./lctest.dat'); //delete test file
			$okiMsg[] = "Writing to the calendar's root folder\n";
		}
		if (file_put_contents('./files/lctest.dat','LuxCal') === false) { //write test file
			$errMsg[] = "Writing to the 'files' folder<br>Check file permissions on your server\n";
		} else {
			unlink('./files/lctest.dat'); //delete test file
			$okiMsg[] = "Writing to the 'files' folder\n";
		}
		//create empty mysql.log
		if (file_put_contents('./logs/mysql.log','') === false) {
			$errMsg[] = "Writing an empty mysql.log file to the 'logs' folder<br>Check file permissions on your server\n";
		} else {
			$okiMsg[] = "Writing an empty mysql.log file to the 'logs' folder\n";
		}
		//create empty luxcal.log
		if (file_put_contents('./logs/luxcal.log','') === false) {
			$errMsg[] = "Writing an empty luxcal.log file to the 'logs' folder<br>Check file permissions on your server\n";
		} else {
			$okiMsg[] = "Writing an empty luxcal.log file to the 'logs' folder\n";
		}
	}
}
if (($save or $install) and empty($errMsg)) {
	//prepare db data
	$calUrlBase = 'http://'.$_SERVER['SERVER_NAME'].rtrim(dirname($_SERVER["PHP_SELF"]),'/').'/';
	$calEmail = $adMail;
	$newAdPw = (trim($adPwrd) != '********');
	$adPwMd5 = $newAdPw ? md5($adPwrd) : $adPwMd5;
	$calendars = getCals($dbPfix);
	if (empty($calendars)) { $calendars[0] = $newCal; }
	$dbPfix = trim(substr($calendars[0],0,strpos($calendars[0],'-')));
	foreach ($calendars as $calendar) {
		//check / create calendar tables
		list($calID,$calTitle) = explode('-',$calendar);
		$calID = trim($calID);
		$calTitle = trim($calTitle);
		//if not present, create tables
		$tabEve = createDbTable('events',$calID);
		$tabCat = createDbTable('categories',$calID);
		$tabUse = createDbTable('users',$calID);
		$tabSet = createDbTable('settings',$calID);
		//insert initial data in cat, user and settings tables
		$catSaved = initCats($calID);
		$usrSaved = initUsers($calID,$adName,$adMail,$adPwMd5);
		$setSaved = true; //init
		if ($tabSet != '2') {
			$dbSet = array();
			$dbSet['calendarTitle'] = $calTitle;
			$dbSet['calendarUrl'] = $calUrlBase.'?cal='.$calID;
			$dbSet['calendarEmail'] = $calEmail;
			checkSettings($dbSet);
			$setSaved = saveSettings($calID,$dbSet,true);
		}
		if (!$tabEve or !$tabCat or !$tabUse or !$tabSet) {
			$errMsg[] = "Problem creating tables<br>Check your database permissions\n";
			break;
		}
		if (!$catSaved) {
			$errMsg[] = "Can not save init data to Categories table<br>Check your database permissions.\n";
			break;
		}
		if (!$usrSaved) {
			$errMsg[] = "Can not save init data to Users table<br>Check your database permissions.\n";
			break;
		}
		if (!$setSaved) {
			$errMsg[] = "Can not save default calendar settings in the Settings table. Check database permissions.</p>\n";
			break;
		}
	}
	//create session data table
	$tabSes = createDbTable('sessdata');
	if (!$tabSes) {
		$errMsg[] = "Can not create session data table<br>please check your database permissions\n";
	}
}
if ($save or $install and empty($errMsg)) {
	//Save LuxCal version and db credentials to lcconfig.php
	$lcconfig = '<?php
/*
= LuxCal event calendar configuration =

© Copyright 2009-2014 LuxSoft - www.LuxSoft.eu

This file is part of the LuxCal Web Calendar.
*/
$lcc="'.$lcVersion.'"; //current LuxCal version
$dbHost="'.$dbHost.'"; //MySQL server
$dbUnam="'.$dbUnam.'"; //database username
$dbPwrd="'.$dbPwrd.'"; //database password
$dbName="'.$dbName.'"; //database name
$dbPfix="'.$dbPfix.'"; //db table name prefix (default calendar)
?>';
	file_put_contents('./lcconfig.php',$lcconfig);
		
	session_unset(); //force retrieve of settings and selection of default calendar

	//installation successul
	echo "<div class='centerBox'>\n";
	echo "<h3 class='center'>Calendar Installation and Configuration</h3>\n<br><br>\n";
	echo "<div class='resultBox'>\n";
	echo ($save ? $saveOk : $installOk);
	echo "<br><div class='center'>\n";
	echo "<input type='button' onclick=\"window.location.href='{$_SERVER["PHP_SELF"]}'\" value='back to install'>\n";
	if (file_exists('./lctools.php')) {
		echo "<input type='button' onclick=\"window.location.href='lctools.php'\" value='start tools'>\n";
	}
	echo "<input type='button' onclick=\"window.location.href='index.php'\" value='start calendar'>\n";
	echo "</div>\n</div>\n</div>\n";
	
} else { //display form

	$selected = false;
	if (!$test) {
		$dbHost = $dbUnam = $dbPwrd = $dbName = $adName = $adMail = $adPwMd5 = $adPwrd = $dbPfix = '';
		if (file_exists('./lcconfig.php')) {
			include './lcconfig.php'; //get database credentials
			$dbLink = mysql_connect ($dbHost,$dbUnam,$dbPwrd); //connect to db server
			if ($dbLink !== false) {
				$selected = mysql_select_db($dbName,$dbLink);
			}
		}
	}

	//initialize
	$calendars = array(0 => "None.");

	if ($selected) {
		//get installed calendars
		$calendars = getCals($dbPfix);
		//get admin user data
		$result = mysql_query("SELECT user_name, email, password FROM {$dbPfix}_users WHERE user_id = 2");
		if ($result !== false and mysql_num_rows($result) >= 1) {
			$row = mysql_fetch_assoc($result);
			$adName = stripslashes($row['user_name']);
			$adMail = stripslashes($row['email']);
			$adPwMd5 = stripslashes($row['password']);
			if ($adPwMd5) { $adPwrd = '********'; }
			mysql_close($dbLink);
		}
	}

	//display header
	echo $instructions;
	echo "<div class='centerBox'>\n";
	echo "<h3 class='center'>Calendar Installation and Configuration</h3><br><br>\n";
	if (!empty($errMsg)) {
		echo "<h5>Tests failed:</h5>\n";
		echo "<ul>\n";
		foreach ($errMsg as $msg) {
			echo "<li class='hilite'>{$msg}</li>\n";
		}
		echo "</ul>\n";
	}
	if (!empty($okiMsg)) {
		echo "<h5>Tests passed:</h5>\n";
		echo "<ul>\n";
		foreach ($okiMsg as $msg) {
			echo "<li class='lolite'>{$msg}</li>\n";
		}
		echo "</ul>\n";
	}
	echo "<br><p class='center'>Please complete this form to configure / install the LuxCal Event Calendar.\n";
	echo "<br>Select 'test' to validate the form fields and select 'save' to continue.</p>\n";
	
	//display form
	echo "<br>\n";
	echo "<form class='form' action= '".htmlentities($_SERVER['PHP_SELF'])."' method='post'>\n";
	echo "<input type='hidden' name='lcv' value='{$lcVersion}'>\n";
	echo "<input type='hidden' name='adPwMd5' value='{$adPwMd5}'>\n";
	echo "<input type='hidden' name='dbPfix' value='{$dbPfix}'>\n";
	echo "<h4 class='hilite center'>= read instructions =</h4>'\n";
	echo "<table>\n";
	echo "<tr><td colspan='2'><h5>MySQL Database</h5></td></tr>\n";
	echo "<tr><td>Server:</td><td><input type='text'{$dbH} name='dbHost' value='{$dbHost}'></td></tr>\n";
	echo "<tr><td>Username:</td><td><input type='text'{$dbU} name='dbUnam' value='{$dbUnam}'></td></tr>\n";
	echo "<tr><td>Password:</td><td><input type='text'{$dbP} name='dbPwrd' value='{$dbPwrd}'></td></tr>\n";
	echo "<tr><td>Database Name:</td><td><input type='text'{$dbN} name='dbName' value='{$dbName}'></td></tr>\n";
	echo "<tr><td>Installed calendar(s):<br>(calendar ID - Title)</td><td>".implode("<br>",$calendars)."</td></tr>\n";
	echo "<tr><td colspan='2'><br><h5>Administrator</h5></td></tr>\n";
	echo "<tr><td>Name:</td><td><input type='text'{$adN} name='adName' value='{$adName}'></td></tr>\n";
	echo "<tr><td>Email:</td><td><input type='text'{$adE} name='adMail' value='{$adMail}'></td></tr>\n";
	echo "<tr><td>Password:</td><td><input type='text'{$adP} name='adPwrd' value='{$adPwrd}'></td></tr>\n";
	echo "</table>\n";
	echo "<br>\n";
	echo "<div class='center'>\n";
	echo "<input type='submit' name='test' value='test'>\n";
	if (empty($calendars)) {
		echo "<input type='submit' name='install' value='install'>\n";
	} else {
		echo "<input type='submit' name='save' value='save'>\n";
	}
	echo "</div>\n";
	echo "</form>\n";
	echo "</div>\n";
}
?>
</div>
<div class="bLine mark"><h4>AFTER SUCCESSFUL INSTALLATION REMOVE THE FILE <?php echo basename(__FILE__); ?> FROM THE SERVER!</h4></div>
<div class="endBar">
	design 2014 - powered by <a href="http://www.luxsoft.eu"><span class="footLB">Lux</span><span class="footLR">Soft</span></a>
</div>
<br>&nbsp;
</body>
</html>
