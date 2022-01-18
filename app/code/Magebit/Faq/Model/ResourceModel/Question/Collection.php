<?php
/**
 * Magebit_Faq
 *
 * @category     Magebit
 * @package      Magebit_Faq
 * @author       Kristaps Zaķis
 * @copyright    Copyright (c) 2022 Magebit, Ltd.(http://www.magebit.com/)
 */

namespace Magebit\Faq\Model\ResourceModel\Question;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Define resource model.0
     */
    protected function _construct()
    {
        $this->_init(
            'Magebit\Faq\Model\Question',
            'Magebit\Faq\Model\ResourceModel\Question'
        );
    }
}
