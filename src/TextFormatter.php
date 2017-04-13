<?php declare(strict_types=1);

namespace win0err\TerminalTools;

use win0err\TerminalTools\Colors\Color;
use win0err\TerminalTools\Exceptions\UndefinedStyleException;

class TextFormatter {

	protected $text;

	private $styles          = [];
	private $textColor       = 39;
	private $backgroundColor = 49;

	const BOLD      = 1;
	const FAINT     = 2;
	const UNDERLINE = 4;
	const BLINK     = 5;
	const REVERSE   = 7;
	const HIDDEN    = 8;


	public function __construct(string $text = null) {

		$this->text = $text;


		return $this;
	}

	public function setText(string $text = null) {

		$this->text = $text;

		return $this;
	}

	public function addStyle(int $style = 0) {

		if (!in_array( $style, [1, 2, 4, 5, 7, 8] ))
			throw new UndefinedStyleException;

		array_push( $this->styles, $style );

		return $this;
	}

	public function setTextColor(Color $color) {

		$this->textColor = $color->getTextColor();

		return $this;
	}

	public function setBackgroundColor(Color $color) {

		$this->backgroundColor = $color->getBackgroundColor();

		return $this;
	}

	function __toString() {

		$codes = $this->styles;
		array_push( $codes, $this->textColor );
		array_push( $codes, $this->backgroundColor );

		sort( $codes );

		return "\e[" . implode( ";", $codes ) . "m" . $this->text . "\e[0m";
	}


}