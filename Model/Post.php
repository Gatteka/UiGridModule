<?php

namespace Learnmodules\UiGridModule\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use Learnmodules\UiGridModule\Model\ResourceModel\Post as ResourcePost;

/**
 * Class Post
 * @package Learnmodules\UiGridModule\Model
 */
class Post extends AbstractModel implements IdentityInterface
{

    const CACHE_TAG = 'learn_uitest_post';


    protected function _construct()
    {
        $this->_init(ResourcePost::class);
    }

    /**
     * @return array|string[]
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * @return array
     */
    public function getDefaultValues()
    {
        $values = [];
        return $values;
    }

    /**
     * @return int|string
     */
    public function getId()
    {
        return $this->getData('post_id');
    }
}