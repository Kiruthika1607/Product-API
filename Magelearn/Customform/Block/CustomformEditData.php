<?php

namespace Magelearn\Customform\Block;

use Magento\Framework\View\Element\Template\Context;
use Magelearn\Customform\Model\CustomformFactory;
use Magento\Cms\Model\Template\FilterProvider;

class CustomformEditData extends \Magento\Framework\View\Element\Template
{
    protected $_customform;
    public function __construct(
        Context $context,
        CustomformFactory $customform,
        FilterProvider $filterProvider
    ) {
        $this->_customform = $customform;
        $this->_filterProvider = $filterProvider;
        parent::__construct($context);
    }
    public function getSingleData()
    {
        $id = $this->getRequest()->getParam('id');
        $customform = $this->_customform->create();
        $singleData = $customform->load($id);
        if($singleData->getId() || $singleData['id'] && $singleData->getStatus() == 1){
            return $singleData;
        }else{
            return false;
        }
    }
}
