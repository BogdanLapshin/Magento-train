define([

], function () {
    'use strict';
    return function (uiCreatorComp) {
        return uiCreatorComp.extend({
            customFunc: function () {
                this._super();
                console.log('It is a mixin on customFunc from parent ui component!');

                return this;
            }
        });
    }
});
