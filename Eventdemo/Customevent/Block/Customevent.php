<?php
namespace Eventdemo\Customevent\Block;

class Customevent extends \Magento\Framework\View\Element\Template
{
    public function getHelloWorldTxt()
    {
        return 'Hello world!';
    }
}
