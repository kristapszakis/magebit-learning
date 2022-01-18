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
    public function getId(): ?int;

    /**
     * @return string
     */
    public function getQuestion(): string;

    /**
     * @param $question
     * @return QuestionInterface
     */
    public function setQuestion($question): QuestionInterface;

    /**
     * @return string
     */
    public function getAnswer(): string;

    /**
     * @param $answer
     * @return QuestionInterface
     */
    public function setAnswer($answer): QuestionInterface;

    /**
     * @return int
     */
    public function getStatus(): int;

    /**
     * @param $status
     * @return QuestionInterface
     */
    public function setStatus($status): QuestionInterface;

    /**
     * @return int
     */
    public function getPosition(): int;

    /**
     * @param $position
     * @return QuestionInterface
     */
    public function setPosition($position): QuestionInterface;

    /**
     * @return string
     */
    public function getUpdateAt(): string;
}


