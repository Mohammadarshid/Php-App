<?php
ob_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Category Entry Form</title>
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
    include './adminmenu.php';
    ?>
<div id="tooplate_main_top"></div>        
    <div id="tooplate_main">
    	 <div class="col_w900 col_w900_last">
    		<div class="col_w580 float_l" style="height: 280px">
                    <div class="con_tit_01"><u>Course Entry Form</u></div>
                    <form method="post" enctype="multipart/form-data"> 
                        <table>
                            <tr>
                                <td>Category Name*</td>
                                <td>
                                    <select name="ctgid">
                                        <option value="0">Select Category</option>
                                        <?php
                                            require './connection.php';
                                            $s="select * from category";
                                            $rs=mysqli_query($link, $s);
                                            while($a=mysqli_fetch_array($rs))
                                            {
                                        ?>
                                            <option value="<?php echo $a[0]; ?>">
                                                <?php echo $a[1]; ?></option> 
                                           <?php
                                            }  
                                            ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Course Name*</td>
                                <td>
                                    <input type="text" name="coursenm" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Duration*</td>
                                <td>
                                    <input type="text" name="duration" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Fees/Charges*</td>
                                <td>
                                    <input type="text" name="fees" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Course Detail</td>
                                <td>
                                    <textarea name="coursedetail"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Course Pic*</td>
                                <td>
                                <input type="file" name="img1" required>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">
                                <input type="submit" name="save" value="Save">
                                <input type="reset" value="Clear All">
                                </td>
                            </tr>
                        </table>
                    </form>
<?php
if(isset($_REQUEST["save"]))
{
    extract($_REQUEST);
    //for file uploading
    $fnm=$_FILES["img1"]["name"];
    $source=$_FILES["img1"]["tmp_name"];
    $destination="uploads/".$fnm;
    move_uploaded_file($source,$destination);
    
    //for inserting record
   $query="insert into course(ctgid,coursenm,duration,fees,coursedetail,img1)"
           . "values($ctgid,'$coursenm',$duration,$fees,"
           . "'$coursedetail','$destination')";
   // echo $query;
    mysqli_query($link,$query);
    $n=mysqli_affected_rows($link);
    if($n>0)
    {
        echo"<script> alert('Record is saved')</script>";
    }
    else
    {
        echo"<script>alert('Record not found')</script>";
    }
}
?>
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

                          
