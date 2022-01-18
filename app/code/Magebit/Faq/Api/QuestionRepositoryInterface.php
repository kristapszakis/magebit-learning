<?php
/**
 * Magebit_Faq
 *
 * @category     Magebit
 * @package      Magebit_Faq
 * @author       Kristaps Zaķis
 * @copyright    Copyright (c) 2022 Magebit, Ltd.(http://www.magebit.com/)
 */

namespace Magebit\Faq\Api;

use Magebit\Faq\Api\Data\QuestionInterface;
use Magebit\Faq\Api\Data\QuestionSearchResultInterface;

interface QuestionRepositoryInterface
{
    /**
     * @param int $id
     * @return \Magebit\Faq\Api\Data\QuestionInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById(int $id): QuestionInterface;

    /**
     * @param \Magebit\Faq\Api\Data\QuestionInterface $question
     * @return \Magebit\Faq\Api\Data\QuestionInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function save(QuestionInterface $question): QuestionInterface;

    /**
     * @param \Magebit\Faq\Api\Data\QuestionInterface $question
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function delete(QuestionInterface $question): bool;

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Magebit\Faq\Api\Data\QuestionSearchResultInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria): QuestionSearchResultInterface;
}
