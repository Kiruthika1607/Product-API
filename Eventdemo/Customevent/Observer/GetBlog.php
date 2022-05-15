<?php

namespace Eventdemo\Customevent\Observer;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class GetBlog implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        $blogData = $observer->getEvent()->getBlog();
        $blogId = $blogData->getBlogId();
        $blogTitle = $blogData->getBlogTitle();

        $writer = new \Zend_Log_Writer_Stream(BP . '/var/log/blog.log'); //custom log file
        $logger = new \Zend_Log();
        $logger->addWriter($writer);
        $logger->info('blog id: '.$blogId);
        $logger->info('blog title: '.$blogTitle);

        return $this;
    }
}
