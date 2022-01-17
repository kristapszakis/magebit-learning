<?php
declare(strict_types=1);

/**
 * Magebit_Faq
 *
 * @category     Magebit
 * @package      Magebit_Faq
 * @author       Kristaps Zaķis
 * @copyright    Copyright (c) 2022 Magebit, Ltd.(http://www.magebit.com/)
 */

namespace Magebit\Faq\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $pageFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    ) {
        $this->pageFactory = $pageFactory;

        return parent::__construct($context);
    }

    public function execute()
    {
        $this->pageFactory = $this->pageFactory->create();

        $this->pageFactory->getConfig()->getTitle()->set((__('Frequently Asked Questions')));

        return $this->pageFactory;
    }


}
