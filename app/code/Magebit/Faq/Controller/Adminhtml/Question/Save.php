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

use Magebit\Faq\Controller\Adminhtml\BaseController;
use Magento\Backend\App\Action\Context;
use Magebit\Faq\Model\QuestionFactory;

class Save extends BaseController
{
    /**
     * @var QuestionFactory
     */
    protected $questionFactory;

    /**
     * @param Context $context
     * @param QuestionFactory $questionFactory
     */
    public function __construct(
        Context $context,
        QuestionFactory $questionFactory

    ) {
        parent::__construct($context);
        $this->questionFactory = $questionFactory;
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();

        $resultRedirect = $this->resultRedirectFactory->create();

        if (!$data) {
            $this->messageManager->addNoticeMessage('No data was passed');

            return $resultRedirect->setPath('*/*/edit');
        }

        try {
            $questionData = $this->questionFactory->create();
            $questionData->setData($data);

            if (isset($data['id'])) {
                $questionData->setEntityId($data['id']);
            }

            $questionData->save();

            $this->messageManager->addSuccessMessage('FAQ item has been successfully saved');
            return $resultRedirect->setPath('*/*/');
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }

        return $resultRedirect->setPath('*/*/edit', ['id' => $this->getRequest()->getParam('id')]);
    }
}
