<?php
    require_once 'lib/simpleimage/SimpleImage.php';       
    $image = new SimpleImage();
    $image->load('images/subaruWRC97.jpg');
    $image->resizeToWidth(100);
    $image->save('mini/subaruWRC97.jpg');
?> 
