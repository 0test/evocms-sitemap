<?php
use EvolutionCMS\SitemapXml\Controllers\SitemapXML;
use Illuminate\Support\Facades\Route;

Route::get('/sitemap.xml', [SitemapXML::class, 'create'])->name('sitemap.xml');
