<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15.06.18
 * Time: 12:52
 */

namespace Learnmodules\UiGridModule\Model\ResourceModel\Post;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Learnmodules\UiGridModule\Model\Post;
use Learnmodules\UiGridModule\Model\ResourceModel\Post as ResourcePost;

/**
 * Class Collection
 * @package Learnmodules\UiGridModule\Model\ResourceModel\Post
 */
class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    public $_idFieldName = 'post_id';


    protected function _construct()
    {
        $this->_init(Post::class, ResourcePost::class);
    }

}