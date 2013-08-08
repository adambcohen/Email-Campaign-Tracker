<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title>Blast: Email Tracking Data</title>
  <link href="css/demo.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="javascript/jquery.js"></script>
  <script type="text/javascript" src="http://malsup.github.com/jquery.form.js"></script>
  <script type="text/javascript" src="javascript/jquery.expander.js"></script>
  <script type="text/javascript" src="javascript/custom.js"></script>
   <script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <?PHP
    print '<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          [\'Date\', \'Total Views\', \'Unique Views\']';
 include("mysql.php");
 $gid = $_GET['id'];
	$total_per_day = mysql_query("SELECT count(*) as nr, timestamp, count(DISTINCT email) as em  FROM $mysql_table WHERE id='$gid' AND type=1 GROUP BY FROM_UNIXTIME( timestamp, '%D %M %Y' ) ORDER BY timestamp");

 while($dateinfo = mysql_fetch_array( $total_per_day )) 
 { 
 echo ",\r\n";
 Print "['"; 
 $date = date('m/d/Y',$dateinfo['timestamp']);
 print $date;
 Print "', "; 
 $nr = $dateinfo['nr'];
 print $nr;
  Print ", "; 
 $em = $dateinfo['em'];
 print $em;
 Print "]"; 
 }
print '
        ]);

        var options = {
          title: \'Daily Breakdown\',
           hAxis: {title: \'Date\', titleTextStyle: {color: \'red\'}}
        
        };

        var chart = new google.visualization.ColumnChart(document.getElementById(\'chart_div\'));
        chart.draw(data, options);
      }
    </script>';
?>  <!-- CSS -->
<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="javascript/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="fancybox/jquery.fancybox.js?v=2.1.4"></script>
	<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox.css?v=2.1.4" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="fancybox/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript" src="fancybox/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="fancybox/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="fancybox/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="fancybox/helpers/jquery.fancybox-media.js?v=1.0.5"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			/*
			 *  Open manually
			 */

			$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});

			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});


		});
		
$(document).ready(function() {
    $("#gourl").submit(function() {
        $.fancybox.showLoading(); // start fancybox loading animation
        $.ajax({
            data: $(this).serialize(), // get the form data
            type: $(this).attr('method'), // GET or POST
            url: $(this).attr('action'), // the file to call
            success: function(response) { // on success..
                $.fancybox({ 'content' : response }); // target response to fancybox
            },
            complete: function() { // on complete...
                $.fancybox.hideLoading(); //stop fancybox loading animation
            }
        });
        return false; // stop default submit event propagation
    }); 

});
	</script>
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>

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
  <div align="right" style="padding-left:10px;padding-right:10px;float: right;">
<input id="toggleh21" type="submit" value="Show links" name="toggleh21">
<script>
  // basic show and hide
   $(document).ready(function() {
   $('div.showhide21').hide();
 });
 $(document).ready(function() {
   $('#hideh21').click( function() {
    $('div.showhide2').hide();
   });
   $('#showh21').click( function() {
    $('div.showhide21').show();
   });
   $('#toggleh21').click( function() {
    $('div.showhide21').toggle();
   });
 });
</script>
<div class="showhide21" style="padding-right:10px;padding-right:10px;text-align:right;">
<div align="right" style="width:100px;" >

<a href="adminblast.php">Homepage</a><br />
<?PHP
 $gid = $_GET['id'];
echo '<a href="adminviewdelete.php?id='.$gid.'">Delete Records</a>';
 ?>
</div>
</div>
</div>
<div id="chart_div" style="width: 600px; height: 200px; position: relative; float: right; padding-right:150px; padding-top:30px;"></div>
<?PHP

include("mysql.php");
if(isset($_GET['id']))
          {
          $gid = $_GET['id'];
            $gendata1 = mysql_query("SELECT * FROM $mysql_table2 WHERE id='$gid'") or die(mysql_error());
 			$data = mysql_query("SELECT * FROM $mysql_table WHERE id='$gid'") or die(mysql_error());

			$unique_email = mysql_query("SELECT COUNT(DISTINCT email) AS num FROM $mysql_table WHERE id='$gid' AND type=1") or die(mysql_error());
			$result = mysql_fetch_assoc( $unique_email );
			$forwardcount = mysql_query("SELECT COUNT(DISTINCT email) AS num FROM $mysql_table WHERE id='$gid' AND type=3") or die(mysql_error());
			$forwardresult = mysql_fetch_assoc( $forwardcount );
			$printcount = mysql_query("SELECT COUNT(DISTINCT email) AS num FROM $mysql_table WHERE id='$gid' AND type=4") or die(mysql_error());
			$printresult = mysql_fetch_assoc( $printcount );
			$linkcount = mysql_query("SELECT COUNT(DISTINCT email) AS num FROM $mysql_table WHERE id='$gid' AND type=2") or die(mysql_error());
			$linkresult = mysql_fetch_assoc( $linkcount );

		    $gendata = mysql_fetch_array( $gendata1 );
			$gendate = date('m/d/Y h:i:s A',$gendata['timestamp']);
			$unique_email2 = $result['num'];
			$forwardcount2 = $forwardresult['num'];
			$printcount2 = $printresult['num'];
			$linkcount2 = $linkresult['num'];
			$num_rows = mysql_num_rows($data);
 				Print "<h1>Tracking Data</h1>";
 				Print "<h2>Blast: ".$gendata['info']."</h2>";
 				Print "<h3>Created on ".$gendate."</h3>";
 				Print "<h3>Total Views: ".$num_rows."</h3>";
 				Print "<h3>Unique Views: ".$unique_email2."</h3>";
				Print "<h3>Unique Link Clicks: ".$linkcount2."</h3>";
  				Print "<h3>Times Forwarded: ".$forwardcount2."</h3>";
 				Print "<h3>Times Printed: ".$printcount2."</h3>";
				
 		 ?>
 		 
<div align="left" style="padding-left:10px">
<input id="toggleh1" type="submit" value="Show Link Information" name="toggleh1"></div>
<script>
  // basic show and hide
   $(document).ready(function() {
   $('div.showhide').hide();
 });
 $(document).ready(function() {
   $('#hideh1').click( function() {
    $('div.showhide').hide();
   });
   $('#showh1').click( function() {
    $('div.showhide').show();
   });
   $('#toggleh1').click( function() {
    $('div.showhide').toggle();
   });
 });
</script>
<div class="showhide">
<?PHP
	//build query
$query = $siteURL;
$query .= "em/t.php?e=%Email%&i=";
$query .= $gid;
$query .= "&t=";

echo "<h2>Link to copy</h2>";
echo "<h3>" . $query . "1</h3>";
echo "<h2>Image to copy into HTML editor mode</h2>";
echo "<h3><textarea id=\"text-to-copy\" cols=\"100\" rows=\"20\"><style>
/* Print stylesheet */
@media print {
    #_t { 
        background-image:url('". $query . "4');
    }
}
/* Forward stylesheet */
div.OutlookMessageHeader, table.moz-email-headers-table, blockquote #_t {
    background-image:url('". $query . "3');
}
</style>

<!-- MemberID: %Field:MemberID% --> 
<!-- Email: %Email% -->
 
<!-- Extra DIV -->
<div id=\"_t\"></div><img src=\"". $query . "1\" height=\"1\" width=\"1\"></textarea></h3><br />";
?>
</div>
<div align="left" style="padding-left:10px">
<input id="toggleh2" type="submit" value="Show Tracking Link Builder" name="toggleh2"></div>
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
<div class="showhide2">
<div align="left" style="padding-left:10px">
<br />

<?PHP
$query2 = $siteURL;
$query2 .= "em/r.php?e=%Email%&i=";
$query2 .= $gid;
$query2 .= "&t=2&u=";

Print '
<form name="gourl" id="gourl" action="creater.php" method="post">
URL: <input type="text" id="url" name="url"><br>
<input type="hidden" id="urlbuild" name="urlbuild" value="'.$query2.'">
<input type="submit" value="Submit" />
</form>
';  
?>
</div>
</div>
</div>
<?PHP		
 				
 				
 				
  				Print "<br />";
  			//	Print "<button onclick=\"fdTableSort.jsWrapper('test1', [0,1])\" name=\"b1\" type=\"button\">Sort Date Time</button>";
 				Print "<table id=\"test1\" class=\"sortable-onload-0 rowstyle-alt no-arrow paginate-25 max-pages-8 paginationcallback-callbackTest-calculateTotalRating sortcompletecallback-callbackTest-calculateTotalRating\" border=\"0\" cellpadding=\"0\">"; 
 				Print "<thead><tr>"; 
 				Print "<th class=\"sortable-sortEnglishDateTime fd-column-0 forwardSort\"><a title=\"Sort on Date\" href=\"#\">Date:</a></th>"; 
 				Print "<th class=\"sortable-numeric fd-column-1\"><a title=\"Sort on Time\" href=\"#\">Time:</a></th>"; 
 				Print "<th class=\"sortable-text reverseSort fd-column-2\"><a title=\"Sort on Email\" href=\"#\">Email:</a></th>"; 
 				Print "<th class=\"sortable-sortIPAddress fd-column-3\"><a title=\"Sort on IP\" href=\"#\">IP:</a></th>"; 
 				Print "<th>Browser:</th></tr></thead>"; 
 				
 				
 while($info = mysql_fetch_array( $data )) 
 { 
 Print "<tr>"; 
 $date = date('m/d/Y',$info['timestamp']);
 $time = date('H:i:s',$info['timestamp']);
 Print "<td>".$date."</td> "; 
 Print "<td>".$time."</td> "; 
 Print "<td>".stripslashes($info['email']). "</td> "; 
 Print "<td>".$info['ip'] . "</td> "; 
 Print "<td><div class=\"expandable\"><p style=\"line-height:9px;\">".$info['browser'] . " </p></div></td></tr>";
 }
 Print "</table>"; 
 ?>
<script type="text/javascript" src="javascript/tablesort.js"></script>
<script type="text/javascript" src="javascript/paginate.js"></script>
<script type="text/javascript" src="javascript/customsort.js"></script>
<?PHP 
 }else{
 print "No ID";
 }
 ?> 

</body></html>