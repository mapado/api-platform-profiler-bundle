API Platform profiler bundle
========================

## ! Deprecated package !

This package has been merged into api-platform core via https://github.com/api-platform/core/pull/1707

It will be soon released in api-platform core, so no further developpement will be done here.

A profiler extension for api-platform server. Display resource information in the Symfony debug toolbar

![Example](https://screenshotscdn.firefoxusercontent.com/images/0217a94d-b6a4-43a1-9217-d33dd2612690.png)

## Installation
`composer require mapado/api-platform-profiler-bundle`

Add `new Mapado\ApiPlatformProfilerBundle\MapadoApiPlatformProfilerBundle(),` in your `AppKernel.php` or `bundles.php` file for **dev** environment.
