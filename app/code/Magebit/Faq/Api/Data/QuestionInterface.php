<?php
/**
 * Magebit_Faq
 *
 * @category     Magebit
 * @package      Magebit_Faq
 * @author       Kristaps Zaķis
 * @copyright    Copyright (c) 2022 Magebit, Ltd.(http://www.magebit.com/)
 */

namespace Magebit\Faq\Api\Data;

interface QuestionInterface
{

    const ID            = 'id';
    const QUESTION      = 'question';
    const ANSWER        = 'answer';
    const STATUS        = 'status';
    const POSITION      = 'position';
    const UPDATED_AT    = 'updated_at';


    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getQuestion();

    /**
     * @param $question
     * @return mixed
     */
    public function setQuestion($question);

    /**
     * @return string
     */
    public function getAnswer();

    /**
     * @param $answer
     * @return string
     */
    public function setAnswer($answer);

    /**
     * @return int
     */
    public function getStatus();

    /**
     * @param $status
     * @return string
     */
    public function setStatus($status);

    /**
     * @return int
     */
    public function getPosition();

    /**
     * @param $position
     * @return int
     */
    public function setPosition($position);


    public function getUpdateAt();
}


