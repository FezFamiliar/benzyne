<?php

include 'config.php';

header('Content-Type: text/html; charset=UTF-8');


$shift = new SimpleHide();
echo $shift->_file_split('result.png', 10, true);