<?php
declare(strict_types=1);

namespace Magelearn\Customform\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface CustomformRepositoryInterface
{


    public function save(
        \Magelearn\Customform\Api\Data\CustomformInterface $customform
    );


    public function get($customformId);


    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );


    public function delete(
        \Magelearn\Customform\Api\Data\CustomformInterface $customform
    );


    public function deleteById($customformId);
}

