require.config
  deps: ["app"]

  paths:
    jquery : "../vendor/jquery"
    backbone : "../vendor/backbone"
    underscore : "../vendor/underscore"
    marionette : "../vendor/marionette"
    validate : "../vendor/validate"

  shim:
    jquery :
      exports : "$"
    backbone :
      deps : ["underscore", "jquery"]
      exports : "Backbone"
    marionette :
      deps : ["backbone"]
      exports : "Marionette"
    validate :
      deps : ["underscore", "backbone"]
      exports : "Validate"

require [
  "marionette"
  "router"
  "controller/maincontroller"
], ((
  Marionette
  Router
  MainController
) ->
  $ ->
    @app = new Marionette.Application()
    @app.on "initialize:before", =>
      @controller = new MainController()
      @router = new Router(controller: @controller)

    @app.on "initialize:after", ->
      Backbone.history.start() unless Backbone.history.started

    @app.start()
)
