<?php declare(strict_types=1);

namespace Siteation\Share\ViewModel;

use Magento\Catalog\Model\Product;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Catalog\Helper\Output as ProductOutputHelper;
use Hyva\Theme\ViewModel\StoreConfig;

class Share implements ArgumentInterface
{
    /**
     * @var Product
     */
    protected $_product = null;

    /**
     * @var ProductOutputHelper
     */
    protected $productOutputHelper;

    /**
     * @var StoreConfig
     */
    private $storeConfig;

    /**
     * @param ProductOutputHelper $productOutputHelper
     * @param StoreConfig $storeConfig
     */
    public function __construct(
        ProductOutputHelper $productOutputHelper,
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

    public function getShortDescription(Product $product, bool $excerpt = true, bool $stripTags = true): string
    {
        return $this->getShortDescriptionForProduct($product, $excerpt, $stripTags);
    }

    public function getShortDescriptionForProduct(
        Product $product,
        bool $excerpt = true,
        bool $stripTags = true
    ): string {
        $result = "";

        if ($shortDescription = $product->getShortDescription()) {
            $shortDescription = $excerpt ? $this->excerptFromDescription($shortDescription) : $shortDescription;
            $result = $this->productAttributeHtml($product, $shortDescription, 'short_description');
        } elseif ($description = $product->getDescription()) {
            $description = $excerpt ? $this->excerptFromDescription($description) : $description;
            $result = $this->productAttributeHtml($product, $description, 'description');
        }

        return $stripTags ? strip_tags($this->stripStyles($result)) : $result;
    }

    protected function stripStyles(string $html): string
    {
        return preg_replace('#<style>.+</style>#Usi', '', $html);
    }

    protected function excerptFromDescription(string $description): string
    {
        // if we have at least one <p></p>, take the first one as excerpt
        if ($paragraphs = preg_split('#</p><p>|<p>|</p>#i', $description, -1, PREG_SPLIT_NO_EMPTY)) {
            return $paragraphs[0];
        }
        // otherwise, take the first sentence
        return explode('.', $description)[0] . '.';
    }

    /**
     * @param string|Phrase $attributeHtml
     * @param string $attributeName
     * @return mixed
     */
    public function productAttributeHtml(Product $product, $attributeHtml, $attributeName)
    {
        return $this->productOutputHelper->productAttribute($product, $attributeHtml, $attributeName);
    }
}
