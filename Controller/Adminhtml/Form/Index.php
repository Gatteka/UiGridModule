<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 04.07.18
 * Time: 15:47
 */

namespace Learnmodules\UiGridModule\Controller\Adminhtml\Form;

use \Magento\Framework\App\Action\Context;
use \Magento\Framework\App\Action\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use \Magento\Framework\View\Result\PageFactory;
use \Psr\Log\LoggerInterface;

/**
 * Class Index
 * @package Learnmodules\Brand\Controller\Form
 */
class Index extends Action
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var LoggerInterface
     */
    protected $logger;


    /**
     * Index constructor.
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param LoggerInterface $logger
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        LoggerInterface $logger
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->logger = $logger;

        parent::__construct($context);
    }

    /**
     * Go to form grid page
     *
     * @return ResponseInterface|ResultInterface
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();

        return $resultPage;
    }
}
