<?php

/**
 *  Run the main application
 *
 *  Application is registered and configured
 *  through the bootstrap.php file
 *
 *  Routes are defined in the app.php file
 *
 *  @File index.php
 */
$app = require __DIR__ . "/../src/app.php";
$app->run();
