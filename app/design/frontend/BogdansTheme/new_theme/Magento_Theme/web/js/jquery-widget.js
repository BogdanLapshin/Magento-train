define([
    'jquery',
    'jquery-ui-modules/widget'
], function($,_){
    $.widget('mage.jqueryWidget', {
        _create: function() {
            this.element[0].addEventListener("click",this.zoom)
        },
        zoom: function (event){
            event.target.parentNode.classList.toggle('picture-active');
            return "click";
        }
    });

    return $.mage.jqueryWidget;
});
