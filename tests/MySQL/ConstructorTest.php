<?php

namespace GlaivePro\SF\Tests\MySQL;

use PHPUnit\Framework\TestCase;
use GlaivePro\SF\MySQL\Sfc;

class ConstructorTest extends TestCase
{
	public function testPointConstructors(): void
	{
		$point = Sfc::point(1, 3);
		$this->assertSame(
			'Point(?, ?)',
			(string) $point,
		);
		$this->assertEquals([1, 3], $point->bindings);

		$pointWithSrid = Sfc::point(1, 3, 4326);
		$this->assertSame(
			'ST_SRID(Point(?, ?), ?)',
			(string) $pointWithSrid,
		);
		$this->assertEquals([1, 3, 4326], $pointWithSrid->bindings);
	}
}
