# Siteation - Magento 2 Module Share

[![Packagist Version](https://img.shields.io/packagist/v/siteation/magento2-module-share?style=for-the-badge)](https://packagist.org/packages/siteation/magento2-module-share)
![Supported Magento Versions](https://img.shields.io/badge/magento-%202.4-brightgreen.svg?logo=magento&longCache=true&style=for-the-badge)
[![Hyvä Themes Module](https://img.shields.io/badge/Hyva_Themes-Module-3df0af.svg?longCache=true&style=for-the-badge)](https://hyva.io/)
![License](https://img.shields.io/github/license/siteation/magento2-module-share?color=%23234&style=for-the-badge)

This Magento 2 module adds the option to share you product,
using the Share API with an fallback to the Clipboard API for unsupported browsers.

## Installation

Install the package via;

```bash
composer require siteation/magento2-module-share
bin/magento setup:upgrade
```

> **Note**
> 
> This Module requires Magento 2.4 or higher and Hyvä Theme!
> For more requirements see the `composer.json`.

## How to use

This module is enabled by default.

If you want to disable it, for a specific store view.

Please navigate to Stores -> Configuration -> Catalog -> Share

### Preview

![Sharing with the Share API on Magento 2 Product page](assets/share.jpg)

**Fallback**

![Sharing with the Clipboard API on Magento 2 Product page](assets/clipboard.jpg)
