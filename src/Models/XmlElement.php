<?php
namespace EvolutionCMS\SitemapXml\Models;
use Carbon\Carbon;
use EvolutionCMS\Facades\UrlProcessor;
use EvolutionCMS\Models\SiteContent;
use Illuminate\Database\Eloquent;

class XmlElement extends SiteContent{
	protected $table = 'site_content';
   
	
	public function getLastmodDateAttribute()
	{
		$date = $this->createdon;
		if( !empty($this->editedon)){
			$date = $this->editedon;
		}
		return Carbon::parse($date)->format('c');
	}

	public function getFormattedUrlAttribute()
	{
		return UrlProcessor::makeUrl($this->id, '', '', 'full');
	}
	/*
	protected static function booted()
    {
        static::addGlobalScope('custom_parent', function (Builder $builder) {
            $builder->where('parent', 4);
        });
    }
	*/

}