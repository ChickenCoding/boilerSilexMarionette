define [
  "../../../../assets/dist/js/app/models/leModel"
], (( LeModel) ->
  class LeView extends Marionette.ItemView
    model : LeModel
  describe "hello", ->
    it "should say hello", ->
      true.should.true
)

