<?php

namespace Learnmodules\UiGridModule\Controller\Adminhtml\Form;

use \Magento\Framework\App\Action\Context;
use \Magento\Framework\App\Action\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\ResultInterface;
use \Magento\Framework\View\Result\PageFactory;
use Learnmodules\UiGridModule\Model\ResourceModel\Post\CollectionFactory;
use Learnmodules\UiGridModule\Model\ResourceModel\Post;
use Learnmodules\UiGridModule\Model\PostFactory;
use Learnmodules\UiGridModule\Model\PostRepository;
use \Psr\Log\LoggerInterface;

/**
 * Class Save
 * @package Learnmodules\UiGridModule\Controller\Adminhtml\Form
 */
class Save extends Action
{
    /**
     * @var PageFactory
     */
    protected $_resultPageFactory;

    /**
     * @var
     */
    protected $_logger;

    /**
     * @var
     */
    protected $collectionFactory;

    /**
     * @var PostFactory
     */
    protected $modelFactory;

    /**
     * @var Post
     */
    protected $resourceModel;

    /**
     * @var PostRepository
     */
    protected $postRepository;

    /**
     * Save constructor.
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param CollectionFactory $collectionFactory
     * @param Post $resourceModel
     * @param PostFactory $modelFactory
     * @param PostRepository $postRepository
     * @param LoggerInterface $logger
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        CollectionFactory $collectionFactory,
        Post $resourceModel,
        PostFactory $modelFactory,
        PostRepository $postRepository,
        LoggerInterface $logger
    )
    {
        $this->_resultPageFactory = $resultPageFactory;
        $this->collectionFactory = $collectionFactory;
        $this->resourceModel = $resourceModel;
        $this->modelFactory = $modelFactory;
        $this->postRepository = $postRepository;
        $this->_logger = $logger;

        parent::__construct($context);
    }

    /**
     * Save new Post
     *
     * @return ResponseInterface|Redirect|ResultInterface
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();

        if ($data) {
            $model = $this->modelFactory->create();
            $model->setData('name', $data['name']);

            try {
                $this->postRepository->save($model);
                $this->messageManager->addSuccessMessage(__('You saved the post with id ' . $model->getId()));
                return $resultRedirect->setPath('*/*/');

            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());

                $returnParams = ['id' => $model->getId()];

                return $resultRedirect->setPath('*/*/edit', $returnParams);
            }
        }

        return $resultRedirect->setPath('*/*/');
    }

}
