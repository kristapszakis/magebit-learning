<?php
declare(strict_types=1);

/**
 * Magebit_Faq
 *
 * @category     Magebit
 * @package      Magebit_Faq
 * @author       Rihards Ratke
 * @copyright    Copyright (c) 2022 Magebit, Ltd.(https://www.magebit.com/)
 */

namespace Magebit\Faq\Ui\Component\Form\Button;

use Magento\Backend\Block\Widget\Context;
use Magebit\Faq\Api\QuestionRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class GenericButton
 */
abstract class GenericButton
{
    /**
     * @var Context
     */
    protected $context;

    /**
     * @var QuestionRepositoryInterface
     */
    private $questionRepository;

    /**
     * @param Context $context
     * @param QuestionRepositoryInterface $questionRepository
     */
    public function __construct(
        Context $context,
        QuestionRepositoryInterface $questionRepository
    ) {
        $this->context = $context;
        $this->questionRepository = $questionRepository;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        try {
            return $this->questionRepository->getById(
                $this->context->getRequest()->getParam('id')
            )->getId();
        } catch (NoSuchEntityException $e) {
        }

        return null;
    }

    /**
     * @param string $route
     * @param array $params
     * @return string
     */
    public function getUrl(string $route = '', array $params = []): string
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
