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
class TrueColor implements Color {

	private $red   = 0;
	private $green = 0;
	private $blue  = 0;

	const MAROON                 = '#800000';
	const DARK_RED               = '#8B0000';
	const FIRE_BRICK             = '#B22222';
	const RED                    = '#FF0000';
	const SALMON                 = '#FA8072';
	const TOMATO                 = '#FF6347';
	const CORAL                  = '#FF7F50';
	const ORANGE_RED             = '#FF4500';
	const CHOCOLATE              = '#D2691E';
	const SANDY_BROWN            = '#F4A460';
	const DARK_ORANGE            = '#FF8C00';
	const ORANGE                 = '#FFA500';
	const DARK_GOLDENROD         = '#B8860B';
	const GOLDENROD              = '#DAA520';
	const GOLD                   = '#FFD700';
	const OLIVE                  = '#808000';
	const YELLOW                 = '#FFFF00';
	const YELLOW_GREEN           = '#9ACD32';
	const GREEN_YELLOW           = '#ADFF2F';
	const CHARTREUSE             = '#7FFF00';
	const LAWN_GREEN             = '#7CFC00';
	const GREEN                  = '#008000';
	const LIME                   = '#00FF00';
	const LIME_GREEN             = '#32CD32';
	const SPRING_GREEN           = '#00FF7F';
	const MEDIUM_SPRING_GREEN    = '#00FA9A';
	const TURQUOISE              = '#40E0D0';
	const LIGHT_SEA_GREEN        = '#20B2AA';
	const MEDIUM_TURQUOISE       = '#48D1CC';
	const TEAL                   = '#008080';
	const DARK_CYAN              = '#008B8B';
	const AQUA                   = '#00FFFF';
	const CYAN                   = '#00FFFF';
	const DARK_TURQUOISE         = '#00CED1';
	const DEEP_SKY_BLUE          = '#00BFFF';
	const DODGER_BLUE            = '#1E90FF';
	const ROYAL_BLUE             = '#4169E1';
	const NAVY                   = '#000080';
	const DARK_BLUE              = '#00008B';
	const MEDIUM_BLUE            = '#0000CD';
	const BLUE                   = '#0000FF';
	const BLUE_VIOLET            = '#8A2BE2';
	const DARK_ORCHID            = '#9932CC';
	const DARK_VIOLET            = '#9400D3';
	const PURPLE                 = '#800080';
	const DARK_MAGENTA           = '#8B008B';
	const FUCHSIA                = '#FF00FF';
	const MAGENTA                = '#FF00FF';
	const MEDIUM_VIOLET_RED      = '#C71585';
	const DEEP_PINK              = '#FF1493';
	const HOT_PINK               = '#FF69B4';
	const CRIMSON                = '#DC143C';
	const BROWN                  = '#A52A2A';
	const INDIAN_RED             = '#CD5C5C';
	const ROSY_BROWN             = '#BC8F8F';
	const LIGHT_CORAL            = '#F08080';
	const SNOW                   = '#FFFAFA';
	const MISTY_ROSE             = '#FFE4E1';
	const DARK_SALMON            = '#E9967A';
	const LIGHT_SALMON           = '#FFA07A';
	const SIENNA                 = '#A0522D';
	const SEA_SHELL              = '#FFF5EE';
	const SADDLE_BROWN           = '#8B4513';
	const PEACHPUFF              = '#FFDAB9';
	const PERU                   = '#CD853F';
	const LINEN                  = '#FAF0E6';
	const BISQUE                 = '#FFE4C4';
	const BURLYWOOD              = '#DEB887';
	const TAN                    = '#D2B48C';
	const ANTIQUE_WHITE          = '#FAEBD7';
	const NAVAJO_WHITE           = '#FFDEAD';
	const BLANCHED_ALMOND        = '#FFEBCD';
	const PAPAYA_WHIP            = '#FFEFD5';
	const MOCCASIN               = '#FFE4B5';
	const WHEAT                  = '#F5DEB3';
	const OLDLACE                = '#FDF5E6';
	const FLORAL_WHITE           = '#FFFAF0';
	const CORNSILK               = '#FFF8DC';
	const KHAKI                  = '#F0E68C';
	const LEMON_CHIFFON          = '#FFFACD';
	const PALE_GOLDENROD         = '#EEE8AA';
	const DARK_KHAKI             = '#BDB76B';
	const BEIGE                  = '#F5F5DC';
	const LIGHT_GOLDENROD_YELLOW = '#FAFAD2';
	const LIGHT_YELLOW           = '#FFFFE0';
	const IVORY                  = '#FFFFF0';
	const OLIVE_DRAB             = '#6B8E23';
	const DARK_OLIVE_GREEN       = '#556B2F';
	const DARK_SEA_GREEN         = '#8FBC8F';
	const DARK_GREEN             = '#006400';
	const FOREST_GREEN           = '#228B22';
	const LIGHT_GREEN            = '#90EE90';
	const PALE_GREEN             = '#98FB98';
	const HONEYDEW               = '#F0FFF0';
	const SEA_GREEN              = '#2E8B57';
	const MEDIUM_SEA_GREEN       = '#3CB371';
	const MINTCREAM              = '#F5FFFA';
	const MEDIUM_AQUAMARINE      = '#66CDAA';
	const AQUAMARINE             = '#7FFFD4';
	const DARK_SLATE_GRAY        = '#2F4F4F';
	const PALE_TURQUOISE         = '#AFEEEE';
	const LIGHT_CYAN             = '#E0FFFF';
	const AZURE                  = '#F0FFFF';
	const CADET_BLUE             = '#5F9EA0';
	const POWDER_BLUE            = '#B0E0E6';
	const LIGHT_BLUE             = '#ADD8E6';
	const SKY_BLUE               = '#87CEEB';
	const LIGHTSKY_BLUE          = '#87CEFA';
	const STEEL_BLUE             = '#4682B4';
	const ALICE_BLUE             = '#F0F8FF';
	const SLATE_GRAY             = '#708090';
	const LIGHT_SLATE_GRAY       = '#778899';
	const LIGHTSTEEL_BLUE        = '#B0C4DE';
	const CORNFLOWER_BLUE        = '#6495ED';
	const LAVENDER               = '#E6E6FA';
	const GHOST_WHITE            = '#F8F8FF';
	const MIDNIGHT_BLUE          = '#191970';
	const SLATE_BLUE             = '#6A5ACD';
	const DARK_SLATE_BLUE        = '#483D8B';
	const MEDIUM_SLATE_BLUE      = '#7B68EE';
	const MEDIUM_PURPLE          = '#9370DB';
	const INDIGO                 = '#4B0082';
	const MEDIUM_ORCHID          = '#BA55D3';
	const PLUM                   = '#DDA0DD';
	const VIOLET                 = '#EE82EE';
	const THISTLE                = '#D8BFD8';
	const ORCHID                 = '#DA70D6';
	const LAVENDER_BLUSH         = '#FFF0F5';
	const PALE_VIOLET_RED        = '#DB7093';
	const PINK                   = '#FFC0CB';
	const LIGHT_PINK             = '#FFB6C1';
	const BLACK                  = '#000000';
	const DIM_GRAY               = '#696969';
	const GRAY                   = '#808080';
	const DARK_GRAY              = '#A9A9A9';
	const SILVER                 = '#C0C0C0';
	const LIGHT_GREY             = '#D3D3D3';
	const GAINSBORO              = '#DCDCDC';
	const WHITE_SMOKE            = '#F5F5F5';
	const WHITE                  = '#FFFFFF';
	const REBECCA_PURPLE         = '#663399';

	/**
	 * TrueColor constructor.
	 *
	 * @param int $red
	 * @param int $green
	 * @param int $blue
	 *
	 * @throws UndefinedColorException
	 */
	public function __construct(int $red, int $green, int $blue) {

		if ($red < 0 || $red > 255 || $green < 0 || $green > 255 || $blue < 0 || $blue > 255)
			throw new UndefinedColorException();

		$this->red = $red;
		$this->green = $green;
		$this->blue = $blue;
	}

	/**
	 * @param string $hex
	 *
	 * @return Color
	 * @throws UndefinedColorException
	 */
	public static function hex(string $hex = "#000000"): Color {

		$hex = str_replace( '#', '', $hex );

		if (strlen( $hex ) === 6) { // #000000

			$r = hexdec( $hex[0] . $hex[1] );
			$g = hexdec( $hex[2] . $hex[3] );
			$b = hexdec( $hex[4] . $hex[5] );
		} else if (strlen( $hex ) === 3) { #000

			$r = hexdec( $hex[0] . $hex[0] );
			$g = hexdec( $hex[1] . $hex[1] );
			$b = hexdec( $hex[2] . $hex[2] );
		} else // bullshit
			throw new UndefinedColorException();

		return new self( (int)$r, (int)$g, (int)$b );
	}

	/**
	 * @return string
	 */
	public function getTextColor(): string {

		return sprintf( "38;2;%s;%s;%s", $this->red, $this->green, $this->blue );
	}

	/**
	 * @return string
	 */
	public function getBackgroundColor(): string {

		return sprintf( "48;2;%s;%s;%s", $this->red, $this->green, $this->blue );
	}


}