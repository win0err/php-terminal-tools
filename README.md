# PHP Terminal Tools

![Travis-CI](https://img.shields.io/travis/win0err/php-terminal-tools.svg?style=flat-square)
![Latest Stable Version](https://img.shields.io/packagist/v/win0err/php-terminal-tools.svg?style=flat-square)

PHP Terminal Tools облегчают работу с терминалом в проектах, написанных на языке PHP.

## Установка
Чтобы подключить пакет пакет, используйте Composer
```bash
composer require win0err/php-terminal-tools
```

## Использование
```PHP
<?php
use win0err\TerminalTools\TextFormatter;
use win0err\TerminalTools\Colors\{Classic, Extended};

$textFormatter = new TextFormatter( "Съешь ещё этих мягких французских булок, да выпей чаю" );
echo $textFormatter;
// или сокращённая запись: 
echo TextFormatter::format( 
	"В чащах юга жил бы цитрус? Да, но фальшивый экземпляр!" /* $text */, // Обязательно
	new Extended(198) /* $textColor = null */, 
	new Extended(200) /* $backgroundColor = null*/, 
	TextFormatter::BOLD /* ...$styles */ 
	);

```
### Стиль текста
Для установки стилей используется метод `setStyles`. 
Поддерживаются 6 стилей:
жирный, блеклый, подчёркнутый, мигающий, инвертированный, скрытый. 
Для удобства, все они предопределены в классе TextFormatter.

```PHP
$textFormatter->setStyles( TextFormatter::UNDERLINE );
```
Стили можно комбинировать:
```PHP
$textFormatter->setStyles( TextFormatter::BOLD, TextFormatter::UNDERLINE );
// или
$textFormatter->setStyles( TextFormatter::BOLD );
$textFormatter->setStyles( TextFormatter::UNDERLINE );
```

### Цвет текста
Для установки цвета текста, используется метод `setTextColor`, для цвета фона — `setBackgroundColor`.

#### 8-битная палитра

В классе Classic для удобства предопределены константы для всех возможных цветов данной палитры.
```PHP
$color = new Classic( Classic::MAGENTA );

$textFormatter
    ->setTextColor( $color )
    ->setBackgroundColor( new Classic( Classic::WHITE ) );
```
#### 256-битная палитра

В классе Extended для удобства предопределены константы 16-ти основных цветов 256-битной палитры. 
Остальные цвета можно задать числом в диапазоне от 0 до 255.
```PHP
$textFormatter
    ->setTextColor( new Extended( 198 ) )
    ->setBackgroundColor( new Extended( rand(0, 255) ) );
```

## Пример
![PHP Terminal Tools](https://cloud.githubusercontent.com/assets/11278181/25024433/9bde3492-20a6-11e7-8994-0e7e83f79dae.png)
```PHP
<?php
require 'vendor/autoload.php';

use win0err\TerminalTools\TextFormatter;
use win0err\TerminalTools\Colors\{
	Classic, Extended
};

$header = (new TextFormatter())->setStyles( TextFormatter::BOLD, TextFormatter::UNDERLINE );
$textFormatter = new TextFormatter();

echo $header->setText( 'Classic palette, normal:' ) . PHP_EOL;
for( $i = 30; $i < 38; $i++ )
	echo $textFormatter
		->setText( sprintf( " %03s ", $i ) )
		->setBackgroundColor( new Classic( $i ) );
echo PHP_EOL;

echo $header->setText( 'Classic palette, light:' ) . PHP_EOL;
for( $i = 90; $i < 98; $i++ )
	echo $textFormatter
		->setText( sprintf( " %03s ", $i ) )
		->setBackgroundColor( new Classic( $i ) );
echo PHP_EOL . PHP_EOL;

echo $header->setText( 'Extended palette: ' ) . PHP_EOL;
for( $i = 0; $i < 256; $i++ )
	echo $textFormatter
		->setText( sprintf( " %03s ", $i ) )
		->setBackgroundColor( new Extended( $i ) );
echo PHP_EOL;
```

