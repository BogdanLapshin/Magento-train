define([
    'jquery',
    "Magento_Ui/js/modal/modal",
    'domReady!'
], function ($, modal) {

        return function () {
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
