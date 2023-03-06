<?php
ob_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BatchList</title>
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
    include './studentmenu.php';
    ?>
<div id="tooplate_main_top"></div>        
    <div id="tooplate_main">
    	 <div class="col_w900 col_w900_last">
    		<div class="col_w580 float_l" style="height: 430px">
                    <div class="con_tit_01"><u>New Batches/Upcoming Batches</u></div>
                    <?php
                        require './connection.php';
                        $query="select b.coursenm,b.duration,b.fees,a.startdate,a.batchtime,a.insname,c.branchnm,c.contact1,a.batchid"
                                . " from batch as a "
                                . "inner join course as b on a.courseid=b.courseid "
                                . "inner join Branch as c on a.branchid=c.branchid "
                                . "where a.batchstatus=1";
                           // echo $query;
                     $rs= mysqli_query($link,$query);
                        $n= mysqli_num_rows($rs);
                        if($n>0)
                        {
                    ?>
                        <table border="1" align="center">
                            <tr>
                                <th>Course Name</th>
                                <th>Duration</th>
                                <th>Fees</th>
                                <th>Start Date</th>
                                <th>Batch Time</th>
                                <th>Instructor Name</th>
                                <th>Branch Name</th>
                                <th>Contact Number</th>
                                <th>Option</th>
                            </tr>
                        <?php
                                while($a=mysqli_fetch_array($rs))
                                {
                        ?>
                            <tr>
                                <td><?php echo $a[0];?></td>
                                <td><?php echo $a[1];?></td>
                                <td><?php echo $a[2];?></td>
                                <td><?php echo $a[3];?></td>
                                <td><?php echo $a[4];?></td>
                                <td><?php echo $a[5];?></td>
                                <td><?php echo $a[6];?></td>
                                <td><?php echo $a[7];?></td>
                                <td><a href="admission.php?batchid=<?php echo $a[8];?>">Select Batch</a></td>

                            </tr>
                        <?php
                          }
                        }
                        
                        ?>
                        </table>
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

