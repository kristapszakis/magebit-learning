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

namespace Magebit\Faq\Api;

interface QuestionManagementInterface
{
    /**
     * @param $question
     * @return int
     */
    public function getStatus($question): int;

    /**
     * @param $question
     * @param $status
     * @return mixed
     */
    public function setStatus($question, $status);
}
