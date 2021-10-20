define([
    'uiComponent'
], function (Component) {
    'use strict';
    return Component.extend({
        cartUrl: window.checkoutConfig.cartUrl,

        initialize: function () {
            this._super();
            console.log("this is btn checkout!");
            return this;
        }
    });
});
