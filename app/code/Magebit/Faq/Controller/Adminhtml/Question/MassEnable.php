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

namespace Magebit\Faq\Controller\Adminhtml\Question;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magebit\Faq\Model\ResourceModel\Question\CollectionFactory;
use Magento\Ui\Component\MassAction\Filter;

class MassEnable extends Action
{

    /**
     * @var Filter
     */
    protected $filter;

    /** @var CollectionFactory */
    protected $collectionFactory;


    public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory
    )
    {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $itemsUpdated = 0;

        foreach ($collection as $item) {
            $item->setStatus(1);
            $item->save();
            $itemsUpdated++;
        }

        $this->messageManager->addSuccessMessage(__('%1 FAQ item(s) have been updated.', $itemsUpdated));

        return $resultRedirect->setPath('*/*/');
    }
}
