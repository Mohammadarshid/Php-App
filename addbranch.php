<?php
ob_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Branch Entry Form</title>
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
    		<div class="col_w580 float_l" style="height:300px">
<div class="con_tit_01" >
    <u>Branch Entry Form</u></div>
<form method="post">
    <table>
        <tr>
            <td>Branch Id*</td>
            <td>
                <input type="text" name="branchid" required>
            </td>
        </tr>
        <tr>
            <td>Branch Name*</td>
            <td>
                <input type="text" name="branchnm" required>
            </td>
        </tr>
        <tr>
            <td>Address*</td>
            <td>
        <textarea name="address"></textarea>
            </td>
        </tr>
        <tr>
            <td>Contact No.1</td>
            <td>
                <input type="text" name="contact1" required>
            </td>
        </tr>
        <tr>
            <td>Contact No.2</td>
            <td>
                <input type="text" name="contact2" required>
            </td>
        </tr>
        <tr>
            <td colspan="2" align ="center">
                <input type="submit" name="save" value="Submit">
            </td>
        </tr>
    </table>
</form>
  <?php
    if(isset($_REQUEST["save"]))
    {
        extract($_REQUEST);
        require './connection.php';
        $query="insert into Branch(branchid,branchnm,address,contact1,contact2)values($branchid,'$branchnm','$address',$contact1,$contact2)";
        //echo $query;
        mysqli_query($link, $query);
        $n=  mysqli_affected_rows($link);
        if($n>0)
           {
            echo"<script>alert('Record Saved')</script>";
           }
        else
        {
            echo"<script>alert('Record Not Found')</script>";
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


