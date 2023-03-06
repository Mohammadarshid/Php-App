<?php
ob_start();
include './pagination.php';
?>
<html>
<head>
<title>Courselist</title>
<link href="css/tooplate_style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>
</head>
<body>
    <?php
    include './header.php';
    include './studentmenu.php';
    ?>
     <div id="tooplate_main_top"></div>        
    <div id="tooplate_main">
    	 <div class="col_w900 col_w900_last">
    		<div class="col_w580 float_l" style="height:400px">
                    <div class="con_tit_01"><u>Course Catalogue</u></div>
<div class="container">
    <div class="row">
    <div class="col-lg-2">
    </div>
    <div class="col-lg-8">
    <table border="3">
        <tr>
            <th>Course Category</th>
            <th>Course Name</th>
            <th>Duration</th>
            <th>Fees</th>
            <th>Course Image</th>
        
        </tr>
        <?php
            while($a1 = mysqli_fetch_array($nquery))
              {
            ?>
                <tr>
                    <td><?php echo $a1['courseid']; ?></td>
                    <td><?php echo $a1['coursenm']; ?></td>
                    <td><?php echo $a1['duration']; ?></td>
                    <td><?php echo $a1['fees']; ?></td>
                    <td><img src="<?php echo $a1['img1'];?>"height="80" width="140"><br>
                        <a href="coursedetail.php?courseid=<?php echo $a1['coursedetail'];?>">
                        View Coursedetail</a>
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



