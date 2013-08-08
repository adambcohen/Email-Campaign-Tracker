<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en" xml:lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Blast: Admin Delete Page</title>
  <link href="css/demo.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="javascript/tablesort.js"></script>
<script type="text/javascript" src="javascript/paginate.js"></script>
  <script type="text/javascript" src="javascript/jquery.js"></script>

<!--[if IE]>
<style type="text/css">
ul.fdtablePaginater {display:inline-block;}
ul.fdtablePaginater {display:inline;}
ul.fdtablePaginater li {float:left;}
ul.fdtablePaginater {text-align:center;}
table { border-bottom:1px solid #C1DAD7; }
</style>
<![endif]-->

<script type="text/javascript">
//<![CDATA[
/*
        The following function simulates a filter being ran on the table data (of course, it's a fake and
        no real filtering is actually achievied).
        
        Quite simply, it sets random rows to have the class "invisibleRow", which is the className
        the pagination script expects to see on a TR whenever a/your bespoke table filter weeds out rows.
*/
function simulateFilter() {
        var trs = document.getElementById("theTable").getElementsByTagName("tbody")[0].rows;
        for(var i = 0, tr; tr = trs[i]; i++) {
                if(Math.floor(Math.random()*3) > 1) {
                        if(tr.className.search("invisibleRow") == -1) {
                                tr.className += (tr.className ? " " : "") + "invisibleRow";
                        };
                };
        };
        // Recall the paginater's init method to redraw the correct pagination list by passing in the table's ID...
        // If no ID is passed, all pagination lists for all tables are recalculated.
        tablePaginater.init("theTable");
};

function resetTable() {
        var trs = document.getElementById("theTable").getElementsByTagName("tbody")[0].getElementsByTagName("tr");
        for(var i = 0, tr; tr = trs[i]; i++) {
                tr.className = tr.className.replace("invisibleRow", "");
        };
        // Recall the paginater's init method to redraw the correct pagination list by passing in the table's ID...
        // If no ID is passed, all pagination lists for all tables are recalculated.
        tablePaginater.init("theTable");
};
//]]>
</script>
</head>
<body>
<script language="JavaScript">  
function toggle(source) {
  checkboxes = document.getElementsByName('chkDel[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
function onDelete()  
{  
	if(confirm('Do you want to delete ?')==true)  
	{  
		return true;  
	}  
	else  
	{  
		return false;  
	}  
}  
</script>
  <div align="right" style="padding-left:10px;padding-right:10px;float: right;">
<input id="toggleh2" type="submit" value="Show links" name="toggleh2">
<script>
  // basic show and hide
   $(document).ready(function() {
   $('div.showhide2').hide();
 });
 $(document).ready(function() {
   $('#hideh2').click( function() {
    $('div.showhide2').hide();
   });
   $('#showh2').click( function() {
    $('div.showhide2').show();
   });
   $('#toggleh2').click( function() {
    $('div.showhide2').toggle();
   });
 });
</script>
<div class="showhide21" style="padding-right:10px;padding-right:10px;text-align:right;">
<div align="right" style="width:100px;" >

<a href="adminblast.php">Homepage</a>
</div>
</div>
</div>
<?PHP

include("mysql.php");


            $gendata1 = mysql_query("SELECT * FROM $mysql_table2") or die(mysql_error());
 			$gendate = date('m/d/Y h:i:s A',$gendata['timestamp']);
	
 				Print "<h1>Prior Blasts</h1>";
 				Print "<h3><a href=\"adminblastimagegen.php\" target=\"_blank\">Create New Email Blast</a></h3>";
 /*		
 add form buttons		  
Print "<form action=\"\" method=\"post\" onsubmit=\"return false;\"><p>
      <button onclick=\"simulateFilter();\">Simulate Table Filter</button>
      <button onclick=\"resetTable();\">Reset Table</button>
    </p>
  </form>";
*/
  				Print "<br />";
  				Print "<button onclick=\"fdTableSort.jsWrapper('theTable', [0,1])\" name=\"b1\" type=\"button\">Sort Date Time</button>";

 				Print "<form name=\"form1\" method=\"post\" action=\"\" OnSubmit=\"return onDelete();\"><table id=\"theTable\" class=\"sortable-onload-0-reverse rowstyle-alt no-arrow paginate-25 max-pages-7 paginationcallback-callbackTest-calculateTotalRating sortcompletecallback-callbackTest-calculateTotalRating\" 
 				border=\"0\" cellpadding=\"0\">"; 
 				Print "<thead><tr>"; 
 				Print "<th class=\"sortable-sortable-sortEnglishDateTime fd-column-0\"><a title=\"Sort on Date\" href=\"#\">Date:</a></th>"; 
 				Print "<th class=\"sortable-sortByTwelveHourTimestamp fd-column-1\"><a title=\"Sort on Time\" href=\"#\">Time:</a></th>"; 
 				Print "<th class=\"sortable-text\"><a title=\"Sort on Subject\" href=\"#\">Subject:</a></th>"; 
 				Print "<th>User:</th>";
 				Print "<th class=\"sortable-numeric\"><a title=\"Sort on Total Views\" href=\"#\">Total Views:</a></th>";  
 				Print "<th class=\"sortable-numeric\"><a title=\"Sort on Unique Views\" href=\"#\">Unique Views:</a></th>";  
// taken out because it didnt limit to 25. 				Print "<th>Delete:<br/><input id=\"CheckAll\" onClick=\"toggle(this)\" type=\"checkbox\" /></a></th>";  
 				Print "<th>Delete:</th>";  
 				Print "</tr></thead>"; 
 				
 				
 while($gendata = mysql_fetch_array( $gendata1 )) 
 { 
 Print "<tr>"; 
 $date = date('m/d/Y',$gendata['timestamp']);
 $time = date('g:i:s a',$gendata['timestamp']);

 Print "<td>".$date."</td> "; 
 Print "<td>".$time."</td> "; 
 Print "<td><a href=\"adminview.php?id=".$gendata['uid']."\" target=\"_blank\">".stripslashes($gendata['info']). "</a></td> "; 
 Print "<td>".$gendata['user'] . " </td>";
 $uniqueID = $gendata['uid'];
 $unique_data = mysql_query("SELECT * FROM $mysql_table WHERE `id` = '$uniqueID'") or die(mysql_error());
 
$unique_email = mysql_query("SELECT COUNT(DISTINCT email) AS num FROM $mysql_table WHERE `id` = '$uniqueID'") or die(mysql_error());
$unique_email_result = mysql_fetch_assoc($unique_email);
$unique_emailcount = $unique_email_result['num'];
 
 
 $num_rows = mysql_num_rows($unique_data);
 Print "<td>".$num_rows."</td>";
 Print "<td>".$unique_emailcount."</td>";
 Print "<td><input type=\"checkbox\" name=\"chkDel[]\"  value=\"".$gendata['uid']."\"></td></tr>";

  }
  Print ' <tfoot>
<td colspan="7" align="right" bgcolor="#FFFFFF"><input name="delete" type="submit" id="delete" value="Delete"></td>
</tfoot>';
 Print "</table></form>"; 

 ?> 
<?php
if(isset($_POST['delete']))
	{
	include("mysql.php");
		 $chkDel = $_POST['chkDel'];
			foreach($chkDel as $id_to_delete){
				//$sql  = "DELETE FROM `$mysql_table`  WHERE `id`='$id_to_delete'";
				// $sql2 = "DELETE FROM `$mysql_table2` WHERE `id`='$id_to_delete'";
			$sql = "DELETE `$mysql_table`, `$mysql_table2` FROM `$mysql_table` RIGHT JOIN `$mysql_table2` ON `$mysql_table2`.`uid` = `$mysql_table`.`id` WHERE `$mysql_table2`.`uid`='$id_to_delete'";
			mysql_query($sql);
}
mysql_close();
echo "<meta http-equiv='refresh' content='0;url=".$siteURL."em/admindelete.php'>";
}

?>
</body></html>