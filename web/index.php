<?php

use Plotting\Figures\ChristmasTree;
use Plotting\FigurePlotting;
use Plotting\StarsFactory;

require __DIR__ . '/../vendor/autoload.php';

$christmasTree = new ChristmasTree();

$smallStarsInstance = StarsFactory::createStarsObject(FigurePlotting::SMALL_SIZE);
echo "Small size of star.";
echo "<pre>{$smallStarsInstance->generate(FigurePlotting::SMALL_SIZE)}</pre>";

$mediumStarsInstance = StarsFactory::createStarsObject(FigurePlotting::SMALL_SIZE);
echo "Middle size of star.";
echo "<pre>{$smallStarsInstance->generate(FigurePlotting::MEDIUM_SIZE)}</pre>";

$largeStarsInstance = StarsFactory::createStarsObject(FigurePlotting::LARGE_SIZE);
echo "Large size of star.";
echo "<pre>{$largeStarsInstance->generate(FigurePlotting::LARGE_SIZE)}</pre>";

// User input (could have been given by get parameters in browser...
// ... or args in command line)
$userInput = [null, 25];

$inputKey = \array_rand($userInput, 1);
$inputValue = $userInput[$inputKey]; //Get a random hypothetical user input
if ($inputValue !== null) {
    try {
        $userInputStarsIntance = StarsFactory::createStarsObject(FigurePlotting::SMALL_SIZE);
        $customizedStar        = $userInputStarsIntance->generate($inputValue);
        echo "A star generated of {$inputValue} user input lines";
        echo "<pre>{$customizedStar}</pre>";

        $customizedTree = $christmasTree->generate($inputValue);
        echo "Christmas Tree made of {$inputValue} user input lines";
        echo "<pre>{$customizedTree}</pre>";
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
    echo "Star made of {$random} random lines.";
    echo "<pre>{$customizedStar}</pre>";

    $customizedTree = $christmasTree->generate($random);
    echo "Christmas Tree made of {$random} random lines";
    echo "<pre>{$customizedTree}</pre>";
}

echo "Large size of Christmas Tree.";
echo "<pre>{$christmasTree->generate(FigurePlotting::LARGE_SIZE)}</pre>";

echo "Medium size of Christmas Tree.";
echo "<pre>{$christmasTree->generate(FigurePlotting::MEDIUM_SIZE)}</pre>";

echo "Small size of Christmas Tree.";
echo "<pre>{$christmasTree->generate(FigurePlotting::SMALL_SIZE)}</pre>";

