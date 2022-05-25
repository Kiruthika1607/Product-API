<?php
declare(strict_types=1);
namespace Magelearn\Customform\Controller\Adminhtml\Customform;
use Magento\Framework\Exception\LocalizedException;
use Magelearn\Customform\Model\CustomformFactory;
class Save extends \Magento\Backend\App\Action
{
    protected $dataPersistor;
    protected $customform;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor,
        CustomformFactory $customform
    ) {
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context);
        $this->_customform = $customform;
    }
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            $id = $this->getRequest()->getParam('id');
            $model = $this->_customform->create()->load($id);
//            $model = $this->_objectManager->create(\Magelearn\Customform\Model\Customform::class)->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addErrorMessage(__('This Customform no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }
            $model->setData($data);

            try {
                $model->save();
                $this->messageManager->addSuccessMessage(__('You saved the Customform.'));
                $this->dataPersistor->clear('mladmincustomform');

                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the Customform.'));
            }

            $this->dataPersistor->set('mladmincustomform', $data);
            return $resultRedirect->setPath('*/*/edit', ['id' => $this->getRequest()->getParam('id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}

