<?php
declare(strict_types=1);

namespace Magelearn\Customform\Api\Data;

interface CustomformSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{


    public function getItems();


    public function setItems(array $items);
}

