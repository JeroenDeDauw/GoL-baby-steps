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

	public static function isAlive( bool $isAlive, int $numCells ): bool {
		return $numCells === 3 || ( $numCells >= 2 && $numCells < 4 && $isAlive );
	}

}