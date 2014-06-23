<?php
namespace Controller;
use Silex\Application as Application;

/**
 *  @package Controller
 *  @class HomepageController
 */
class HomepageController
{
  /**
   *  Render the homepage
   *
   *  @method object index(Application $app)
   */
  public function index(Application $app)
  {
    return $app["twig"]->render("homepage.twig", [
      "title" => "my title?"
    ]);
  }
}
