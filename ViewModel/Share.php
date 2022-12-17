<?php declare(strict_types=1);

/**
 * @author Siteation (https://siteation.dev/)
 * @copyright Copyright 2022 Siteation (https://siteation.dev/)
 * @license MIT
 */

namespace Siteation\Share\ViewModel;

use Hyva\Theme\ViewModel\StoreConfig;
use Magento\Framework\View\Element\Block\ArgumentInterface;

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
        return (bool) $this->storeConfig->getStoreConfig('siteation_share/share/enabled');
    }
}
