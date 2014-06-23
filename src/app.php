
<?php

/**
 *  Routes
 *
 *  @File src/app.php
 */
$app = require __DIR__ . "/../app/bootstrap.php";

/**
 *  Routes binded to Controllers
 */
$app->get("/",    "Controller\HomepageController::index")
  ->bind("homepage");

return $app;
