/*------Requirejs-config------*/
var config = {
    map: {
        '*': {
            objectCreator: 'Magento_Theme/js/object-creator',
            objectEditor: 'Magento_Theme/js/object-editor',
            customUiComponent: `Magento_Theme/js/ui-component`
        }
    },
    config: {
        mixins: {
            'Magento_Theme/js/object-creator': {
                'Magento_Theme/js/object-creator-mixin': true
            }
        }
    }
}
