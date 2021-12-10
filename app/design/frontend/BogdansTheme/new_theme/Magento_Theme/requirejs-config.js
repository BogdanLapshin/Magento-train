/*------Requirejs-config------*/
var config = {
    map: {
        '*': {
            objectCreator: 'Magento_Theme/js/object-creator',
            objectEditor: 'Magento_Theme/js/object-editor',
            uiCreator: 'Magento_Theme/js/ui-creator',
            uiXML: 'Magento_Theme/js/ui-xml',
            dataPassing: 'Magento_Theme/js/data-passing',
            jqueryWidget: 'Magento_Theme/js/jquery-widget',
            jqueryWidgetExt: 'Magento_Theme/js/jquery-widget-extending',
            headerController: 'Magento_Theme/js/header-controller'
        }
    },
    config: {
        mixins: {
            'Magento_Theme/js/object-creator': {
                'Magento_Theme/js/object-creator-mixin': true
            },
            'Magento_Theme/js/ui-creator': {
                'Magento_Theme/js/ui-mixin': true
            },
            'Magento_Theme/js/jquery-widget': {
                'Magento_Theme/js/jquery-widget-mixin': true
            }
        }
    }
}
