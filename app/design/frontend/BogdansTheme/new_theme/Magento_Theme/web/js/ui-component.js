define(['uiComponent'], function (Component) {
    'use strict';
    return function () {
        console.log(Component());
        return Component;
    }
});
