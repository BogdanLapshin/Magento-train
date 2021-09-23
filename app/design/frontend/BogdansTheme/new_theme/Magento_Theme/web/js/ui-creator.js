define([
    'uiComponent',
    'ko'
], function (Component, ko) {
    'use strict';

    return Component.extend({
        defaults: {
            inputText: ko.observable('1')
        },
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
