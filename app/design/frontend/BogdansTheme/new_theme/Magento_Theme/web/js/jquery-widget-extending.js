define([
    'jquery',
    'jquery/ui',
    'Magento_Theme/js/jquery-widget'
], function ($) {

    $.widget('mage.extend', $.mage.jqueryWidget, {
        _init: function (){
            console.log("Extending widget!")
        }
    });
    return $.mage.extend;
});
