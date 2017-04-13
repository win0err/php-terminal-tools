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

use win0err\TerminalTools\Colors\Classic;
use PHPUnit\Framework\TestCase;

class ClassicTest extends TestCase {

	function coolColorsProvider() {

		return [[30], [37], [90], [97], [39]];
	}

	/**
	 * @dataProvider coolColorsProvider
	 */
	public function testCoolColors(int $code) {

		$color = new Classic( $code );

		$this->assertEquals( (string)$code, $color->getTextColor() );
		$this->assertEquals( (string)($code + 10), $color->getBackgroundColor() );
	}

	function wrongColorsProvider() {

		return [[29], [38], [40], [89], [98]];
	}

	/**
	 * @dataProvider wrongColorsProvider
	 */
	public function testWrongColor(int $code) {

		$this->expectException( 'win0err\TerminalTools\Exceptions\UndefinedColorException' );

		new Classic( $code );
	}
}