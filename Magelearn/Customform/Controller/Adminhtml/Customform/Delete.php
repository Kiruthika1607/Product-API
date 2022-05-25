<?php
declare(strict_types=1);

namespace Magelearn\Customform\Controller\Adminhtml\Customform;
use Magelearn\Customform\Model\CustomformFactory;
class Delete extends \Magelearn\Customform\Controller\Adminhtml\Customform
{
    protected $customform;
    public function __construct
    (\Magento\Backend\App\Action\Context $context,
     \Magento\Framework\Registry $coreRegistry,
     CustomformFactory $customform
    )
    {
        $this->_customform = $customform;
        parent::__construct($context, $coreRegistry);
    }

    public function execute()
    {

        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('id');
        if ($id) {
            try {
                $model = $this->_customform->create();
//                $model = $this->_objectManager->create(\Magelearn\Customform\Model\Customform::class);
                $model->load($id);
                $model->delete();
                $this->messageManager->addSuccessMessage(__('You deleted the Customform.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }
        $this->messageManager->addErrorMessage(__('We can\'t find a Customform to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}

