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
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Ui\Component\MassAction\Filter;
use Magebit\Faq\Model\ResourceModel\Question\CollectionFactory;

class MassDelete extends Action implements HttpPostActionInterface
{
    /**
     * @var Filter
     */
    protected $_filter;

    /**
     * @var CollectionFactory
     */
    protected $_collectionFactory;

    public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory
    ) {
        $this->_filter = $filter;
        $this->_collectionFactory = $collectionFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $collection = $this->_filter->getCollection($this->_collectionFactory->create());
        $resultRedirect = $this->resultRedirectFactory->create();
        $itemsDeleted = 0;

        foreach ($collection->getItems() as $record) {
//            try {
//                $this->_collectionFactory->delete($record);
//                $itemsDeleted++;
//            } catch (LocalizedException $exception) {
//                $this->messageManager->addErrorMessage(__($exception));
//            }
//
            $record->delete();
            $itemsDeleted++;
        }

        $this->messageManager->addSuccessMessage(__('%1 FAQ item(s) have been deleted.', $itemsDeleted));

        return $resultRedirect->setPath('*/*/');
    }
}
