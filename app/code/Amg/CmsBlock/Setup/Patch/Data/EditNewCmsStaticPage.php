<?php

namespace Amg\CmsBlock\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchVersionInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Cms\Model\BlockFactory;
use Magento\Cms\Model\PageFactory;

class EditNewCmsStaticPage implements DataPatchInterface, PatchVersionInterface
{
    private $moduleDataSetup;
    private $pageFactory;
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        PageFactory $pageFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->pageFactory = $pageFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        $this->moduleDataSetup->startSetup();
        $EditPageContent = '<div>Editing Page</div>';
        $EditPage = $this->createPage()->load(
            'mag-39-page',
            'identifier'
        );
        $EditPageId = $EditPage->getId();
        if ($EditPageId) {
            $EditPage->setContent($EditPageContent);
            $EditPage->save();
        } else {
            $pageData = [
                'title' => 'My Page Title',
                'page_layout' => '1column',
                'meta_keywords' => '',
                'meta_description' => '',
                'identifier' => 'mag-39-page',
                'content_heading' => '',
                'content' => '<h1>Content goes here</h1>'.
                    '{{block class="Magento\Cms\Block\Block" block_id="mag-39-block"}}',
                'layout_update_xml' => '',
                'url_key' => 'mag-39',
                'is_active' => 1,
                'stores' => [0], // store_id comma separated
                'sort_order' => 0
            ];
            $this->pageFactory->create()->setData($pageData)->save();
        }
        $this->moduleDataSetup->endSetup();
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public static function getVersion()
    {
        return '2.0.0';
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }
    private function createPage()
    {
        return $this->pageFactory->create();

    }
}
?>
