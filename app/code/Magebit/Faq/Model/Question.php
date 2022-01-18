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

use Magebit\Faq\Api\Data\QuestionInterface;
use Magento\Framework\Model\AbstractModel;

class Question extends AbstractModel implements \Magebit\Faq\Api\Data\QuestionInterface
{
    const CACHE_TAG = 'magebit_faq_list';

    public function getIdentities(): array
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * @inheritDoc
     */
    public function getId(): ?int
    {
        return $this->getData(self::ID);
    }

    /**
     * @inheritDoc
     */
    public function getQuestion(): string
    {
        return $this->getData(self::QUESTION);
    }

    /**
     * @inheritDoc
     */
    public function setQuestion($question): QuestionInterface
    {
        return $this->setData(self::QUESTION, $question);
    }

    /**
     * @inheritDoc
     */
    public function getAnswer(): string
    {
        return $this->getData(self::ANSWER);
    }

    /**
     * @inheritDoc
     */
    public function setAnswer($answer): QuestionInterface
    {
        return $this->setData(self::ANSWER, $answer);
    }

    /**
     * @inheritDoc
     */
    public function getStatus(): int
    {
        return $this->getData(self::STATUS);
    }

    /**
     * @inheritDoc
     */
    public function setStatus($status): QuestionInterface
    {
        return $this->setData(self::STATUS, $status);
    }

    /**
     * @inheritDoc
     */
    public function getPosition(): int
    {
        return $this->getData(self::POSITION);
    }

    /**
     * @inheritDoc
     */
    public function setPosition($position): QuestionInterface
    {
        return $this->setData(self::POSITION, $position);
    }

    /**
     * @inheritDoc
     */
    public function getUpdateAt(): string
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init('Magebit\Faq\Model\ResourceModel\Question');
    }
}
