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
		$this->assertFalse( ProductionClass::isAlive( true, 0 ) );
	}

	public function testGivenOneAliveNeighbor_cellDies(): void {
		$this->assertFalse( ProductionClass::isAlive( true, 1 ) );
	}

	public function testTwoAliveNeighbors_cellLives(): void {
		$this->assertTrue( ProductionClass::isAlive( true, 2 ) );
	}

	public function testGivenFourAliveNeighbors_cellDies(): void {
		$this->assertFalse( ProductionClass::isAlive( true, 4 ) );
	}

	public function testDeathCellWithTwoNeighbours_staysDeath(): void {
		$this->assertFalse( ProductionClass::isAlive( false, 2 ) );
	}

}
