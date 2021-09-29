<?php

namespace Amg\CmsBlock\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchVersionInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Cms\Model\BlockFactory;
use Magento\Cms\Model\PageFactory;

class EditNewCmsStaticBlock implements DataPatchInterface, PatchVersionInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;
    /**
     * @var BlockFactory
     */
    private $blockFactory;

    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        BlockFactory             $blockFactory
    )
    {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->blockFactory = $blockFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        $this->moduleDataSetup->startSetup();
        $EditBlockContent = '<div>Hello Wolrd!</div>';
        $EditBlock = $this->createBlock()->load(
            'mag-39-block',
            'identifier'
        );
        $EditBlockId = $EditBlock->getId();
        if ($EditBlockId) {
            $EditBlock->setContent($EditBlockContent);
            $EditBlock->save();
        } else {
            $newCmsStaticBlock = [
                'title' => 'Terms & Conditions',
                'identifier' => 'mag-39-block',
                'content' => '<div class="cms-terms">Cms Block Cms Page Patch</div>',
                'is_active' => 1,
                'stores' => \Magento\Store\Model\Store::DEFAULT_STORE_ID
            ];
            $block = $this->blockFactory->create();
            $block->setData($newCmsStaticBlock)->save();

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

    private function createBlock()
    {
        return $this->blockFactory->create();

    }
}
?>

