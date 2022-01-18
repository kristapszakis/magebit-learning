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

namespace Magebit\Faq\Block;

use Magebit\Faq\Model\Question;
use Magento\Framework\View\Element\Template;

class QuestionList extends Template
{
    /**
     * Question factory.
     *
     * @var \Magebit\Faq\Model\QuestionFactory
     */
    protected $questionFactory;

    /**
     * Question model.
     *
     * @var \Magebit\Faq\Model\Question
     */
    protected $question;

    /**
     * Scope config.
     *
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * Item collection factory.
     *
     * @var \Magebit\Faq\Model\ResourceModel\Question\CollectionFactory
     */
    protected $questionCollectionFactory;


    public function __construct (
        \Magento\Framework\View\Element\Template\Context $context,
        \Magebit\Faq\Model\ResourceModel\Question\CollectionFactory $questionCollectionFactory,
        \Magebit\Faq\Model\QuestionFactory $questionFactory,
        Question $question,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->questionFactory = $questionFactory;
        $this->question = $question;
        $this->questionCollectionFactory = $questionCollectionFactory;
    }

    public function getCollection(): \Magebit\Faq\Model\ResourceModel\Question\Collection
    {
        return $this->questionCollectionFactory->create()
            ->addFieldToFilter('status', 1)
            ->setOrder('position', 'ASC');
    }
}
