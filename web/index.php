<?php
require_once __DIR__."/../vendor/autoload.php";

$app = new Silex\Application();
$app->register(new Silex\Provider\ServiceControllerServiceProvider());
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
use Symfony\Component\HttpFoundation\Request as Request;

// Template engine
$app->register(new Silex\Provider\TwigServiceProvider(), array(
  "twig.path" => __DIR__."/../app/views",
));

// Database
LaravelBook\Ardent\Ardent::configureAsExternal([
  "default" => "dev",
  "connections" => [
    "dev" => [
      "driver"    => "mysql",
      "host"      => "127.0.0.1",
      "port"      => 3306,
      "database"  => "myDB",
      "username"  => "root",
      "charset"   => "utf8",
      "collation" => "utf8_unicode_ci"
    ],
    "test" => [
      "driver" => "sqlite",
      "database" => ":memory:",
      "prefix" => ""
    ]
  ]
]);

//Session
$app->register(new Silex\Provider\SessionServiceProvider);

// Auth
use Cartalyst\Sentry\Facades\Native\Sentry as Sentry;
//Sentry::setupDatabaseResolver(new PDO("mysql:host=127.0.0.1;dbname=myDB", "root", ""));

// Set environment
if (isset($app_env) && in_array($app_env, array("prod", "dev", "test")))
{
  $app["env"] = $app_env;
}
else {
  $app["env"] = "prod";
}

// Debug mode
$app["debug"] = true;
if($app["debug"])
{
  $app->register(new Whoops\Provider\Silex\WhoopsServiceProvider);
}

// Router
$app->get("/", function(Request $request) use ($app){
  $home = new Controller\Homepage($app);
  return $home->index();
});

// Check environment
if($app["env"] === "test")
{
  return $app;
}
else {
  $app->run();
}
