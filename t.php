<?PHP


 if(isset($_GET['e']))
        {
$imageFile = 'transparent.gif';
$im = imagecreatefromgif($imageFile);
header('Content-type: image/gif');
imagegif($im);
imagedestroy($im);

// get vars from link.
$email = $_GET['e'];
$id = $_GET['i'];
$type = $_GET['t'];

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
$ip = $_SERVER["REMOTE_ADDR"];
$browser = $_SERVER["HTTP_USER_AGENT"];
$random = rand(1000, 10000000);
$uidbuild = "$random.$time";
$uid = $uidbuild;


// $logMsg .= "  |  ".$emailaccount." | ".$subject." | ".$_SERVER["REMOTE_ADDR"]." | ".$_SERVER["HTTP_USER_AGENT"]." | ".$_SERVER["HTTP_REFERER"]."</br> \r\n";
// connecting DB
include("mysql.php");

// Escape User Input to help prevent SQL Injection
// $email = mysql_real_escape_string($email1);
// $id = mysql_real_escape_string($id1);
// $type = mysql_real_escape_string($type1);

mysql_query("INSERT INTO $mysql_table (uid, timestamp, id, type, email, ip, browser) VALUES ('$uid','$time','$id','$type','$email','$ip','$browser')") or die(mysql_error());

}else{
// $imageFile = 'transparent.gif';
// $im = imagecreatefromgif($imageFile);
// header('Content-type: image/gif');
// imagegif($im);
//imagedestroy($im);
print "Sorry";
} 

?>
