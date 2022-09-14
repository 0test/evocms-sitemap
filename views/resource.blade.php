<url>
@if (!empty($resource['id']) )
    <loc>{{ $resource['url'] }}</loc>
@endif
@if (!empty($resource['editDate']))
    <lastmod>{{ $resource['editDate']  }}</lastmod>
@endif
@if (!empty($resource['frequency']))
    <changefreq>{{ $resource['frequency'] }}</changefreq>
@endif
@if (!empty($resource['priority']))
    <priority>{{ number_format($resource['priority'], 1) }}</priority>
@endif
</url>
