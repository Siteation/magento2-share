<?php declare(strict_types=1);

namespace Siteation\Share\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Hyva\Theme\ViewModel\StoreConfig;

class Share implements ArgumentInterface
{
    /**
     * @var StoreConfig
     */
    private $storeConfig;

    /**
     * @param StoreConfig $storeConfig
     */
    public function __construct(
        StoreConfig $storeConfig
    ) {
        $this->storeConfig = $storeConfig;
    }

    /**
     * Check if product can be shared
     *
     * @return bool
     */
    public function canShare(): bool
    {
        return (bool) $this->storeConfig->getStoreConfig('sendfriend/email/enabled');
    }
}
