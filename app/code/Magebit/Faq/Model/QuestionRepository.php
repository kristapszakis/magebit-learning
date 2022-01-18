<?php
/**
 * Magebit_Faq
 *
 * @category     Magebit
 * @package      Magebit_Faq
 * @author       Kristaps Zaķis
 * @copyright    Copyright (c) 2022 Magebit, Ltd.(http://www.magebit.com/)
 */

namespace Magebit\Faq\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magebit\Faq\Api\Data\QuestionInterface;
use Magebit\Faq\Api\Data\QuestionSearchResultInterfaceFactory;
use Magebit\Faq\Api\QuestionRepositoryInterface;
use Magebit\Faq\Model\ResourceModel\Question;
use Magebit\Faq\Api\Data\QuestionSearchResultInterface;


class QuestionRepository implements QuestionRepositoryInterface
{
    /**
     * @var QuestionFactory
     */
    private $questionFactory;


    /**
     * @var Question
     */
    private $questionResource;

    /**
     * @var \Magebit\Faq\Model\ResourceModel\Question\Collection CollectionFactory
     */
    private $questionCollectionFactory;

    /**
     * @var QuestionSearchResultInterfaceFactory
     */
    private $searchResultFactory;

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    public function __construct(
        QuestionFactory $questionFactory,
        Question $questionResource,
        \Magebit\Faq\Model\ResourceModel\Question\Collection $questionCollectionFactory,
        QuestionSearchResultInterfaceFactory $questionSearchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->questionFactory = $questionFactory;
        $this->questionResource = $questionResource;
        $this->questionCollectionFactory = $questionCollectionFactory;
        $this->searchResultFactory = $questionSearchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @param int $id
     * @return \Magebit\Faq\Api\Data\QuestionInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById(int $id): QuestionInterface
    {
        $question = $this->questionFactory->create();

        $this->questionResource->load($question, $id);

        if (!$question->getId()) {
            throw new NoSuchEntityException(__('Unable to find FAQ item with ID "%1"', $id));
        }

        return $question;
    }

    /**
     * @param \Magebit\Faq\Api\Data\QuestionInterface $question
     * @return \Magebit\Faq\Api\Data\QuestionInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(QuestionInterface $question): QuestionInterface
    {
        $this->questionResource->save($question);

        return $question;
    }

    /**
     * @param \Magebit\Faq\Api\Data\QuestionInterface $question
     * @return bool true on success
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function delete(QuestionInterface $question): bool
    {
        try {
            $this->questionResource->delete($question);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(
                __('Could not delete the entry: %1', $exception->getMessage())
            );
        }

        return true;
    }

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Magebit\Faq\Api\Data\QuestionSearchResultInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria): QuestionSearchResultInterface
    {
        $collection = $this->questionCollectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        $searchResults = $this->searchResultFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }
}
