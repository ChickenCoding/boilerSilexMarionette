<?php
namespace Controller;
use Silex\Application as Application;

class HomepageController
{
  public function index(Application $app)
  {
    return $app["twig"]->render("homepage.twig", [
      "title" => "my title?"
    ]);
  }
}
