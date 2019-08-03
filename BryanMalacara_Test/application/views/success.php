<html>
<head>
    <title>Success Message</title>
</head>
<body>
<h3>Congragulation You Have Successfuly Uploaded</h3>
<?php
if(isset($error))
echo $error;
?>
<ul>
    <?php foreach ($upload_data as $item => $value):?>
    <li><?php echo $item;?>: <?php echo $value;?></li>
    <?php endforeach; ?>
</ul>
<p><?php echo anchor('upload_controller/file_view', 'Upload Another File!'); ?></p>
</body>
</html>