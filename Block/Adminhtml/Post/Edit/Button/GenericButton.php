<?php

namespace Learnmodules\UiGridModule\Block\Adminhtml\Post\Edit\Button;

use Magento\Backend\Block\Widget\Context;
//use Magento\Framework\Registry;
use Magento\Framework\UrlInterface;

/**
 * Class GenericButton
 * @package Learnmodules\UiGridModule\Block\Adminhtml\Post\Edit\Button
 */
class GenericButton
{
    /**
     * Url Builder
     *
     * @var UrlInterface
     */
    protected $urlBuilder;

    /**
     * Registry
     *
     * @var Registry
     */
    protected $registry;

    /**
     * Constructor
     *
     * @param Context $context
     * @param Registry $registry
     */
    public function __construct(
        Context $context
  //      Registry $registry
    ) {
        $this->urlBuilder = $context->getUrlBuilder();
     //   $this->registry = $registry;
    }

//    /**
//     * Return the synonyms group Id.
//     *
//     * @return int|null
//     */
//    public function getId()
//    {
//        $contact = $this->registry->registry('contact');
//        return $contact ? $contact->getId() : null;
//    }

    /**
     * Generate url by route and parameters
     *
     * @param   string $route
     * @param   array $params
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->urlBuilder->getUrl($route, $params);
    }
}