define [
  "marionette"
], (( Marionette) ->
  class MainController extends Marionette.Controller
    initialize: ->
      console.log "in controller"

    home : ->
      console.log "home"
)
