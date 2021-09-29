<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
/**
 * Created By : Rohan Hapani
 */
declare (strict_types = 1);
namespace RH\Helloworld\Setup\Patch\Data;
use Magento\Cms\Model\PageFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
class CustCmsCreate implements DataPatchInterface
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
        $pageData = [
            'title' => 'Rohan Custom CMS Page', // cms page title
            'page_layout' => '1column', // cms page layout
            'meta_keywords' => 'RH Cms Meta Keywords', // cms page meta keywords
            'meta_description' => 'RH Cms Meta Description', // cms page meta description
            'identifier' => 'rhcms', // cms page identifier
            'content_heading' => 'Rohan Custom CMS Page', // cms page content heading
            'content' => '<h1>RH Custom Cms Page Content</h1>', // cms page content
            'layout_update_xml' => '', // cms page layout xml
            'url_key' => 'rhcms', // cms page url key
            'is_active' => 1, // status enabled or disabled
            'stores' => [0, 1], // You can set store id single or multiple values in array.
            'sort_order' => 0, // cms page sort order
        ];
        $this->moduleDataSetup->startSetup();
        $this->pageFactory->create()->setData($pageData)->save();
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
    public function getAliases()
    {
        return [];
    }
}
