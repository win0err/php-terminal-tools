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
 * Class Classic
 */
class Classic implements Color {

	private $colorCode = 39;

	const DEFAULT = 39;

	const BLACK   = 30;
	const RED     = 31;
	const GREEN   = 32;
	const YELLOW  = 33;
	const BLUE    = 34;
	const MAGENTA = 35;
	const CYAN    = 36;
	const GRAY    = 37;

	const DARK_GRAY     = 90;
	const LIGHT_RED     = 91;
	const LIGHT_GREEN   = 92;
	const LIGHT_YELLOW  = 93;
	const LIGHT_BLUE    = 94;
	const LIGHT_MAGENTA = 95;
	const LIGHT_CYAN    = 96;
	const WHITE         = 97;

	/**
	 * Classic constructor.
	 *
	 * @param int $code
	 *
	 * @throws UndefinedColorException
	 */
	public function __construct(int $code) {

		if (($code < 30 || $code > 37) && ($code < 90 || $code > 97) && $code !== 39)
			throw new UndefinedColorException();

		$this->colorCode = $code;
	}

	/**
	 * @return string
	 */
	public function getTextColor(): string {

		return (string)$this->colorCode;
	}

	/**
	 * @return string
	 */
	public function getBackgroundColor(): string {

		return (string)($this->colorCode + 10);
	}
}