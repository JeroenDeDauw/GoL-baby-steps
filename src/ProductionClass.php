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

	public static function isAlive( int $numCells ): bool {
		return $numCells >= 2 && $numCells < 4;
	}

}