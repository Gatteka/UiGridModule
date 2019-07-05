<?php
namespace Learnmodules\UiGridModule\Model;

use Learnmodules\UiGridModule\Model\ResourceModel\Post as ResourcePost;
use Magento\Framework\Exception\AlreadyExistsException;
/**
 * Class PostRepository
 * @package Learnmodules\UiGridModule\Model
 */
class PostRepository
{
    /**
     * @var ResourcePost
     */
    protected $resource;
    /**
     * @var PostFactory
     */
    protected $postFactory;

    /**
     * PostRepository constructor.
     * @param PostFactory $postFactory
     * @param ResourcePost $resource
     */
    public function __construct(
        PostFactory $postFactory,
        ResourcePost $resource
    ) {
        $this->postFactory = $postFactory;
        $this->resource = $resource;
    }

    /**
     * @param $model
     * @return mixed
     * @throws AlreadyExistsException
     */
    public function save(Post $model)
    {
        $this->resource->save($model);
        return $model;
    }

    /**
     * @param $model
     * @throws \Exception
     */
    public function delete(Post $model)
    {
        $this->resource->delete($model);
    }

    /**
     * @param $postId
     * @return mixed
     */
    public function getById(int $postId)
    {
        $model = $this->postFactory->create();
        return $this->resource->load($model, $postId);
    }

    /**
     * @param int $id
     * @return ResourcePost
     * @throws \Exception
     */
    public function deleteById(int $id)
    {
        $model = $this->postFactory->create();
        $this->resource->load($model, $id);
        $this->resource->delete($model);
    }

}