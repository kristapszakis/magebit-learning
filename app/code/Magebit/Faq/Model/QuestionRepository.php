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
use Magebit\Faq\Api\QuestionRepositoryInterface;

class QuestionRepository implements QuestionRepositoryInterface
{
    public function save(QuestionInterface $question, Question $questionModel) {
        return;
    }
}
