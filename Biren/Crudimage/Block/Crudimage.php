<?php

namespace Biren\Crudimage\Block;

/**
 * Crudimage content block
 */
class Crudimage extends \Magento\Framework\View\Element\Template
{
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context
    ) {
        parent::__construct($context);
    }

    public function _prepareLayout()
    {
        $this->pageConfig->getTitle()->set(__('CURD Operation Magento2'));

        return parent::_prepareLayout();
    }
}
