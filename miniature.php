<?php
    require_once 'lib/simpleimage/SimpleImage.php';       
    $image = new SimpleImage();
    $image->load('images/mgmetro.jpg');
    $image->resizeToWidth(100);
    $image->save('mini/mgmetro.jpg');
?> 
