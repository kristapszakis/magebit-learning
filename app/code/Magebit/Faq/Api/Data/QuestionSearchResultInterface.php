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

namespace Magebit\Faq\Api\Data;

interface QuestionSearchResultInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * @return \Magebit\Faq\Api\Data\QuestionInterface
     */
    public function getItems(): QuestionInterface;

    /**
     * @param \Magebit\Faq\Api\Data\QuestionInterface[] $items
     * @return $this
     */
    public function setItems(array $items = null): QuestionSearchResultInterface;
}
