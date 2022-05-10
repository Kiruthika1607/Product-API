<?php

namespace Productapi\Demo\Model;

use Productapi\Demo\Api\Data\ProductInterfaceFactory;
use Productapi\Demo\Helper\ProductHelper;
use Productapi\Demo\Api\Data\ProductInterface;
use Productapi\Demo\Api\ConfigurableProductRepositoryInterface;
use Productapi\Demo\Api\ProductRepositoryInterface;


class ProductRepository implements ProductRepositoryInterface
{
    /**
     * @var ProductInterfaceFactory
     */
    private $productInterfaceFactory;
    /**
     * @var ProductHelper
     */
    private $productHelper;
    /**
     * @var \Magento\Catalog\Api\ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * @param \Magento\Catalog\Api\ProductRepositoryInterface $productRepository
     * @param ProductInterfaceFactory $productInterfaceFactory
     * @param ProductHelper $productHelper
     */
    public function __construct(\Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
                                ProductInterfaceFactory $productInterfaceFactory,
                                ProductHelper $productHelper)
    {
        $this->productInterfaceFactory =$productInterfaceFactory;
        $this->productHelper = $productHelper;
        $this->productRepository = $productRepository;
    }
    public function getProductId($id){
        /** @var \Productapi\Demo\Api\Data\ProductInterface $productInterface */
        $productInterface = $this->productInterfaceFactory->create();
        try{
            /** @var \Magento\Catalog\Api\Data\ProductInterface $product */
            $product = $this->productRepository->getById($id);
            $productInterface->setId($product->getId());
            $productInterface->setSku($product->getSku());
            $productInterface->setName($product->getName());
            $productInterface->setDescription($product->getDescription() ? $product->getDescription() : "");
//            $productInterface->setPrice($this->productHelper->formatPrice($product->getPrice()));
//            $productInterface->setImage($this->productHelper->getProductImageFactory($product));
            return $productInterface;
        }
        catch(NoSuchEntityException $e){
            throw NoSuchEntityException::singleField("id",$id);
        }
    }
}
