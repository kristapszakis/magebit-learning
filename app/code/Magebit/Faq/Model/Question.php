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

use Magento\Framework\Model\AbstractModel;
use Magebit\Faq\Api\Data\QuestionInterface;

class Question extends AbstractModel implements QuestionInterface
{
    const CACHE_TAG = 'magebit_faq_list';

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return $this->getData(self::ID);
    }

    /**
     * @inheritDoc
     */
    public function getQuestion() {
        return $this->getData(self::QUESTION);
    }

    /**
     * @inheritDoc
     */
    public function setQuestion($question) {
        return $this->setData(self::QUESTION, $question);
    }

    /**
     * @inheritDoc
     */
    public function getAnswer() {
        return $this->getData(self::ANSWER);
    }

    /**
     * @inheritDoc
     */
    public function setAnswer($answer) {
        return $this->setData(self::ANSWER, $answer);
    }

    /**
     * @inheritDoc
     */
    public function getStatus() {
        return $this->getData(self::STATUS);
    }

    /**
     * @inheritDoc
     */
    public function setStatus($status) {
        return $this->setData(self::STATUS, $status);
    }

    /**
     * @inheritDoc
     */
    public function getPosition() {
        return $this->getData(self::POSITION);
    }

    /**
     * @inheritDoc
     */
    public function setPosition($position) {
        return $this->setData(self::POSITION, $position);
    }

    /**
     * @inheritDoc
     */
    public function getUpdateAt() {
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
