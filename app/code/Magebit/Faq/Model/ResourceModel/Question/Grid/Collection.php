<?php

namespace Magebit\Faq\Model\ResourceModel\Question\Grid;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Magebit\Faq\Model\Question as QuestionModel;
use Magebit\Faq\Model\ResourceMode\Question as QuestionResourceModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
       $this->_init(QuestionModel::class, QuestionResourceModel::class);
    }
}
