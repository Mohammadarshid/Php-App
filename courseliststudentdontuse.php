<?php
ob_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Courselist</title>
<link href="css/tooplate_style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>

<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>

<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:15,
		animSpeed:500,
		pauseTime:3000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>
</head>
<body>
    <?php
    include './header.php';
    include './studentmenu.php';
    ?>
    <div id="tooplate_main_top"></div>        
    <div id="tooplate_main">
    	 <div class="col_w900 col_w900_last">
    		<div class="col_w580 float_l" style="height: 700px">
                    <div class="con_tit_01"><u>Course Catalogue</u></div>
                    <?php
                        require './connection.php';
                        $query="select b.ctgnm,a.coursenm,a.duration,a.fees,a.img1,a.courseid "
                                . "from course as a inner join category as b on a.ctgid=b.ctgid ";
                                //. "order by b.ctgnm,a.coursenm";
                        //echo $query;
                        $rs=  mysqli_query($link, $query);
                        $n=  mysqli_num_rows($rs);
                        if($n>0)
                        {
                    ?>
                    <table border="1" align="center">
                        <tr>
                            <th>Course category</th>
                            <th>Course Name</th>
                            <th>Duration</th>
                            <th>Fees</th>
                            <th>Course Image</th> 
                        </tr>
                        <?php
                        while($a=mysqli_fetch_array($rs))
                            {
                        ?>
                        <tr>
                            <td><?php echo $a[0];?></td>
                            <td><?php echo $a[1];?></td>
                            <td><?php echo $a[2];?></td>
                            <td><?php echo $a[3];?></td>
                            <td><img src="<?php echo $a['img1'];?>" height="80" width="160"><br>
                            <a href="coursedetail.php?courseid=<?php echo $a[5];?>">
                             </a></td>
                               
                        </tr>
                        <?php
                            }
                            
                        }
                        ?>
                    </table>
<div class="cleaner"></div>
           </div>
	</div>
        <div class="cleaner"></div>
    </div> <!-- end of main -->
<?php
include './footer.php';
?>
</body>
</html>
