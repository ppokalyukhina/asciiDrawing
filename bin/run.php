<?php

use Plotting\Christmas\SmallSizeStars;

require \realpath(__DIR__ . '/../vendor/autoload.php');

$o = new SmallSizeStars();
print $o->drawBigStar();
