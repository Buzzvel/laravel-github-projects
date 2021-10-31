<?php

namespace Buzzvel\LaravelGithubProjects;

use Buzzvel\LaravelGithubProjects\Services\LaravelGithubProjectsServices;
use Illuminate\Support\Facades\Cache;
use Exception;

/**
 *
 * Class responsible for connecting to github
 
 * @package GithubProjectsServices
 * @author Luiz F. Lima <luiz.pereira@buzzvel.com>
 * @copyright Luiz F. Lima © 2021
 * @version 1.0
 */
class LaravelGithubProjects extends LaravelGithubProjectsServices
{

    /**
     * Query string parameters
     * @var array
     */
    private array $params = [];
        
    /**
     * The property stores the resource that will be sent to the endpoint.
     * @var string
     */
    private string $resouce = '';
    
    /**
     * Get list projects or total of projects
     * @return int|string
     */
    public function get(){
        if(!strlen($this->resouce)) throw new Exception("Use the orgs() or user() chained method before get()", 1);
        
        return Cache::remember($this->resouce, 60*60*24, function(){
            return $this->send('get', $this->resouce, $this->params);
        });
    }
    
    /**
     * Set total to true
     * @return GithubProjects
     */
    public function total(){
        $this->total = true;
        return $this;
    }
    
    /**
     * Set total to false
     * @return GithubProjects
     */
    public function list(){
        $this->total = false;
        return $this;
    }
    
    /**
     *Set visibility
     * @param string $visibility all, private or public
     * @return GithubProjects
     */
    public function visibility($visibility = 'all'){
        $this->visibility = $visibility;
        return $this;
    }
    
    /**
     * method responsible for setting the return of user repositories
     * @return GithubProjects
     */
    public function user(){
        $this->params = [
            'visibility'  => $this->visibility,
            'affiliation' => $this->affiliation
        ];
        
        $this->resouce = 'user.repos';
        return $this;
    }
    
    /**
     * method responsible for setting the organization's repositories return
     * @return GithubProjects
     */
    public function orgs(){
        $this->params = [ 'orgs' => $this->username ];
        $this->resouce = 'orgs.repos';
        return $this;
    }
    
}