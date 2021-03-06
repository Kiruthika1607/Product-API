<?php
declare(strict_types=1);

namespace Magelearn\Customform\Controller\Adminhtml\Customform;

class Index extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
		$resultPage->setActiveMenu('Magelearn::top_level');
		$resultPage->addBreadcrumb(__('Customform'), __('Customform'));
        $resultPage->addBreadcrumb(__('Manage Customform'), __('Manage Customform'));
            $resultPage->getConfig()->getTitle()->prepend(__("Manage Customform"));
            return $resultPage;
    }
}

