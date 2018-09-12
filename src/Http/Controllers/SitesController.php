<?php

namespace OhDear\OhDearTool\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use OhDear\OhDearTool\File;
use Illuminate\Support\Facades\File as IlluminateFile;
use OhDear\PhpSdk\OhDear;
use OhDear\PhpSdk\Resources\Site;
use Symfony\Component\Finder\SplFileInfo;
use Illuminate\Routing\Controller;

class SitesController extends Controller
{
    public function index()
    {
        return config('oh-dear-tool.sites');
    }

    public function show(int $siteId)
    {
       // return Cache::remember("oh-dear-site-{$siteId}", 1, function() use ($siteId) {
            $site = $this->getSite($siteId);

            return [
                'site' => $site,
                'brokenLinks' => $site->brokenLinks(),
                'mixedContent' => $site->mixedContent(),
                'downtime' => $site->downtime(
                    now()->subDays(7)->format('YmdHis'),
                    now()->format('YmdHis')
                ),
                'uptime' => $site->uptime(
                    now()->subYear()->format('YmdHis'),
                    now()->format('YmdHis'),
                    'month'
                ),
            ];
       // });
    }

    protected function getSite(int $siteId): Site
    {
        return app(OhDear::class)->site($siteId);
    }


}