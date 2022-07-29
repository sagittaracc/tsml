<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use sagittaracc\TSML;

final class TsmlTest extends TestCase
{
    public function testTsml(): void
    {
        $query = require('tests/queries/Query1.php');
        $expected = $query[1];
        $actual = TSML::parse($query[0]);
        $this->assertSame($expected, $actual);
    }

    public function testTsmlWithZeroValue(): void
    {
        $query = require('tests/queries/Query2.php');
        $expected = $query[1];
        $actual = TSML::parse($query[0]);
        $this->assertSame($expected, $actual);
    }
}