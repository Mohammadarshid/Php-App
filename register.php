<html>
<head>
<title>Registration Form</title>
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
include './menu.php';

?>
    <div id="tooplate_main_top"></div>        
    <div id="tooplate_main">
    	<div class="col_w900 col_w900_last">
            <div class="col_w580 float_l"
style="height:450px" >
<div class="con_tit_01" >
    <u>𝓡𝓮𝓰𝓲𝓼𝓽𝓮𝓻 𝓨𝓸𝓾𝓻𝓼𝓮𝓵𝓯</u></div>
                    <form method="post">
                        <table border="1" align="center">
                            <tr>
                                <td>FULL NAME*</td>
                                <td>
                                    <input type="text" name='fnm' required>
                                </td>
                            </tr>
                            <tr>
                                <td>LAST NAME*</td>
                                    <td>
                                        <input type='text' name='lnm' required>
                                    </td>
                            </tr>
                            <tr>
                                <td>MOBILE NUMBER.*</td>
                                <td>
                                    <input type="text" name="mno" required>
                                </td>
                            </tr>
                            <tr>
                                <td>EMAIL-ID*</td>
                                <td>
                                    <input type='text' name="email" required>
                                </td>
                            </tr>
                            <tr>
                                <td>GENDER*</td>
                                <td>
                                    <input type="radio" name="gender" value="male" required>Male
                                    <input type="radio" name="gender" value="female" required>Female
                                </td>
                            </tr>
                            <tr>
                                <td>PASSWORD*</td>
                                <td>
                                    <input type="password" name="pwd" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" name="save" value="Create Profile"></td>
                                <td><a href="register.php">Sign-Up</a></td>
                            </tr>
                        </table>
                    </form>

<?php
if(isset($_REQUEST["save"]))
{
    extract($_REQUEST);
    require './connection.php';
    $role="student";
    $query="insert into mstuser values('$fnm','$lnm',$mno,'$email','$gender','$pwd','$role')";
    //echo $query;
    mysqli_query($link, $query);
    $n=  mysqli_affected_rows($link);
    if($n>0)
        {
        echo "<script>alert('Registration Successfull')</script>" ;
        }
     else
        {
        echo "<script>alert('Try Again')</script>" ;    
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


