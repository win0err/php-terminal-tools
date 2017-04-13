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
	private $textColor       = 39;
	private $backgroundColor = 49;

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
	 * @return $this
	 */
	public function setText(string $text): TextFormatter {

		$this->text = $text;

		return $this;
	}

	/**
	 * @param int $style Bold, faint, underline, blink, reverse or hidden
	 *
	 * @return $this
	 * @throws UndefinedStyleException
	 */
	public function addStyle(int $style = 0): TextFormatter {

		if (!in_array( $style, [1, 2, 4, 5, 7, 8] ))
			throw new UndefinedStyleException;

		array_push( $this->styles, $style );

		return $this;
	}

	/**
	 * @param Color $color
	 *
	 * @return $this
	 */
	public function setTextColor(Color $color): TextFormatter {

		$this->textColor = $color->getTextColor();

		return $this;
	}

	/**
	 * @param Color $color
	 *
	 * @return $this
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
		array_push( $codes, $this->textColor );
		array_push( $codes, $this->backgroundColor );

		sort( $codes );

		return "\e[" . implode( ";", $codes ) . "m" . $this->text . "\e[0m";
	}


}