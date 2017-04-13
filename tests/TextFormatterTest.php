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

namespace win0err\TerminalTools\Tests;

use win0err\TerminalTools\TextFormatter;
use PHPUnit\Framework\TestCase;

/**
 * @covers  \win0err\TerminalTools\TextFormatter
 */
class TextFormatterTest extends TestCase {


	public function testStaticFormatMethod() {

		$textColor = $this->getMockBuilder( 'win0err\TerminalTools\Colors\Classic' )
			->setMethods( ['getTextColor'] )
			->disableOriginalConstructor()
			->getMock();

		$textColor->expects( $this->any() )
			->method( 'getTextColor' )
			->will( $this->returnValue( '31' ) );

		$a = new TextFormatter( "I love testing" );
		$a->setTextColor( $textColor );

		$b = TextFormatter::format( "I love testing", $textColor );

		$this->assertEquals( $a, $b );
	}

	public function testEmptyString() {

		$this->assertEquals(
			"\e[39;49m\e[0m",
			(string)(new TextFormatter())
		);
	}

	function stylesProvider() {

		return [
			[1, "\e[1;39;49m\e[0m"],
			[2, "\e[2;39;49m\e[0m"],
			[4, "\e[4;39;49m\e[0m"],
			[5, "\e[5;39;49m\e[0m"],
			[7, "\e[7;39;49m\e[0m"],
			[8, "\e[8;39;49m\e[0m"]
		];
	}

	/**
	 * @dataProvider stylesProvider
	 */
	public function testStyles(int $mode, string $resultString) {

		$textFormatter = new TextFormatter();
		$textFormatter
			->setText( "" )
			->setStyles( $mode );

		$this->assertEquals(
			$resultString,
			(string)$textFormatter
		);
	}

	public function testMultipleStyles() {

		$textFormatter = new TextFormatter();
		$textFormatter
			->setText( "" )
			->setStyles( 1, 7, 4, 5 );

		$this->assertEquals(
			"\e[1;4;5;7;39;49m\e[0m",
			(string)$textFormatter
		);
	}

	public function testMultipleStylesWithStaticFormatMethod() {

		$this->assertEquals(
			"\e[1;4;5;7;39;49m\e[0m",
			(string)TextFormatter::format( "", null, null, 1, 4, 5, 7 )
		);
	}

	public function testWrongStyle() {

		$this->expectException( 'win0err\TerminalTools\Exceptions\UndefinedStyleException' );

		$textFormatter = new TextFormatter();
		$textFormatter->setStyles( 0 );
	}

	public function testSetText() {

		$textFormatter = new TextFormatter();
		$textFormatter->setText( "I love testing" );

		$this->assertEquals(
			"\e[39;49mI love testing\e[0m",
			(string)$textFormatter
		);
	}

	public function testTextColor() {

		$color = $this->getMockBuilder( 'win0err\TerminalTools\Colors\Classic' )
			->setMethods( ['getTextColor'] )
			->disableOriginalConstructor()
			->getMock();

		$color->expects( $this->any() )
			->method( 'getTextColor' )
			->will( $this->returnValue( '36' ) );

		$this->assertEquals(
			"\e[36;49m\e[0m",
			(string)(new TextFormatter())->setTextColor($color)
		);
	}

	public function testBackgroundColor() {

		$color = $this->getMockBuilder( 'win0err\TerminalTools\Colors\Classic' )
			->setMethods( ['getBackgroundColor'] )
			->disableOriginalConstructor()
			->getMock();

		$color->expects( $this->any() )
			->method( 'getBackgroundColor' )
			->will( $this->returnValue( '96' ) );

		$this->assertEquals(
			"\e[39;96m\e[0m",
			(string)(new TextFormatter())->setBackgroundColor($color)
		);
	}


	public function testMultipleBackground() {

		$color = $this->getMockBuilder( 'win0err\TerminalTools\Colors\Classic' )
			->setMethods( ['getBackgroundColor'] )
			->disableOriginalConstructor()
			->getMock();

		$color->expects( $this->any() )
			->method( 'getBackgroundColor' )
			->will( $this->returnValue( '96' ) );

		$this->assertEquals(
			"\e[39;96m\e[0m",
			(string)(new TextFormatter())->setBackgroundColor($color)
		);
	}

	public function testBackgroundWithStaticFormatMethod() {

		$color = $this->getMockBuilder( 'win0err\TerminalTools\Colors\Classic' )
			->setMethods( ['getBackgroundColor'] )
			->disableOriginalConstructor()
			->getMock();

		$color->expects( $this->any() )
			->method( 'getBackgroundColor' )
			->will( $this->returnValue( '96' ) );

		$this->assertEquals(
			"\e[39;96m\e[0m",
			(string)TextFormatter::format( "", null, $color)
		);
	}
}
