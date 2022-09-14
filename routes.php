<?php
use EvolutionCMS\Sitemapxml\Controllers\SitemapXML;
use Illuminate\Support\Facades\Route;

Route::get('/sitemap.xml', [SitemapXML::class, 'create'])->name('sitemap.xml');
