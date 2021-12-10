define(['jquery'
], function ($) {
    'use strict';
    return function () {
        console.log($('.header.content')[0]);
        $('.header-menu')[0].addEventListener('click',(event)=>{
            switch(event.target.getAttribute("class").split(" ")[1]){
                case "search-item":
                    $('.header.content')[0].classList.toggle('search-non-active');
                    break;
                case "account-item":
                    console.log("account-item");
                    break;
                case "cart-item":
                    $('.minicart-wrapper')[0].classList.toggle('search-non-active');
                    break;
            }
        })
    };
});
