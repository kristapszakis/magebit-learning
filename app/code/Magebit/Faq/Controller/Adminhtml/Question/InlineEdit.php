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

use Magento\Framework\Controller\Result\JsonFactory;
use Magebit\Faq\Api\QuestionRepositoryInterface;
use Magebit\Faq\Model\QuestionRepository;
use Magento\Backend\App\Action\Context;


class InlineEdit extends Action
{
    /**
     * @var QuestionRepositoryInterface
     */
    protected $questionRepositoryInterface;

    /**
     * @var JsonFactory
     */

    protected $jsonFactory;

    protected $questionModel;

    public function __construct(
        Context $context,
        QuestionRepository $questionRepositoryInterface,
        JsonFactory $jsonFactory
    ) {
        parent::__construct($context);
        $this->questionRepositoryInterface = $questionRepositoryInterface;
        $this->jsonFactory = $jsonFactory;
    }

    public function execute()
    {
        /** @var \Magento\Framework\Controller\Result\Json $resultJson */
        $resultJson = $this->jsonFactory->create();

        $error = false;
        $messages = [];

        if ($this->getRequest()->getParam('isAjax')) {
            $postItems = $this->getRequest()->getParam('items', []);

            if (!count($postItems)) {
                $messages[] = __('Please correct the data sent');
                $error = true;
            } else {
                foreach (array_keys($postItems) as $questionId) {
                    $question = $this->questionRepositoryInterface->getById($questionId);

                    try {
                        $question->setData(array_merge($question->getData(), $postItems[$questionId]));
                        $this->questionRepositoryInterface->save($question);

                    } catch (\Exception $exception) {
                        $messages[] = $exception->getMessage();
                        $error = true;
                    }
                }
            }
        }

        return $resultJson->setData([
            'messages' => $messages,
            'error' => $error
        ]);
    }
}
