define([
    'jquery'
], function ($) {
    'use strict';
    return function (widget) {
        $.widget('mage.jqueryWidget', widget, {
            zoom: function (event){
                event.target.parentNode.classList.toggle('picture-active-second');
                return this._super();
            }
        });
        return $.mage.jqueryWidget;
    }
});
