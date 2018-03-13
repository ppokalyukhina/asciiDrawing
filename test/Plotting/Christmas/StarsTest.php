<?php

namespace Plotting\Christmas;

use PHPUnit\Framework\TestCase;

final class StarsTest extends TestCase {
    public function testStars() {
        $stars = new SmallSizeStars();

        echo $stars->generate(5);
    }
}
