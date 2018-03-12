<?php

namespace Plotting\Christmas;

use Plotting\FigurePlotting;
use Plotting\FigurePlottingHelper;

/**
 * Creates a star figure with a given size.
 */
final class Stars extends FigurePlottingHelper implements FigurePlotting {
    /** @inheritdoc */
    public function generate(int $lines) : string {
        if (!($lines & 1)) {
            throw new \InvalidArgumentException("Desired number of lines should be odd");
        }

        $startingColumn = $this->addSpaces($lines-1);

        $result = $startingColumn . FigurePlotting::CROSS_STRING . "\n";
        $result.= $startingColumn . FigurePlotting::X_STRING . "\n";

        $medianSpace = 0; //Space left when median is equal to number of iterations.
        $medianStars = 0; //Max amount of stars used in the figure.
        for ($spaces=$lines - 2, $x = 3, $count = 2; $x < $lines * 2; $spaces-=2, $x+=4, $count++) {
            $xString = $this->addXstring($x);

            // Calculate median and stop once it is equal to iterations number. In the loop below amount of stars starts decreasing.
            if ($count === $this->calculateMedian($lines)-1) {
                $space = $this->addSpaces($spaces-1);
                $result .= "{$space}" . FigurePlotting::CROSS_STRING . "{$xString}+\n";
                break;
            }

            $medianSpace = $spaces;
            $medianStars = $x;

            $result .= "{$this->addSpaces($spaces)}{$xString}\n";
        }

        $spaceLeft = 0;
        for ($spaces = $medianSpace, $x = $medianStars; $x > 0; $x-=4, $spaces+= 2) {
            $space = $this->addSpaces($spaces);
            $xString = $this->addXstring($x);

            $result .= "{$space}{$xString}\n";

            //When looping is over, keep the value of spaces left so + and last X can be added and be aligned with the rest of the generated figure.
            $spaceLeft = $spaces;

        }

        $additionalSpaces = $this->addSpaces($spaceLeft + 1);
        $result .= "{$additionalSpaces}X\n";
        $result .= "{$additionalSpaces}+";

        return $result;
    }
}

$st = new Stars();
$st->generate(7);
