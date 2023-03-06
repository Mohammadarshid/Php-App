<?php
ob_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EditCourse</title>
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
    		<div class="col_w580 float_l" style="height: 430px">
                    <?php
                        $courseid=$_REQUEST["courseid"];
                        //echo $courseid;
                        require './connection.php';
                        $s="select * from course where courseid=$courseid";
                        $rs= mysqli_query($link,$s);
                        $a=mysqli_fetch_array($rs);
                        //echo "<pre>";
                       //print_r($a);
                    ?>
                    <div class="con_tit_01">Edit Record</div>
                    <form method="post" enctype="multipart/form-data">
                        <table border="2">
                            <tr>
                                <td>Course Name:-</td>
                                <td>
                                    <input type="text" name="coursenm" value="<?php echo $a[2];?>"required>
                                </td>
                            </tr
                            <tr>
                                <td>Duration:</td>
                                <td>
                                    <input type="text" name="duration" value="<?php echo $a[3];?>"required>
                                </td>
                            </tr>
                            <tr>
                                <td>Fees:</td>
                                 <td>
                                    <input type="text" name="fees" value="<?php echo $a[4];?>"required>
                                </td>
                            </tr>
                            <td>Coursedetail:</td>
                                 <td>
                                     <textarea name="coursedetail">
                                         <?php echo $a[5];?>
                                     </textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Change Image:</td>
                                 <td>
                                    <input type="text" name="img1" value="<?php echo $a[6];?>" required>
                                    <input type="file" name="img1" value="<?php $a[6];?>" required>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">
                                    <input type="submit" name="edit" value="Edit Record">
                                </td>
                            </tr>                            
                        </table>
                    </form>
                    <?php
                  //  if(isset($_REQUEST["edit"]))
                    {
                       extract($_REQUEST);
                        //for file uploading
                        $fnm=$_FILES["img1"]["name"];
                        $source=$_FILES["img1"]["tmp_name"];
                        $destination="uploads/".$fnm;
                        move_uploaded_file($source,$destination);
                        
                        $query="update course set coursenm='$coursenm',duration=$duration,"
                                ."fees=$fees,coursedetail='$coursedetail',img1='$destination'where courseid=$courseid ";
                       
                        mysqli_query($link,$query);
                        $n=  mysqli_affected_rows($link);
                        if($n>0)
                        {
                            header('location:courselistadmin.php');
                        }
                        else
                        {
                            echo "<script>alert('Record not edited')</script>";
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

