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

namespace win0err\TerminalTools\Colors;


use win0err\TerminalTools\Exceptions\UndefinedColorException;

/**
 * Class Extended
 */
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

	/**
	 * Extended constructor.
	 *
	 * @param int $code
	 *
	 * @throws UndefinedColorException
	 */
	public function __construct(int $code) {

		if ($code < 0 || $code > 255)
			throw new UndefinedColorException();

		$this->colorCode = $code;
	}

	/**
	 * @return string
	 */
	public function getTextColor(): string {

		return $this->colorCode === -1 ? "" : sprintf("38;5;%s", $this->colorCode);
	}

	/**
	 * @return string
	 */
	public function getBackgroundColor(): string {

		return $this->colorCode === -1 ? "" : sprintf("48;5;%s", $this->colorCode);
	}


}