<?php
ob_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Batch Entry Form</title>
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
<head>
<body>
    <?php
    include './header.php';
    include './adminmenu.php';
    ?>
</body>
<div id="tooplate_main_top"></div>        
    <div id="tooplate_main">
    	 <div class="col_w900 col_w900_last">
    		<div class="col_w580 float_l" style="height:300px">
<div class="con_tit_01" >
    <u>Batch Entry Form</u></div>
                    <form method="post">
                        <table>
                            <tr>
                                <td>Branch Name*</td>
                                <td>
                                    <select name="branchid">
                                        <option>Select Branch</option>    
                                <?php
                                    require './connection.php';
                                    $abc="select branchid,branchnm from Branch";
                                    $rs=mysqli_query($link, $abc);
                                    while($a=  mysqli_fetch_array($rs))
                                    {
                                ?>
                                        <option value="<?php echo $a[0];?>">
                                        <?php echo $a[1];?></option>
                                    <?php
                                    }
                                    ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Course Name*</td>
                                <td>
                                    <select name="courseid">
                                    <option>Select Option</option>   
                                <?php
                                     require './connection.php';
                                     $s1="select courseid,coursenm from course";
                                     $rs1=mysqli_query($link, $s1);
                                     while($b=mysqli_fetch_array($rs1))
                                     {
                                ?>   
                                    <option value="<?php echo $b[0]?>">
                                        <?php echo $b[1];?></option>
                                    <?php
                                     }
                                    ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Start Date*</td>
                                <td>
                                    <input type="date" name="startdate" required>
                            </tr>
                             <tr>
                                 <td>Batch Time*</td>
                                 <td>
                                     <input type="text" name="batchtime" required>
                                 </td>
                            </tr>
                            <tr>
                                <td>Instructor Name*</td>
                                <td>
                                    <input type="text" name="insname" required>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">
                                    <input type="submit" name="submit" value="click here">
                                </td>
                            </tr>
                        </table>
                    </form>
                    <?php
                    if(isset($_REQUEST["submit"]))
                    {
                        extract($_REQUEST);
                        require'./connection.php';
                        $query="insert into batch(branchid,courseid,startdate,batchtime,insname)"
                                . "values($branchid,$courseid,'$startdate','$batchtime','$insname')";
                        //echo $query;
                        mysqli_query($link, $query);
                        $n=  mysqli_affected_rows($link);
                        if($n>0)
                        {
                            echo"<script>alert('Record saved')</script>";
                        }
                        else
                        {
                            echo"<script>alert('Record not saved')</script>";
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
