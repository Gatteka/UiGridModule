<?php

namespace Learnmodules\UiGridModule\Ui\Component\Post\Form;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Learnmodules\UiGridModule\Model\ResourceModel\Post\CollectionFactory;

/**
 * Class DataProvider
 * @package Learnmodules\UiGridModule\Ui\Component\Post
 */
class DataProvider extends AbstractDataProvider
{
    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $contactCollectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $contactCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $contactCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();
        $this->loadedData = array();
        foreach ($items as $contact) {
            $this->loadedData[$contact->getId()]['contact'] = $contact->getData();
        }


        return $this->loadedData;

    }
}