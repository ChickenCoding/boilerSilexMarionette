(function() {
  var __hasProp = {}.hasOwnProperty,
    __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; };

  define(["../../../../assets/dist/js/app/models/leModel"], (function(LeModel) {
    var LeView;
    LeView = (function(_super) {
      __extends(LeView, _super);

      function LeView() {
        return LeView.__super__.constructor.apply(this, arguments);
      }

      LeView.prototype.model = LeModel;

      return LeView;

    })(Marionette.ItemView);
    return describe("hello", function() {
      return it("should say hello", function() {
        return true.should["true"];
      });
    });
  }));

}).call(this);
