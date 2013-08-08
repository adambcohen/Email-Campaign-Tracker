<?php

	// Retrieve data from Query String
$user = $_GET['user'];
$info = $_GET['info'];

	// Escape User Input to help prevent SQL Injection
include('mysql.php');
// $user = mysql_real_escape_string($user);
// $info = mysql_real_escape_string($info);

// function to offset timezone to display NYC
function get_timezone_offset($remote_tz, $origin_tz = null) {
    if($origin_tz === null) {
        if(!is_string($origin_tz = date_default_timezone_get())) {
            return false; // A UTC timestamp was returned -- bail out!
        }
    }
    $origin_dtz = new DateTimeZone($origin_tz);
    $remote_dtz = new DateTimeZone($remote_tz);
    $origin_dt = new DateTime("now", $origin_dtz);
    $remote_dt = new DateTime("now", $remote_dtz);
    $offset = $origin_dtz->getOffset($origin_dt) - $remote_dtz->getOffset($remote_dt);
    return $offset;
}
$offset = get_timezone_offset('America/Los_Angeles','America/New_York'); 


// More Vars for building links out
$time = time() + $offset;

$random = rand(1000, 10000000);
$uidbuild = $random."_".$time;
$uid = "$uidbuild";

$type = "1";
mysql_query("INSERT INTO $mysql_table2 (uid, timestamp, id, type, info, user) VALUES ('$uid','$time','$uid','$type','$info','$user')") or die(mysql_error());


	//build query
$query = $siteURL;
$query .= "em/t.php?e=%Email%&i=";
$query .= $uid;
$query .= "&t=";

echo "<h2>Link to copy</h2>";
echo "<h3>" . $query . "1</h3>";
echo "<h2>Image to copy into HTML editor mode</h2>";
echo "<h3><textarea id=\"text-to-copy\" cols=\"100\" rows=\"20\"><style>
/* Print stylesheet */
@media print{
    #_t { 
        background-image: url('". $query . "4');
    }
}
/* Forward stylesheet */
div.OutlookMessageHeader, table.moz-email-headers-table, blockquote #_t {
    background-image:url('". $query . "3')
}
</style>

<!-- MemberID: %Field:MemberID% --> 
<!-- Email: %Email% -->
 
<!-- Extra DIV -->
<div id=\"_t\"></div><img src=\"". $query . "1\" height=\"1\" width=\"1\"></textarea></h3><br />";
echo "<h2><a href=\"adminview.php?id=".$uid."\" target=\"_blank\">Create a URL redirect in email</a></h2>"; 
?>