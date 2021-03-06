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

	public function testEmptyGrid_returnsZeroNeighbours(): void {
		$emptyGrid = [
			[ false, false, false ],
			[ false, false, false ],
			[ false, false, false ],
		];

		$this->assertSame( 0, ProductionClass::countNeighbours( $emptyGrid, 1, 1 ) );
	}

	public function testOneNeighborUpperLeft_returnsOneNeighbours(): void {
		$emptyGrid = [
			[ true, false, false ],
			[ false, false, false ],
			[ false, false, false ],
		];

		$this->assertSame( 1, ProductionClass::countNeighbours( $emptyGrid, 1, 1 ) );
	}

	public function testOneNeighborLeft_returnsOneNeighbours(): void {
		$emptyGrid = [
			[ false, false, false ],
			[ true, false, false ],
			[ false, false, false ],
		];

		$this->assertSame( 1, ProductionClass::countNeighbours( $emptyGrid, 1, 1 ) );
	}

	public function testOneNeighborBottomLeft_returnsOneNeighbours(): void {
		$emptyGrid = [
			[ false, false, false ],
			[ false, false, false ],
			[ true, false, false ],
		];

		$this->assertSame( 1, ProductionClass::countNeighbours( $emptyGrid, 1, 1 ) );
	}


	public function testThreeNeighborOneTheRight_returnsThreeNeighbours(): void {
		$emptyGrid = [
			[ false, false, true ],
			[ false, false, true ],
			[ false, false, true ],
		];

		$this->assertSame( 3, ProductionClass::countNeighbours( $emptyGrid, 1, 1 ) );
	}

	public function testWhenAllCellsAreAlive_returnsEightNeighbours(): void {
		$emptyGrid = [
			[ true, true, true ],
			[ true, true, true ],
			[ true, true, true ],
		];

		$this->assertSame( 8, ProductionClass::countNeighbours( $emptyGrid, 1, 1 ) );
	}

	public function testTopCenterCell_wrapsAroundAndCountsBottomCenter(): void {
		$emptyGrid = [
			[ false, false, false ],
			[ false, false, false ],
			[ false, true, false ],
		];

		$this->assertSame( 1, ProductionClass::countNeighbours( $emptyGrid, 0, 1 ) );
	}

	public function testBottomCenterCell_wrapsAroundAndCountsTopCenter(): void {
		$emptyGrid = [
			[ false, true, false ],
			[ false, false, false ],
			[ false, false, false ],
		];

		$this->assertSame( 1, ProductionClass::countNeighbours( $emptyGrid, 2, 1 ) );
	}

	public function testMiddleLeftCell_wrapsAroundAndCountsRightNeighbours(): void {
		$emptyGrid = [
			[ false, false, true ],
			[ false, false, false ],
			[ false, false, true ],
		];

		$this->assertSame( 2, ProductionClass::countNeighbours( $emptyGrid, 1, 0 ) );
	}

	public function testUpperRight_wrapsAroundAndCountsLeftBottomNeighbours(): void {
		$emptyGrid = [
			[ true, false, false ],
			[ true, false, false ],
			[ true, false, false ],
		];

		$this->assertSame( 3, ProductionClass::countNeighbours( $emptyGrid, 0, 2 ) );
	}

}
