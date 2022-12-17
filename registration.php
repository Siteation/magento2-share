<?php declare(strict_types=1);

/**
 * Share module for Magento
 *
 * @author Siteation (https://siteation.dev/)
 * @copyright Copyright 2022 Siteation (https://siteation.dev/)
 * @license MIT
 */

use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(
    ComponentRegistrar::MODULE,
    'Siteation_Share',
    __DIR__
);
