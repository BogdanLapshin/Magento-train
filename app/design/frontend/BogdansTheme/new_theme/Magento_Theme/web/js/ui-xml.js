define([
    'uiComponent'
], function (Component) {
    'use strict';
    return Component.extend({
        initialize: function () {
            this._super();
            console.log("UI using XML");
            return this;
        }
    });
});
