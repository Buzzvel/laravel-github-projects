<br><br>

<div align="center">  
  
  <a href="https://buzzvel.com/">
    <img alt="Buzzvel" height="80" src="https://raw.githubusercontent.com/Buzzvel/laravel-github-projects.buzzvel.work/main/buzzvel.png">
  </a>
</div>

<br>


## Laravel Github Projects 
<img src="https://img.shields.io/static/v1?label=stable&message=V1.0&color=green"> <img src="https://img.shields.io/static/v1?label=MIT&message=license&color=green">

<br>
The respective package aims to return a listing or the total projects or public, private or all.

<br>

## Installation

Via Composer

```
$ composer require buzzvel/laravel-github-projects
```

After installing the package via composer, just instantiate the “GithubProjects” class passing as parameters the github data such as username and personal access token.

How to create personal access token? [Click here](https://docs.github.com/en/authentication/keeping-your-account-and-data-secure/creating-a-personal-access-token)

#### Instantiating the GithubProjects class:
```
$githubProjects  = new GithubProjects($username, $personalAccessToken);
```

#### List all projects from the respective github account:

```
$githubProjects->get();
```

#### List all private projects:

```
$githubProjects->visibility('private')->get();
```

#### List all public projects:
```
$githubProjects->visibility('public')->get();
```

#### Get the total of all projects:
```
$githubProjects->total()->get();
```

#### Get the total of private projects:
```
$githubProjects->total()->visibility('private')->get();
```

#### Get the total of public projects:
```
$githubProjects->total()->visibility('public')->get();
```

## License
The MIT Public License. Please see <a href="https://github.com/Buzzvel/laravel-github-projects.buzzvel.work/blob/main/LICENSE">LICENSE</a> for more information.

## Autor

<a href="https://buzzvel.com/">
 <img style="border-radius: 50%;" src="https://raw.githubusercontent.com/Buzzvel/laravel-github-projects.buzzvel.work/main/buzzvel.png" width="100px;" alt=""/>
</a>

CUSTOM DEVELOPMENT FOCUSED ON YOUR SUCCESS

[![Linkedin Badge](https://img.shields.io/badge/-Buzzvel-blue?style=flat-square&logo=Linkedin&logoColor=white&link=https://www.linkedin.com/company/buzzvel/)](https://www.linkedin.com/company/buzzvel/) 
[![Gmail Badge](https://img.shields.io/badge/-developers@buzzvel.com-c14438?style=flat-square&logo=Gmail&logoColor=white&link=mailto:developers@buzzvel.com)](mailto:developers@buzzvel.com)
