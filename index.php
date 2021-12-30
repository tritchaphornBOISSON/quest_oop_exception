<?php

require_once 'Car.php';


$myCar = new Car('blue', 8, 'gasoline');
echo $myCar->checkError(true);
echo "\n";
var_dump($myCar->setParkBrake($myCar->checkError(true)));




