
<?php

/**
 *  Routes
 *
 *  @File src/app.php
 */
$app = require __DIR__ . "/../app/bootstrap.php";

/**
 *  Before each request, do the session check
 *  using Silex\Provider\SessionServiceProvider
 *
 *  A before() application middleware allows you
 *  to tweak the Request before the controller
 *  is executed
 *
 *  @method before middleware
 */
$app->before(function ($request) use ($app) {

  /**
   *  Starts the session,
   *  equivalent to php function session_start()
   */
  $app["session"]->start();
});

/**
 *  Routes binded to Controllers
 */
$app->get("/",    "Controller\HomepageController::index")
  ->bind("homepage");

return $app;
