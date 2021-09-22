/*------Requirejs-config------*/
var config = {
    map: {
        '*': {
            objectCreator: 'Magento_Theme/js/object-creator',
            objectEditor: 'Magento_Theme/js/object-editor',
            uiCreator: 'Magento_Theme/js/ui-creator'
        }
    },
    config: {
        mixins: {
            'Magento_Theme/js/object-creator': {
                'Magento_Theme/js/object-creator-mixin': true
            },
            'Magento_Theme/js/ui-creator': {
                'Magento_Theme/js/ui-mixin': true
            }
        }
    }
}
