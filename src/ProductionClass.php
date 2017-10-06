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

	public static function countNeighbours( array $emptyGrid, int $row, int $col ): int {
		return self::getCellValue( $emptyGrid[$row][$col - 1] )
			+ self::getCellValue( $emptyGrid[$row - 1][$col - 1] );
	}

	private static function getCellValue( bool $cell ): int {
		return $cell ? 1 : 0;
	}

}