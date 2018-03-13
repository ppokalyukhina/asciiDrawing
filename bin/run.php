<?php

use Plotting\Figures\ChristmasTree;
use Plotting\FigurePlotting;
use Plotting\StarsFactory;

require \realpath(__DIR__ . '/../vendor/autoload.php');

// User input (could have been given by get parameters in browser...
// ... or args in command line)
$userInput = [null, 25];
$starsFactory = new StarsFactory();
$christmasTree = new ChristmasTree();

$smallStarsInstance = StarsFactory::createStarsObject(FigurePlotting::SMALL_SIZE);
echo $smallStarsInstance->generate(FigurePlotting::SMALL_SIZE) . "\n";
echo "See above a small size of star \n";

$mediumStarsInstance = StarsFactory::createStarsObject(FigurePlotting::SMALL_SIZE);
echo $smallStarsInstance->generate(FigurePlotting::MEDIUM_SIZE) . "\n";
echo "See above a middle size of star \n";

$largeStarsInstance = StarsFactory::createStarsObject(FigurePlotting::LARGE_SIZE);
echo $largeStarsInstance->generate(FigurePlotting::LARGE_SIZE) . "\n";
echo "See above a big size of star \n";

$inputKey = \array_rand($userInput, 1);
$inputValue = $userInput[$inputKey];
if ($inputValue !== null) {
    try {
        $userInputStarsIntance = StarsFactory::createStarsObject(FigurePlotting::SMALL_SIZE);
        $customizedStar        = $userInputStarsIntance->generate($inputValue);
        echo "\n" . $customizedStar . "\n";
        echo "See above a star made of {$inputValue} lines \n";

        $customizedTree = $christmasTree->generate($inputValue);
        echo "\n" . $customizedTree . "\n";
        echo "See above a Christmas Tree made of {$inputValue} lines \n";

    }
    catch (\InvalidArgumentException $exception) {
        echo "Your input was invalid. Please see details: {$exception->getMessage()} \n";
    }
} else {
    do {
        $random = random_int(5, 25); //Could use any max odd number.
    }
    while($random % 2 == 0);

    $randomStarsInstance = StarsFactory::createStarsObject(FigurePlotting::SMALL_SIZE);
    echo $randomStarsInstance->generate($random) . "\n";
    echo "See above a star made of {$random} lines \n";
}

echo $christmasTree->generate(FigurePlotting::LARGE_SIZE) . "\n";
echo "See above a large size of Christmas Tree \n";

echo $christmasTree->generate(FigurePlotting::MEDIUM_SIZE) . "\n";
echo "See above a medium size of Christmas Tree \n";

echo $christmasTree->generate(FigurePlotting::SMALL_SIZE) . "\n";
echo "See above a small size of Christmas Tree \n";
