<?php

namespace Amg\CmsBlock\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchVersionInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Cms\Model\BlockFactory;
use Magento\Cms\Model\PageFactory;

class AddNewCmsStaticBlockAndPage implements DataPatchInterface, PatchVersionInterface
{
    private $moduleDataSetup;
    private $blockFactory;
    private $pageFactory;
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        BlockFactory $blockFactory,
        PageFactory $pageFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->blockFactory = $blockFactory;
        $this->pageFactory = $pageFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        $newCmsStaticBlock = [
            'title' => 'Terms & Conditions',
            'identifier' => 'mag-39-block',
            'content' => '<div class="cms-terms">Cms Block Cms Page Patch</div>',
            'is_active' => 1,
            'stores' => \Magento\Store\Model\Store::DEFAULT_STORE_ID
        ];
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

        $this->moduleDataSetup->startSetup();
        $block = $this->blockFactory->create();
        $this->pageFactory->create()->setData($pageData)->save();
        $block->setData($newCmsStaticBlock)->save();
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
}
?>
