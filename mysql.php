 <?php 
 mysql_connect("HOST", "USER", "PASSWORD") or die(mysql_error()); 
 mysql_select_db("DATABASE") or die(mysql_error()); 
 
 $mysql_table = 'trckr_data';
 $mysql_table2 = 'trckr_gen';

  
  $siteURL = "http://SITEURL.com/";
 ?> 