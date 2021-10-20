<?php

namespace Learning\FirstUnit\Controller;
use Magento\Checkout\Model\Session as CheckoutSession;
use Magento\Framework\App\Action\Action;
use Magento\Quote\Model\Quote\Item;

class Clearcart extends Action
{
    /**
     * @var Item
     */
    protected $modelCartItem;
    /**
     * @var CheckoutSession
     */
    protected $checkoutSession;

    public function __construct(
        CheckoutSession $checkoutSession,
        Item $modelCartItem
    ) {
        $this->checkoutSession = $checkoutSession;
        $this->modelCartItem = $modelCartItem;
    }

    public function execute()
    {
        $checkoutSession = $this->getCheckoutSession();
        $allItems = $checkoutSession->getQuote()->getAllVisibleItems();
        foreach ($allItems as $item) {
            $cartItemId = $item->getItemId();
            $itemObj = $this->getItemModel()->load($cartItemId);
            $itemObj->delete();
        }
    }
}
