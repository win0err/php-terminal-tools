<?php declare(strict_types=1);
/**
 * PHP Terminal Tools
 *
 * @package   win0err\TerminalTools
 * @author    Sergei Kolesnikov <win0err@gmail.com>
 * @license   MIT
 * @link      https://iamawesomeguy.ru/
 * @copyright 2017 Sergei Kolesnikov
 */

namespace win0err\TerminalTools\Colors\Tests;

use win0err\TerminalTools\Colors\TrueColor;
use PHPUnit\Framework\TestCase;

class TrueColorTest extends TestCase {


	public function testCoolColors() {

		$color = new TrueColor( 0, 0, 0 );

		$this->assertEquals( "38;2;0;0;0", $color->getTextColor() );
		$this->assertEquals( "48;2;0;0;0", $color->getBackgroundColor() );


		$this->assertEquals( "38;2;0;0;0", $color->getTextColor() );
		$this->assertEquals( "48;2;0;0;0", $color->getBackgroundColor() );
	}


	function coolHexColorsProvider() {

		return [
			["#000", 0, 0, 0],
			["000", 0, 0, 0],
			["fff", 255, 255, 255],
			["3d3d3d", 61, 61, 61],
			["#f5f5f5", 245, 245, 245],
			[TrueColor::BLUE, 0, 0, 255]
		];
	}

	/**
	 * @dataProvider coolHexColorsProvider
	 */
	public function testCoolHexColors(string $hex, int $r, int $g, int $b) {

		$this->assertEquals( new TrueColor( $r, $g, $b ), TrueColor::hex( $hex ) );
	}


	function wrongColorsProvider() {

		return [
			[-1, -1, -1],
			[256, 0, 0],
			[0, 256, 0],
			[0, 0, 256]
		];
	}

	/**
	 * @dataProvider wrongColorsProvider
	 */
	public function testWrongColors(int $r, int $g, int $b) {

		$this->expectException( 'win0err\TerminalTools\Exceptions\UndefinedColorException' );

		new TrueColor( $r, $g, $b );
	}


	function wrongHexColorsProvider() {

		return [
			["#00ff"],
			["0000"],
			[""]
		];
	}

	/**
	 * @dataProvider wrongHexColorsProvider
	 */
	public function testWrongHexColosr(string $hex) {

		$this->expectException( 'win0err\TerminalTools\Exceptions\UndefinedColorException' );

		TrueColor::hex( $hex );
	}
}