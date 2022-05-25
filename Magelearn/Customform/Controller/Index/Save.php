<?php

namespace Magelearn\Customform\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magelearn\Customform\Model\CustomformFactory;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\MediaStorage\Model\File\UploaderFactory;
use Magento\Framework\Image\AdapterFactory;
use Magento\Framework\Filesystem;

class Save extends \Magento\Framework\App\Action\Action
{
    /**
     * @var Crudimage
     */
    protected $_crudimage;
    protected $uploaderFactory;
    protected $adapterFactory;
    protected $filesystem;

    public function __construct(
        Context          $context,
        CustomformFactory $crudimage,
        UploaderFactory  $uploaderFactory,
        AdapterFactory   $adapterFactory,
        Filesystem       $filesystem
    )
    {
        $this->_crudimage = $crudimage;
        $this->uploaderFactory = $uploaderFactory;
        $this->adapterFactory = $adapterFactory;
        $this->filesystem = $filesystem;
        parent::__construct($context);
    }

    public function execute()
    {
        if ($this->getRequest()->isPost()) {
            $input = $this->getRequest()->getPostValue();
            $input = $this->validatedParams();
            $postData = $this->_crudimage->create();
            if (isset($input['id'])) {
                $id = $input['id'];
            } else {
                $id = 0;
            }
            if ($id != 0) {
                $postData->load($id);
                $postData->addData($input);
                $postData->setId($id);
//                $postData->save();
            } else {
                $postData->setData($input);
            }
//        $data = $this->getRequest()->getParams();
//        $crudimage = $this->_crudimage->create();
//        $crudimage->setData($data);
            if ($postData->save()) {
                $this->messageManager->addSuccessMessage(__('You saved the data.'));
            } else {
                $this->messageManager->addErrorMessage(__('Data was not saved.'));
            }
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('customform/index/list');
        return $resultRedirect;
    }
    private function validatedParams()
    {
        $request = $this->getRequest();
        if (trim($request->getParam('first_name')) === '') {
            throw new LocalizedException(__('Enter the First Name and try again.'));
        }
        if (trim($request->getParam('last_name')) === '') {
            throw new LocalizedException(__('Enter the Last Name and try again.'));
        }
        if (false === \strpos($request->getParam('email'), '@')) {
            throw new LocalizedException(__('The email address is invalid. Verify the email address and try again.'));
        }
        if (trim($request->getParam('phone')) === '') {
            throw new LocalizedException(__('Enter the Phone Number and try again.'));
        }
        if (trim($request->getParam('message')) === '') {
            throw new LocalizedException(__('Enter your message and try again.'));
        }
        return $request->getParams();
    }
}
