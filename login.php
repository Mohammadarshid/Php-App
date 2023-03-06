<?php
ob_start();//clean previous page
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Login Form</title>
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
style="height: 200px">
<div class="con_tit_01" >
    Login Form</div>
<form method="post">
    <table>
        <tr>
            <td><b>EMAIL ID*</b></td>
            <td><input type="email" name="emailid"
                       required></td>
        </tr>
        <tr>
            <td><b>PASSWORD*</b></td>
            <td><input type="password" name="pwd"
                       required></td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="signin" value="Sign-In">
                    <a href="register.php" >Sign-Up</a>
            </td>
        </tr>
    </table>                        
</form>
<?php
if(isset($_REQUEST["signin"]))
{
   extract($_REQUEST);
   require './connection.php';
   $query="select role from mstuser where emailid='$emailid' and pwd='$pwd'";
  // echo $query;
   $result=  mysqli_query($link, $query);
   $n=  mysqli_num_rows($result);
   if($n>0)
   {
       $a=mysqli_fetch_array($result);
       echo"<pre>";
       print_r($a);
       $role=$a[0];
       
       //for creating a new session
       session_start();
       $_SESSION["emailid"]=$emailid;
       $_SESSION["role"]=$role;
       if($role=="admin")
       {
           header('location:adminhome.php');
           
       }
       else if($role=="student")
       {
            header('location:studenthome.php');
       }
       else
       {
           header('location:index.php');
       }
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

