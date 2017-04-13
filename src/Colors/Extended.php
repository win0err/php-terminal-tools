<?php declare(strict_types=1);

namespace win0err\TerminalTools\Colors;


use win0err\TerminalTools\Exceptions\UndefinedColorException;

class Extended implements Color {

	private $colorCode = -1;

	const BLACK   = 0;
	const MAROON  = 1;
	const GREEN   = 2;
	const OLIVE   = 3;
	const NAVY    = 4;
	const PURPLE  = 5;
	const TEAL    = 6;
	const SILVER  = 7;
	const GREY    = 8;
	const RED     = 9;
	const LIME    = 10;
	const YELLOW  = 11;
	const BLUE    = 12;
	const FUCHSIA = 13;
	const AQUA    = 14;
	const WHITE   = 15;

	public function __construct(int $code) {

		if ($code < 0 || $code > 255)
			throw new UndefinedColorException();

		$this->colorCode = $code;

		return $this;
	}

	public function getTextColor(): string {

		return $this->colorCode === -1 ? "" : "38;5;" . $this->colorCode;
	}

	public function getBackgroundColor(): string {

		return  $this->colorCode === -1 ? "" : "48;5;" . $this->colorCode;
	}


}