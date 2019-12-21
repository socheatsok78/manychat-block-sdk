<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function testTrueAssetsToTrue()
    {
        $condition = true;

        $this->assertTrue($condition);
    }
}
