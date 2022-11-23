<?php 
return [
	'exclude' => 'sitemap_exclude',		// имя параметра TV типа checkbox для "Исключить из карты сайта"
	'frequency'=> 'sitemap_changefreq', // имя параметра TV типа dropdown для "Частота обновления"
	'frequency_default' => 'dayly',		// частота обновления по-умолчанию
	'priority'=> 'sitemap_priority',	// имя параметра TV типа dropdown для "Приоритет в карте сайта"
	'priority_default' => '0.5',		// приоритет по-умолчанию
	'exclude_templates' => [0,4],			// ID шаблонов, которые нужно исключить из карты сайта.
];