<?php
ob_start();
include './pagination.php';
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
    include './adminmenu.php';
    ?>
<div id="tooplate_main_top"></div>        
    <div id="tooplate_main">
    	 <div class="col_w900 col_w900_last">
    		<div class="col_w580 float_l" style="height: 400px">
                    <div class="con_tit_01"><u>Course Catalogue</u></div>
                    <div class="container">
    <div class="row">
    <div class="col-lg-2">
    </div>
    <div class="col-lg-8">
                        <table border="2">
                            <tr>
                                <th>Course Category</th>
                                <th>Course Name</th>
                                <th>Duration</th>
                                <th>Fees</th>
                                <th>Course Image</th>
                                <th>Option</th>
                            </tr>
                    <?php                    
                        while($a=  mysqli_fetch_array($nquery))
                        {
                         ?>
                            <tr>
                                <td><?php echo $a[0]; ?></td>
                                <td><?php echo $a['coursenm']; ?></td>
                                <td><?php echo $a['duration']; ?></td>
                                <td><?php echo $a['fees']; ?></td>
                                <td><img src="<?php echo $a['img1']; ?>" height="70" width="160"><br>
                                    <a href="coursedetail.php?courseid=<?php echo$a['coursedetail'];?>">View CourseDetail
                                </td>
                                <td>
                             <a href="editcourse.php?courseid=<?php echo $a['courseid']; ?>">
                                 Edit</a>
                                </td>
                            </tr>   
                            <?php
                        }
                        
                            ?>
                        </table>
                        <div id="pagination_controls"><?php echo $paginationCtrls; ?></div>
    </div>
    <div class="col-lg-2">
    </div>
    </div>
</div>
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