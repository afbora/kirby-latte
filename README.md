# Kirby Latte ☕

[![Source](https://img.shields.io/badge/source-afbora/kirby--latte-blue?style=flat-square)](https://github.com/afbora/kirby-latte)
[![Download](https://img.shields.io/packagist/dt/afbora/kirby-latte?style=flat-square)](https://github.com/afbora/kirby-latte)
[![Open Issues](https://img.shields.io/github/issues-raw/afbora/kirby-latte?style=flat-square)](https://github.com/afbora/kirby-latte)
[![Last Commit](https://img.shields.io/github/last-commit/afbora/kirby-latte?style=flat-square)](https://github.com/afbora/kirby-latte)
[![Release](https://img.shields.io/github/v/release/afbora/kirby-latte?style=flat-square)](https://github.com/afbora/kirby-latte)
[![License](https://img.shields.io/github/license/afbora/kirby-latte?style=flat-square)](https://github.com/afbora/kirby-latte)

This plugin use Latte `latte/latte` 2.x package and compatible with Kirby 3. For detailed information, you can browse the [Latte documents](https://latte.nette.org/en/guide).

## Installation

### Installation with composer

```ssh
composer require afbora/kirby-latte
```

### Add as git submodule

```ssh
git submodule add https://github.com/afbora/kirby-latte.git site/plugins/kirby-latte
```

## What is Latte?

According to Latte documentation is:

> Latte is a template engine for PHP which eases your work and ensures the output is protected against vulnerabilities, such as XSS.
> - Latte is fast: it compiles templates to plain optimized PHP code.
> - Latte is secure: it is the first PHP engine introducing context-aware escaping and link checking.
> - Latte speaks your language: it has intuitive syntax and helps you to build better websites easily.

## Usage

It will be sufficient to upload the latte file to the templates folder according to the template name. For ex: `/site/templates/default.latte` for default template.

All the documentation about Latte is in the [official documentation](https://latte.nette.org/en/guide).

## Options

The default values of the package are:

| Option | Default | Values | Description |
|:---|:---|:---|:---|
| afbora.kirby-latte.templatesDirectory | site/templates | (string) | Location of the templates |
| afbora.kirby-latte.tempDirectory | site/cache/temp | (string) | Location of the cached templates |
| afbora.kirby-latte.filters | [] | (array) | Array with the custom filters |
| afbora.kirby-latte.functions | [] | (array) | Array with the custom functions |
| afbora.kirby-latte.macros | [] | (array) | Array with the custom macros |
| afbora.kirby-latte.autoRefresh | true | (boolean) | Automatically regenerates the caches |

All the values can be updated in the `config.php` file.

### Templates

Default templates folder is `site/templates` directory or wherever you define your `templates` directory, but you can change this easily:

```php
'afbora.kirby-latte.templatesDirectory' => '/theme/default/templates',
```

You can find latte templates for Kirby Starterkit in repository `/templates` folder.

```
├── layouts
│   └── default.latte
├── blocks
│   └── intro.latte
├── about.latte
├── album.latte
├── default.latte
├── home.latte
├── note.latte
├── notes.latte
└── photography.latte
```

All the views generated are stored in `site/cache/temp` directory or wherever you define your `cache` directory, but you can change this easily:

```php
'afbora.kirby-latte.tempDirectory' => '/site/storage/temp',
```

### Filters
[Filters Documentation](https://latte.nette.org/en/develop#toc-custom-filters)

Filters are functions that change or format the data to a form we want. [The built-in filters which are available](https://latte.nette.org/en/filters).

#### Usage filters

Latte allows calling filters by using the pipe sign notation (preceding space is allowed):

````php
<h1>{$heading|upper}</h1>
````

Custom filters can be registered this way:

```php
'afbora.kirby-latte.filters' => [
    'shortify' => function (string $s): string {
        return mb_substr($s, 0, 10); // shortens the text to 10 characters
    }
]
```

We use it in a template like this:

```php
<p>{$text|shortify}</p>
<p>{$text|shortify:100}</p>
```

### Functions
[Functions Documentation](https://latte.nette.org/en/develop#toc-functions)

In Latte you can use all PHP functions and at the same time define your own:

```php
'afbora.kirby-latte.functions' => [
    'random' => function (...$args) {
        return array_rand($args);
    }
],
```

The usage is then the same as when calling the PHP function:

```php
{random('apple', 'orange', 'lemon')} // prints for example: apple
```

### Macros (User-defined Tags)
[Macros Documentation](https://latte.nette.org/en/develop#toc-user-defined-tags)

Latte provides API for making your own tags. It isn't difficult at all. Tags are added in sets (a set can consist of a single tag).

In Latte you can use all PHP functions and at the same time define your own:

```php
'afbora.kirby-latte.macros' => [
    [
        'try', // tag name
	    'try {',  // PHP code replacing the opening brace
	    '} catch (\Exception $e) {}' // code replacing the closing brace
    ]
]
```
