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


    public function getId();

    public function getQuestion();
    public function setQuestion($question);

    public function getAnswer();
    public function setAnswer($answer);

    public function getStatus();
    public function setStatus($status);

    public function getPosition();
    public function setPosition($position);

    public function getUpdateAt();
}


