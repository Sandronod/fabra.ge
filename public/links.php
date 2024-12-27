<?php
$data = file_get_contents("list.txt");
$lines = explode("\n" , $data);
?>
<html>
    <head>
        <title>Links</title>
        <meta name=”robots” content=”index,follow”>
    </head>
    
<body>

<h1>Links</h1>

<p>
    <?php foreach($lines as $link){
    if(strlen($link) > 5){
    ?>
    <a href="<?php echo $link; ?>"><?php echo $link; ?></a></br>
    <?php }}?>
</p>

</body>
</html>