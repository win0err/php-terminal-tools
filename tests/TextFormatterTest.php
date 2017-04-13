<?php
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

class TextFormatterTest extends TestCase {


	public function testStaticFormatMethod() {

		$textColor = $this->getMockBuilder( 'win0err\TerminalTools\Colors\Classic' )
			->setMethods( ['getTextColor', 'getBackgroundColor'] )
			->disableOriginalConstructor()
			->getMock();

		$textColor->expects( $this->any() )
			->method( 'getTextColor' )
			->will( $this->returnValue( '31' ) );
		$textColor->expects( $this->any() )
			->method( 'getBackgroundColor' )
			->will( $this->returnValue( '41' ) );

		$a = new TextFormatter( "I love testing" );
		$a->setTextColor($textColor);

		$b = TextFormatter::format( "I love testing" , $textColor );

		$this->assertEquals($a, $b);
	}
}
