<?php
ob_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admission Form</title>
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
style="height: 250px">
<div class="con_tit_01" >
    Fill your Admission-Form</div>
<form method="post">
    <table>
        <tr>
            <td>Category Id*</td>
            <td>
                <input type="text" name="ctgid" required><br>
            </td>
        </tr>
        <tr>
            <td>Category Name*</td>
            <td>
                <input type="text" name="ctgnm" required>
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
        $query="insert into category values($ctgid,'$ctgnm')";
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

