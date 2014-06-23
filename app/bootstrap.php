<?php

/**
 *  Configuration
 *
 *  @File app/bootstrap.php
 */
require_once __DIR__ . "/../vendor/autoload.php";

use Silex\Application;
use Silex\Extension\TwigExtension;
use Symfony\Component\HttpFoundation\Request as Request;
use Symfony\Component\HttpFoundation\Response as Response;
use Cartalyst\Sentry\Facades\Native\Sentry as Sentry;

/**
 *  Set current environment
 *  depending of the APP_ENV environment variable
 *
 *  Example for apache:
 *    SetEnv APP_ENV dev
 *
 *  Example for nginx with fcgi:
 *    fastcgi_param APP_ENV dev
 *
 *  @property $env string
 */
$env = getenv("APP_ENV")?:"prod";
$env = "dev";

/**
 *  New Application Object
 *
 *  @property $app
 */
$app = new Application();

/**
 *  Set Environment and configuration of this
 *
 */
if (isset($env) && in_array($env, array("prod", "dev", "test"))) {
  $app["env"] = $env;
  $app->register(new Whoops\Provider\Silex\WhoopsServiceProvider);
} else {
  $app["env"] = "prod";
}

/**
 *  Import and config vendors libraries
 *
 */
$app->register(new Silex\Provider\TwigServiceProvider, array(
  "twig.path" => __DIR__ . "/../app/views",
  "twig.options" => array("cache" => __DIR__ . "/../cache/twig")
));
$app->register(new Silex\Provider\SessionServiceProvider);
$app->register(new Igorw\Silex\ConfigServiceProvider(__DIR__ . "/../config/$env.php"));
$app->register(new Silex\Provider\ServiceControllerServiceProvider());
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());


return $app;
