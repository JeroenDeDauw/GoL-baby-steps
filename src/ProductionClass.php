<?php

declare( strict_types=1 );

namespace Such\NewProject;

/**
 * @license GNU GPL v2+
 */
class ProductionClass {

	public static function getTrue(): bool {
		return true;
	}

	public static function isAlive( bool $isAlive, int $neighbourCount ): bool {
		return $neighbourCount === 3 || ( $neighbourCount >= 2 && $neighbourCount < 4 && $isAlive );
	}

	public static function countNeighbours( array $grid, int $row, int $col ): int {
		$rowAbove = $row - 1 < 0 ? count( $grid ) - 1 : $row - 1;
		$rowBelow = $row + 1 >= count( $grid ) ? 0 : $row + 1;
		$lefterColumn = $col - 1 < 0 ? count( $grid[0] ) - 1 : $col - 1;
		$righterColumn = $col + 1 >= count( $grid[0] ) ? 0 : $col + 1;

		return self::getCellValue( $grid[$rowAbove][$lefterColumn] )
			+ self::getCellValue( $grid[$rowAbove][$col] )
			+ self::getCellValue( $grid[$rowAbove][$righterColumn] )

			+ self::getCellValue( $grid[$row][$lefterColumn] )
			+ self::getCellValue( $grid[$row][$righterColumn] )

			+ self::getCellValue( $grid[$rowBelow][$lefterColumn] )
			+ self::getCellValue( $grid[$rowBelow][$col] )
			+ self::getCellValue( $grid[$rowBelow][$righterColumn] );
	}

	private static function getCellValue( bool $cell ): int {
		return $cell ? 1 : 0;
	}

}