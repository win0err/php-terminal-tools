<?php declare(strict_types = 1);
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


/**
 * Interface Color
 */
interface Color {

	/**
	 * @return string
	 */
	public function getTextColor(): string;

	/**
	 * @return string
	 */
	public function getBackgroundColor(): string;
}