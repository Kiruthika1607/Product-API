<?php
declare(strict_types=1);

namespace Magelearn\Customform\Controller\Adminhtml\Customform;
use Magelearn\Customform\Model\CustomformFactory;
class InlineEdit extends \Magento\Backend\App\Action
{
    protected $jsonFactory;
    protected $customform;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $jsonFactory,
        CustomformFactory $customform
    ) {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
        $this->_customform = $customform;
    }
    public function execute()
    {
        $resultJson = $this->jsonFactory->create();
        $error = false;
        $messages = [];

        if ($this->getRequest()->getParam('isAjax')) {
            $postItems = $this->getRequest()->getParam('items', []);
            if (!count($postItems)) {
                $messages[] = __('Please correct the data sent.');
                $error = true;
            } else {
                foreach (array_keys($postItems) as $modelid) {
                    $model = $this->_customform->create()->load($modelid);
//                    $model = $this->_objectManager->create(\Magelearn\Customform\Model\Customform::class)->load($modelid);
                    try {
                        $model->setData(array_merge($model->getData(), $postItems[$modelid]));
                        $model->save();
                    } catch (\Exception $e) {
                        $messages[] = "[Customform ID: {$modelid}]  {$e->getMessage()}";
                        $error = true;
                    }
                }
            }
        }
        return $resultJson->setData([
            'messages' => $messages,
            'error' => $error
        ]);
    }
}

