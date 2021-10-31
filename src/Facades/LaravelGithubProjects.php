<?php

namespace Buzzvel\LaravelGithubProjects\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelGithubProjects extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-github-projects';
    }
}
