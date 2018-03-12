<?php

namespace Drawing\Christmas;

use Drawing\FigurePlotting;
use Drawing\FigurePlottingHelper;

final class ChristmasTree extends FigurePlottingHelper implements FigurePlotting {
    /** @inheritdoc */
    public function generate(int $lines): string {
        if ($lines < 0) {
            throw new \InvalidArgumentException("Given number of lines must be bigger than 0.");
        }

        $treeString = "{$this->addSpaces($lines)}+\n";

        for ($spaces=$lines, $x = 1; $x < $lines * 2; $spaces--, $x+=2) {
            $space = $this->addSpaces($spaces);
            $xString = $this->addXstring($x);

            $treeString .= "{$space}{$xString}\n";
        }

        return $treeString;
    }
}
