define([
    'uiComponent'
], function (Component) {
    'use strict';

    return Component.extend({
        initialize: function () {
            this._super();
            console.log('It is a UI component!');
            console.log(Component());
            this.customFunc();

            return this;
        },

        customFunc: function () {
            console.log('This is customFunc');
        }
    })
});
