<html>
<head>
<title>Dance Studio Project</title>
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
		animSpeed:1000,
		pauseTime:2000,
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
    include'./header.php';
    include'./menu.php';
    include'./slider.php';
    ?>
    <div id="tooplate_main_top"></div>        
    <div id="tooplate_main">
    	 <div class="col_w900 col_w900_last">
    		<div class="col_w580 float_l">
                    <div class="con_tit_01">Welcome to our Dance Academy</div>
                    <img src="images/tooplate_image_01.jpg" alt="Image" class="image_wrapper image_fl" />
                    <p><em>The division of dance into types can be made on many different grounds. Function (e.g., theatrical, religious, recreational) is an obvious ground, but distinctions can also be made between tribal and folk dance, between amateur and professional, and above all between different genres and styles.</em></p>
                    <p align="justify">Genre and style are relatively ambiguous terms. They depend on analyses of movement style, structure, and performance context (i.e., where the dance is performed, who is watching, and who is dancing) as well as on a cluster of general cultural attitudes concerning the role and value of dance in society. Genre usually refers to a self-contained formal tradition such as ballet, within which there may be further subgenres, such as classical and modern ballet. (Some critics consider modern dance as an independent genre with a subgenre of postmodern dance, but others 
                        subsume both categories under ballet, along with other theatre dance forms such as jazz.)</a></p>	
                    <div class="cleaner"></div>
           </div>
	        
              <div class="col_w280 float_r">
                	
                    <h2>Upcoming Batches</h2>
                 
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
