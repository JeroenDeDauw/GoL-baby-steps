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

	public function testAliveCellWithNoNeighbours_cellDies(): void {
		$this->assertFalse( ProductionClass::isAlive( true, 0 ) );
	}

	public function testAliveCellWithOneNeighbour_cellDies(): void {
		$this->assertFalse( ProductionClass::isAlive( true, 1 ) );
	}

	public function testAliveCellWithTwoNeighbours_cellSurvives(): void {
		$this->assertTrue( ProductionClass::isAlive( true, 2 ) );
	}

	public function testAliveCellWithFourNeighbours_cellDies(): void {
		$this->assertFalse( ProductionClass::isAlive( true, 4 ) );
	}

	public function testDeadCellWithFourNeighbours_staysDead(): void {
		$this->assertFalse( ProductionClass::isAlive( false, 4 ) );
	}

	public function testDeathCellWithTwoNeighbours_staysDeath(): void {
		$this->assertFalse( ProductionClass::isAlive( false, 2 ) );
	}

	public function testDeadCellWithThreeNeighbors_comesAlive(): void {
		$this->assertTrue( ProductionClass::isAlive( false, 3 ) );
	}

}
