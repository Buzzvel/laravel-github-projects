<?php

namespace Buzzvel\LaravelGithubProjects\Services;

use Exception;
use GuzzleHttp\Client;

/**
 *
 * Class responsible for connecting to github
 
 * @package GithubProjectsServices
 * @author Luiz F. Lima <luiz.pereira@buzzvel.com>
 * @copyright Luiz F. Lima © 2021
 * @version 1.0
 */
class LaravelGithubProjectsServices
{
    /**
     * Defines whether to return the total of projects or listing
     * @var boolean
     */
    protected $total = false;

    /**
     * Defines to return only user projects
     * @var string
     */
    protected $affiliation = "owner";

    /**
     * Defines that it should return all projects
     * @var string
     */
    protected $visibility = "all";

    /**
     * Github account username
     * @var string
     */
    protected $username = '';

    /**
     * Personal access token of github
     * how generate personal access token? Use this link below
     * @link https://docs.github.com/pt/authentication/keeping-your-account-and-data-secure/creating-a-personal-access-token
     * @var string
     */
    private $personalAccessToken = '';

    /**
     * Endpoint of github
     * @var string
     */
    private $baseUri = 'https://api.github.com';

    /**
     * Construct
     * @param string $username
     * @param string $personalAccessToken
     */
    public function __construct()
    {
        $this->username = config('githubprojects.username');
        $this->personalAccessToken   = config('githubprojects.personal_access_token');
    }

    /**
     * The following method is responsible for returning the github resource to use
     * @param string $resource
     * @param array $params True for  convert for default url
     * @param boolean $encode 
     * @return string Endpoint for request
     */
    private function getEndpoint(string $resource, array $params = [], bool $encode = true)
    {
        $resources = [
            "user.repos" => '/user/repos?visibility={visibility}&affiliation={affiliation}',
            "orgs.repos" => '/orgs/{orgs}/repos?type=all&per_page=100'
        ];

        $endpoint = $this->baseUri . $resources[$resource];

        foreach ($params as $parameter => $value) {
            if ($encode) $value = rawurlencode($value); // convert for default url
            $endpoint = str_replace('{' . $parameter . '}', $value, $endpoint);
        }

        return $endpoint;
    }

    /**
     * Request header
     * @return array
     */
    private function getHeaders()
    {
        return [
            "headers" => [
                "Accept" => "application/vnd.github.v3+json"
            ],
            "auth" => [$this->username, $this->personalAccessToken],
        ];
    }

    /**
     * The following method is responsible for sending request to github
     * @param string $method
     * @param string $resource
     * @param array $params 
     * @return string Response
     */
    protected function send(string $method = 'GET', string $resource, array $params = [])
    {
        try {
            $endpoint     = $this->getEndpoint($resource, $params);
            $headers      = $this->getHeaders();
            $client       = new Client();
            $response     = $client->request($method, $endpoint, $headers);
            $response     = $response->getBody()->getContents();

            if ($this->total) return count(json_decode($response));

            return $response;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 1);
        }
    }
}
