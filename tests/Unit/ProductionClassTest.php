<?php

declare( strict_types=1 );

namespace Such\NewProject\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Such\NewProject\ProductionClass;

/**
 * @covers \Such\NewProject\ProductionClass
 *
 * @licence GNU GPL v2+
 */
class ProductionClassTest extends TestCase {

	public function testGetTrue() {
		$this->assertTrue( ProductionClass::getTrue() );
	}

	public function testGivenNoAliveNeighbors_cellDies(): void {
		$this->assertFalse( ProductionClass::isAlive( 0 ) );
	}

}
