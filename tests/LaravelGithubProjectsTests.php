<?php

namespace Buzzvel\LaravelGithubProjects\Tests;

use Buzzvel\LaravelGithubProjects\LaravelGithubProjects;
use Buzzvel\LaravelGithubProjects\Services\LaravelGithubProjectsServices;
use Orchestra\Testbench\TestCase;

class LaravelGithubProjectsTests extends TestCase{

    public function test_total_projects_on_org_github(){
        $laravelGithubProjects = new LaravelGithubProjects();
        $result = $laravelGithubProjects->orgs()->total()->get();
        $expected = 40;
        $this->assertSame($expected, $result);
    }
}
