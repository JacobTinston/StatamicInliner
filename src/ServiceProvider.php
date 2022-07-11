<?php

namespace Surgems\Inliner;

use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $tags = [
        \Surgems\Inliner\Tags\Inliner::class
    ];
    
    public function bootAddon()
    {
        //
    }
}
