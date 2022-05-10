<?php

namespace Productapi\Demo\Api;
use Magento\Framework\Exception\NoSuchEntityException;
interface ProductRepositoryInterface
{
    /**
     * @param int $id
     * @return \Productapi\Demo\Api\Data\ProductInterface
     * @throws NoSuchEntityException
     */
    public function getProductId($id);
}
