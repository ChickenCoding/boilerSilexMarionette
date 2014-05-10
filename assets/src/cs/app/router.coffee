define [
  "marionette"
  "controller/maincontroller"
], ((Marionette, MainController) ->
  class Router extends Marionette.AppRouter
    controller: MainController
    appRoutes:
      "": "home"
      "home": "home"
)
