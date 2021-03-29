<?php

namespace Aslam\Bni\Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    public function setUP(): void
    {
        parent::setUp();
    }
}
