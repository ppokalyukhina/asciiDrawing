<?php

namespace Plotting\Christmas;

use PHPUnit\Framework\TestCase;

final class StarsTest extends TestCase {
    public function testStars() {
        $stars = new Stars();

        echo $stars->generate(4);
    }
}
