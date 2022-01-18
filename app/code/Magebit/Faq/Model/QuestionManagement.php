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

namespace Magebit\Faq\Model;

use Magebit\Faq\Model\ResourceModel\Question\CollectionFactory;

class QuestionManagement implements \Magebit\Faq\Api\QuestionManagementInterface
{
    /**
     * @var CollectionFactory
     */
    protected $questionFactory;

    /**
     * @param CollectionFactory $questionFactory
     */
    public function __construct(
        CollectionFactory $questionFactory
    ) {
        $this->questionFactory = $questionFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function getStatus($question): int
    {
        /** @var \Magebit\Faq\Model\ResourceModel\Question\Collection $question */
        $question = $this->questionFactory->create();

        return $question->getStatus();
    }

    /**
     * {@inheritdoc}
     */
    public function setStatus($question, $status)
    {
        /** @var \Magebit\Faq\Model\ResourceModel\Question\Collection $question */
        $question = $this->questionFactory->create();

        return $question->setStatus($status);
    }
}
