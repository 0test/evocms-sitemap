<?php 
namespace EvolutionCMS\SitemapXml;
use EvolutionCMS\ServiceProvider;
use EvolutionCMS\SitemapXml\Controllers\SitemapXML;

class SitemapXmlServiceProvider extends ServiceProvider
{
    protected $namespace = 'sitemapxml';
    
    public function register()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes.php');
        $this->app->alias(SitemapXML::class, 'sitemapxml');
    }
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../views', $this->namespace);

        $this->publishes([
            __DIR__ . '/../publishable/config' => EVO_CORE_PATH .'custom/packages/sitemapxml/config',
        ]);
    }
}