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
use Magebit\Faq\Model\ResourceModel\Question as QuestionResourceModel;

class Question extends AbstractModel implements QuestionInterface
{
    const CACHE_TAG = 'magebit_faq_list';

    protected function _construct()
    {
        $this->_init(QuestionResourceModel::class);
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }


    /**
     * @return int
     */
    public function getId()
    {
        return $this->getData(self::ID);
    }

    public function getQuestion() {
        return $this->getData(self::QUESTION);
    }

    public function setQuestion($question) {
        return $this->setData(self::QUESTION, $question);
    }

    public function getAnswer() {
        return $this->getData(self::ANSWER);
    }

    public function setAnswer($answer) {
        return $this->setData(self::ANSWER, $answer);
    }

    public function getStatus() {
        return $this->getData(self::STATUS);
    }

    public function setStatus($status) {
        return $this->setData(self::STATUS, $status);
    }

    public function getPosition() {
        return $this->getData(self::POSITION);
    }

    public function setPosition($position) {
        return $this->setData(self::POSITION, $position);
    }

    public function getUpdateAt() {
        return $this->getData(self::UPDATED_AT);
    }
}
