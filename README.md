# Evocms Sitemap XML

Генерирует по адресу /sitemap.xml карту сайта.

## Установка

```
php artisan package:installrequire 0test/evocms-sitemap "*"
```

```
php artisan vendor:publish --provider="EvolutionCMS\SitemapXml\SitemapXmlServiceProvider"
```
## Опции

Переименуйте и отредактируйте файл `core\custom\packages\sitemapxml\example.config.php` под свои нужды.
```php
return [
	'exclude' => 'sitemap_exclude',		// имя параметра TV типа checkbox для "Исключить из карты сайта"
	'frequency'=> 'sitemap_changefreq', // имя параметра TV типа dropdown для "Частота обновления"
	'frequency_default' => 'dayly',		// частота обновления по-умолчанию
	'priority'=> 'sitemap_priority',	// имя параметра TV типа dropdown для "Приоритет в карте сайта"
	'priority_default' => '0.5',		// приоритет по-умолчанию
	'exclude_templates' => [0,4],		// ID шаблонов, которые нужно исключить из карты сайта.
];
```
## Использование 
ТВ-параметры пакет не создаёт.

Вы можете сделать ТВ руками, или использовать [это](https://github.com/0test/seoTVs) решение.
```
sitemap_exclude 
// имя параметра TV типа checkbox для "Исключить из карты сайта"

sitemap_changefreq
// имя параметра TV типа dropdown для "Частота обновления"

sitemap_priority
// имя параметра TV типа dropdown для "Приоритет в карте сайта"
```
Может потом допишу. Или нет.