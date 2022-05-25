<?php
declare(strict_types=1);

namespace Magelearn\Customform\Controller\Adminhtml\Customform;
use Magelearn\Customform\Controller\Adminhtml\Customform;
use Magelearn\Customform\Model\CustomformFactory;
class Edit extends Customform
{
    protected $resultFactory;
    protected $customform;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        CustomformFactory $customform
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context, $coreRegistry);
        $this->_customform = $customform;
    }
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $model = $this->_customform->create();
//        $model = $this->_objectManager->create(\Magelearn\Customform\Model\Customform::class);
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This Customform no longer exists.'));
                /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
        $this->_coreRegistry->register('magelearn_customform', $model);

        // 3. Build edit form
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $this->initPage($resultPage)->addBreadcrumb(
            $id ? __('Edit Customform') : __('New Customform'),
            $id ? __('Edit Customform') : __('New Customform')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Customforms'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? __('Edit Customform %1', $model->getId()) : __('New Customform'));
        return $resultPage;
    }
}

