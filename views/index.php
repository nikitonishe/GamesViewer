<?php require_once ROOT."/template/slider/head.html";?>

<body>
<div id="slideshowWrapper">
    <ul id="slideshow">
		<?php foreach($games as $value){?>
			<a href=<?php echo "/games/view/".$value->getProperty("id");?>>
			<li><img src=<?php echo "/template/slider/images/".$value->getProperty("imageName");?> width="616" height="353" border="0" alt="" /></li> <!-- This is the last image in the slideshow -->
			</a>
        <?php }?>
    </ul>
</div>

</body>
</html>	
