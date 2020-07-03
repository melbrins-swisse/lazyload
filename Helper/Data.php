<?php

namespace HandH\Lazyload\Helper;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Data
{
    const XML_PATH_CATALOG_HANDH_LAZYLOAD_SETTINGS_ENABLED = 'handh_lazyload/handh_lazyload_settings/enable_lazyload';
    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;
    /**
     * Config constructor.
     *
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }
    /**
     * @return bool
     */
    public function HandHLazyLoadingEnabled()
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_CATALOG_HANDH_LAZYLOAD_SETTINGS_ENABLED);
    }
}
