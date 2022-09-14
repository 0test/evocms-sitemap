<?php 
namespace EvolutionCMS\Sitemapxml;

use EvolutionCMS\ServiceProvider;
use EvolutionCMS\Sitemapxml\Controllers\SitemapXML;

class SitemapxmlServiceProvider extends ServiceProvider
{
    protected $namespace = 'sitemapxml';
    public function register()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes.php');
        $this->app->alias(SitemapXML::class, 'SitemapXml');
    }
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../publishable/configs' => EVO_CORE_PATH .'custom/sitemapxml/config',
        ]);
    }
}