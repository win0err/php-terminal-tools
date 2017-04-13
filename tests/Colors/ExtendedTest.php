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

use win0err\TerminalTools\Colors\Extended;
use PHPUnit\Framework\TestCase;

class ExtendedTest extends TestCase {


	public function testCoolColors() {

		$color = new Extended( 128 );

		$this->assertEquals( "38;5;128", $color->getTextColor() );
		$this->assertEquals( "48;5;128", $color->getBackgroundColor() );
	}

	function wrongColorsProvider() {

		return [[-1], [256]];
	}

	/**
	 * @dataProvider wrongColorsProvider
	 */
	public function testWrongColor(int $code) {

		$this->expectException( 'win0err\TerminalTools\Exceptions\UndefinedColorException' );

		new Extended( $code );
	}
}