<?php

namespace HandH\Lazyload\Plugin;

use HandH\Lazyload\Helper\Data;
use Magento\Catalog\Block\Product\Image;
use Magento\Framework\View\Element\Template\Context;

class ImageLoad extends Image
{
    /**
     * @var Data
     */
    private $config;

    /**
     *
     * @param Context $context
     * @param Data $config
     * @param array $data
     */
    public function __construct(
        Context $context,
        Data $config,
        array $data = []
    ) {
        $this->config = $config;

        if (isset($data['template']) && $config->HandHLazyLoadingEnabled()) {
            $template = str_replace('Magento_Catalog', 'HandH_Lazyload', $data['template']);
            $this->setTemplate($template);
            unset($data['template']);
        }

        parent::__construct($context, $data);
    }
}
