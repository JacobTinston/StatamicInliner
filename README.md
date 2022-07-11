# Inliner

> Inliner is a Statamic addon that turns external assets into inline HTML.

## Features

This addon does:

- Inlines external JS/CSS files
- Minifies these files

## How to Install

You can use this addon by running the following command from your project root:

``` bash
composer require surgems/inliner
```

## How to Use

To inline your external assets, just use the inliner tag allong with the path to your asset file:

``` antlers
{{ inliner src="css/app.css" }}
```

``` antlers
{{ inliner src="js/app.js" }}
```

To Minify these assets, just add the minify tag (the default is false):

``` antlers
{{ inliner src="css/app.css" minify="true" }}
```
