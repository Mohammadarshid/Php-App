<?php
ob_start();//clean previous page
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>AdminPage</title>
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

</head>
<body>
<?php
include './header.php';
include './adminmenu.php';
?>
    <div id="tooplate_main_top"></div>        
    <div id="tooplate_main">
    	 <div class="col_w900 col_w900_last">
    		<div class="col_w580 float_l"
style="height: 200px">
<div class="con_tit_01">
    <p><b>welcome to Admin Page<b></p><br>
<?php
       //for creating a new session
       session_start();
        $emailid= $_SESSION["emailid"];
        $role=  $_SESSION["role"];
        echo $emailid;
    
  
?>
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


