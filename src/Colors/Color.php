<?php declare(strict_types = 1);

namespace win0err\TerminalTools\Colors;


interface Color {

	public function getTextColor(): string;

	public function getBackgroundColor(): string;
}