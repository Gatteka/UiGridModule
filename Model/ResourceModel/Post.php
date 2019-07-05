<?php

namespace Learnmodules\UiGridModule\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;

/**
 * Class Post
 * @package Learnmodules\UiGridModule\Model\ResourceModel
 */
class Post extends AbstractDb
{
    /**
     * Post constructor.
     * @param Context $context
     */
    public function __construct(
        Context $context
    ) {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('learn_uitest_post', 'post_id');
    }

}