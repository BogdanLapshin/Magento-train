define([
    'jquery',
    "Magento_Ui/js/modal/modal",
    'domReady!',
    'mage/collapsible'
], function ($, modal) {
        return function () {
            $('.swatch-opt').on('click',".swatch-attribute.color",function (event){
                if(event.target.classList.contains("swatch-attribute-label")){
                    console.log(event.target.nextSibling.nextSibling.classList.toggle("non-active"));
                }
            })
            $('#modal_content').modal({
                'type': 'popup',
                'title': 'Popup title',
                'responsive': true,
                'buttons': [],
                closed: function() {
                    sessionStorage.setItem('modal', true);
                }
            })
            if ($.cookie('foo') == null) {
                if(sessionStorage.getItem('modal') == null) {
                    $('#modal_content').modal("openModal");
                    $('#newsletter-validate-detail')[0].addEventListener('submit', () => {
                        if ($('#newsletter-validate-detail').valid()) {
                            $.cookie('foo', 'true', {expires: 14})
                        }
                    })
                }
            }
        }
    })
