<!DOCTYPE html>
<html>
<head>
  <title>games</title>
  <link rel="stylesheet" type="text/css" href="/template/css/index.css"/>
  <meta charset="utf-8"/>
</head>
<body>
  <article>
<?php for($i = 0; $i < 5; $i++) { ?>
        <a href = "games/view/2">
        <img class = "image" src = "<?php echo $games[$i]->getProperty('imageUrl');?>" alt = "<?php echo $games[$i]->getProperty('name');?> "/>
        </a>
	    <h1 class = "name"> <?php echo $games[$i]->getProperty('name')?> </h1>
        <p class = "description"> <?php echo $games[$i]->getProperty('info')?> </p> <br/><br/>
		<hr/>
<?php } ?>
  </article>
</body>
</html>
