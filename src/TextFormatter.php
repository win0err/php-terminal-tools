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

namespace win0err\TerminalTools;

use win0err\TerminalTools\Colors\Color;
use win0err\TerminalTools\Exceptions\UndefinedStyleException;


/**
 * Class TextFormatter
 * @package win0err\TerminalTools
 * @since   1.0.0
 */
class TextFormatter {

	protected $text = "";

	private $styles          = [];
	private $textColor       = '39';
	private $backgroundColor = '49';

	const BOLD      = 1;
	const FAINT     = 2;
	const UNDERLINE = 4;
	const BLINK     = 5;
	const REVERSE   = 7;
	const HIDDEN    = 8;


	/**
	 * TextFormatter constructor.
	 *
	 * @param string|null $text
	 */
	public function __construct(string $text = null) {

		$this->text = $text;
	}


	/**
	 * @param string $text
	 *
	 * @return TextFormatter
	 */
	public function setText(string $text): TextFormatter {

		$this->text = $text;

		return $this;
	}


	/**
	 * @param \int[] ...$styles Bold, faint, underline, blink, reverse or hidden
	 *
	 * @return TextFormatter
	 * @throws UndefinedStyleException
	 */
	public function setStyles(int ...$styles): TextFormatter {

		foreach( (array)$styles as $style ) {

			if (!in_array( $style, [1, 2, 4, 5, 7, 8] ))
				throw new UndefinedStyleException;

			array_push( $this->styles, $style );
		}

		return $this;
	}

	/**
	 * @param Color $color
	 *
	 * @return TextFormatter
	 */
	public function setTextColor(Color $color): TextFormatter {

		$this->textColor = $color->getTextColor();

		return $this;
	}

	/**
	 * @param Color $color
	 *
	 * @return TextFormatter
	 */
	public function setBackgroundColor(Color $color): TextFormatter {

		$this->backgroundColor = $color->getBackgroundColor();

		return $this;
	}

	/**
	 * @return string
	 */
	function __toString(): string {

		$codes = $this->styles;
		sort( $codes );

		$modes = "";

		if (!empty( $codes ))
			$modes .= sprintf( "\e[%sm", implode( ";", $codes ) );

		if ($this->textColor !== '39')
			$modes .= sprintf( "\e[%sm", $this->textColor );

		if ($this->backgroundColor !== '49')
			$modes .= sprintf( "\e[%sm", $this->backgroundColor );

		return sprintf( "%s%s\e[0m", $modes, $this->text );
	}


	/**
	 * @param string     $text
	 * @param Color|null $textColor
	 * @param Color|null $backgroundColor
	 * @param \int[]     ...$styles
	 *
	 * @return TextFormatter
	 */
	public static function format(string $text, Color $textColor = null, Color $backgroundColor = null, int ...$styles): TextFormatter {

		$textFormatter = new self();

		$textFormatter->setText( $text );

		if (!is_null( $textColor ))
			$textFormatter->setTextColor( $textColor );

		if (!is_null( $backgroundColor ))
			$textFormatter->setBackgroundColor( $backgroundColor );

		foreach( (array)$styles as $style )
			$textFormatter->setStyles( $style );

		return $textFormatter;

	}


}