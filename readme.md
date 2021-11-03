# LaravelGithubProjects

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]

The respective package aims to return a listing or total of public, private or all projects.

## Installation

Via Composer

``` bash
$ composer require buzzvel/laravel-github-projects
```

Publishing the provider

``` bash
$ php artisan vendor:publish --provider="Buzzvel\LaravelGithubProjects\LaravelGithubProjectsServiceProvider" 
```

Declare variables in .env

```
GITHUB_USERNAME=<YOUR_ORANIZATION_NAME>
GITHUB_PERSONAL_ACCESS_TOKEN=<YOUR_PERSONAL_ACCESS_TOKEN>
```

## Usage

**Listing all repositories owned by user github**
``` php
LaravelGithubProjects::user()->get();
```
It is also possible to put the visibility() method in the user() method and pass it as a public or private parameter to return the listing according to desired visibility.

**Example:**
``` php
LaravelGithubProjects::user()->visibility('private')->get();
```

**Listing all repositories belonging to the organization**
``` php
LaravelGithubProjects::orgs()->get();
```

To return the total of repositories, just chain the total() method

**Examples:**

``` php
// total user's private projects
LaravelGithubProjects::user()->visibility('private')->total()->get();

// total of organization's projects
LaravelGithubProjects::orgs()->total()->get();

```





## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email developers@buzzvel.com instead of using the issue tracker.

## Credits

- [Luiz F. Lima](https://github.com/hendrix97s)
- [All Contributors][link-contributors]

## License

MIT. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/buzzvel/laravel-github-projects.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/buzzvel/laravel-github-projects.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/buzzvel/laravel-github-projects/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/buzzvel/laravel-github-projects
[link-downloads]: https://packagist.org/packages/buzzvel/laravel-github-projects
[link-travis]: https://travis-ci.org/buzzvel/laravel-github-projects
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/buzzvel
[link-contributors]: ../../contributors
