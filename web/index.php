<?php

use Plotting\FigurePlottingHelper;
use Plotting\Figures\ChristmasTree;
use Plotting\FigurePlotting;
use Plotting\StarsFactory;

require __DIR__ . '/../vendor/autoload.php';

// User input (could have been given by get parameters in browser...
// ... or args in command line)
$userInput = [null, 25];
$christmasTree = new ChristmasTree();

$smallStarsInstance = StarsFactory::createStarsObject(FigurePlotting::SMALL_SIZE);
echo "<pre>{$smallStarsInstance->generate(FigurePlotting::SMALL_SIZE)}</pre>";
echo "See above a small size of star";

$mediumStarsInstance = StarsFactory::createStarsObject(FigurePlotting::SMALL_SIZE);
echo "<pre>{$smallStarsInstance->generate(FigurePlotting::MEDIUM_SIZE)}</pre>";
echo "See above a middle size of star";

$largeStarsInstance = StarsFactory::createStarsObject(FigurePlotting::LARGE_SIZE);
echo "<pre>{$largeStarsInstance->generate(FigurePlotting::LARGE_SIZE)}</pre>";
echo "See above a big size of star";

$inputKey = \array_rand($userInput, 1);
$inputValue = $userInput[$inputKey];
if ($inputValue !== null) {
    try {
        $userInputStarsIntance = StarsFactory::createStarsObject(FigurePlotting::SMALL_SIZE);
        $customizedStar        = $userInputStarsIntance->generate($inputValue);
        echo "<pre>{$customizedStar}</pre>";
        echo "See above a star made of {$inputValue} lines \n";

        $customizedTree = $christmasTree->generate($inputValue);
        echo "<pre>{$customizedTree}</pre>";
        echo "See above a Christmas Tree made of {$inputValue} lines \n";

    }
    catch (\InvalidArgumentException $exception) {
        echo "Your input was invalid. Please see details: {$exception->getMessage()}";
    }
} else {
    do {
        $random = random_int(5, 25); //Could use any max odd number.
    }
    while($random % 2 == 0);

    $randomStarsInstance = StarsFactory::createStarsObject(FigurePlotting::SMALL_SIZE);
    $customizedStar = $randomStarsInstance->generate($random);
    echo "<pre>{$customizedStar}</pre>";
    echo "See above a star made of {$random} lines";
}

echo "<pre>{$christmasTree->generate(FigurePlotting::LARGE_SIZE)}</pre>";
echo "See above a large size of Christmas Tree";

echo "<pre>{$christmasTree->generate(FigurePlotting::MEDIUM_SIZE)}</pre>";
echo "See above a medium size of Christmas Tree";

echo "<pre>{$christmasTree->generate(FigurePlotting::SMALL_SIZE)}</pre>";
echo "See above a small size of Christmas Tree";

