<?php
namespace EvolutionCMS\SitemapXml\Controllers;
use EvolutionCMS\Models\SiteContent;
use EvolutionCMS\SitemapXml\Models\XmlElement;

class SitemapXML extends SiteContent
{
	public $config = [];
	public $resources = [];
	public function __construct()
	{
		$this->config = $this->getConfig();
	}
	private function getConfig()
	{
		//	ищем файл, тащим массив
		if (file_exists(EVO_CORE_PATH . 'custom/packages/sitemapxml/config/config.php')) {
			$_config = include_once(EVO_CORE_PATH . 'custom/packages/sitemapxml/config/config.php');
		}
		//	Проверяем на заполненность
		$this->config['exclude'] = isset($_config['exclude']) && !empty($_config['exclude']) ? $_config['exclude'] : null;
		$this->config['frequency'] = isset($_config['frequency']) && !empty($_config['frequency']) ? $_config['frequency'] : null;
		$this->config['priority'] = isset($_config['priority']) && !empty($_config['priority']) ? $_config['priority'] : null;
		$this->config['exclude_templates'] =   isset($_config['exclude_templates']) && !empty($_config['exclude_templates']) ? $_config['exclude_templates'] : null;

		$this->config['frequency_default'] = isset($_config['frequency_default']) && !empty($_config['frequency_default']) ? $_config['frequency_default'] : 'daily';

		$this->config['priority_default'] = isset($_config['priority_default']) && !empty($_config['priority_default']) ? $_config['priority_default'] : '0.5';


		//	Отдаём конфиг
		return $this->config;
	}
	public function create()
	{
		$query = XmlElement::active();

		if (!empty($this->config['exclude'])) {
			// Объявлен ТВ для исключения из карты сайта
			$query = $query->withTVs([$this->config['exclude']]);
			$query = $query->tvFilter("tv:".$this->config['exclude'].":null");
		}
		if (!empty($this->config['frequency'])) {
			// Объявлен ТВ для "Период обновления"
			$query = $query->withTVs([$this->config['frequency'] ]);

		}
		if (!empty($this->config['priority'])) {
			// Объявлен ТВ для "Приоритет страницы"
			$query = $query->withTVs([$this->config['priority'] ]);
		}
		if (!empty($this->config['exclude_templates'])) {
			//	Есть исключенные шаблоны
			$query = $query->whereNotIn('template',$this->config['exclude_templates']);
		}
		$results = $query->get();
		
		//	пройдёмся по массиву, уберём лишнее, поставим нужное
		foreach ($results as $key => $result) {
			$this->resources[$key]['id'] = $result['id'];
			$this->resources[$key]['url'] = $result->formattedUrl;
			$this->resources[$key]['editDate'] = $result->lastmodDate;

			if (!empty($this->config['frequency'])) {
				$this->resources[$key]['frequency'] = !empty($result[$this->config['frequency']]) ? $result[$this->config['frequency']] : $this->config['frequency_default'];
			}
			if (!empty($this->config['priority'])) {
				$this->resources[$key]['priority'] = !empty($result[$this->config['priority']]) ? $result[$this->config['priority']] : $this->config['priority_default'];
			}
		}
		return response()->view('sitemapxml::sitemap', ['resources' => $this->resources])->header('Content-type', 'text/xml');
	}
}
