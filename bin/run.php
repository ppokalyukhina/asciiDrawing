<?php

use Plotting\Figures\ChristmasTree;
use Plotting\FigurePlotting;
use Plotting\StarsFactory;

require \realpath(__DIR__ . '/../vendor/autoload.php');

$starsFactory = new StarsFactory();
$christmasTree = new ChristmasTree();

$smallStarsInstance = StarsFactory::createStarsObject(FigurePlotting::SMALL_SIZE);
echo "Small size of star \n";
echo $smallStarsInstance->generate(FigurePlotting::SMALL_SIZE) . "\n";

$mediumStarsInstance = StarsFactory::createStarsObject(FigurePlotting::SMALL_SIZE);
echo "Middle size of star \n";
echo $smallStarsInstance->generate(FigurePlotting::MEDIUM_SIZE) . "\n";

$largeStarsInstance = StarsFactory::createStarsObject(FigurePlotting::LARGE_SIZE);
echo "Large size of star \n";
echo $largeStarsInstance->generate(FigurePlotting::LARGE_SIZE) . "\n";

// User input (could have been given by get parameters in browser...
// ... or args in command line)
$userInput = [null, 25];

$inputKey = \array_rand($userInput, 1);
$inputValue = $userInput[$inputKey]; //Get a random hypothetical user input
if ($inputValue !== null) {
    try {
        $userInputStarsIntance = StarsFactory::createStarsObject(FigurePlotting::SMALL_SIZE);
        $customizedStar        = $userInputStarsIntance->generate($inputValue);
        echo "A star generated of {$inputValue} user input lines \n";
        echo "\n" . $customizedStar . "\n";

        $customizedTree = $christmasTree->generate($inputValue);
        echo "Christmas Tree made of {$inputValue} user input lines \n";
        echo "\n" . $customizedTree . "\n";

    } catch (\InvalidArgumentException $exception) {
        echo "Your input was invalid. Please see details: {$exception->getMessage()} \n";
    }
} else {
    do {
        $random = random_int(5, 25); //Could be used any max odd number.
    } while ($random % 2 == 0);

    $randomStarsInstance = StarsFactory::createStarsObject(FigurePlotting::SMALL_SIZE);
    echo "Star made of {$random} lines \n";
    echo $randomStarsInstance->generate($random) . "\n";

    echo "Christmas Tree made of {$random} random lines";
    echo $christmasTree->generate($random) . "\n";
}

echo "Large size of Christmas Tree \n";
echo $christmasTree->generate(FigurePlotting::LARGE_SIZE) . "\n";

echo "Medium size of Christmas Tree \n";
echo $christmasTree->generate(FigurePlotting::MEDIUM_SIZE) . "\n";

echo "Small size of Christmas Tree \n";
echo $christmasTree->generate(FigurePlotting::SMALL_SIZE) . "\n";
