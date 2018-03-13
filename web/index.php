<?php

use Plotting\Christmas\BigSizeStars;
use Plotting\Christmas\SmallSizeStars;
use Plotting\StarsFactory;

require __DIR__ . '/../vendor/autoload.php';

$o = new SmallSizeStars();
echo "<pre>{$o->generate()}</pre>";

$bigSize = new BigSizeStars();
echo "<pre>{$bigSize->generate(9)}</pre>";

$smallStars = StarsFactory::createStarsObject(7);
echo "<pre>{$smallStars}</pre>";
