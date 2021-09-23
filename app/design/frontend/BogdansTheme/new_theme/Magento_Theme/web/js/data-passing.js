define([
    'jquery',
    'domReady!'
], function ($) {
    return function (config){
        console.log(config.data);

        $(function () {
            console.log(config.data);
        })

        return this;
    }
});
