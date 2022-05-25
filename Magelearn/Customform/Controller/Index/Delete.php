<?php

namespace Magelearn\Customform\Controller\Index;
use Magelearn\Customform\Model\CustomformFactory;
Class Delete extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $_request;
    protected $_customform;
    public function __construct(
    \Magento\Framework\App\Action\Context $context,
    \Magento\Framework\View\Result\PageFactory $pageFactory,
    \Magento\Framework\App\Request\Http $request,
    CustomformFactory $customform
)
{
    $this->_pageFactory = $pageFactory;
    $this->_request = $request;
    $this->_customform = $customform;
    return parent::__construct($context);
}

    public function execute()
{
    $id = $this->_request->getParam('id');
    $post = $this->_customform->create();
    $result = $post->setId($id);
    $result = $result->delete();
//    $this->messageManager->addSuccessMessage(__('You Delete this data.'));
    return $this->_redirect('customform/index/list');
}
}
