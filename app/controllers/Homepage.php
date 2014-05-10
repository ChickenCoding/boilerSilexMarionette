<?php
namespace Controller;

class Homepage
{
  private $app;

  public function __construct($app)
  {
    $this->app = $app;
  }
  public function index()
  {
    return $this->app["twig"]->render("homepage.twig", [
      "title" => "my title?"
    ]);
  }
}
