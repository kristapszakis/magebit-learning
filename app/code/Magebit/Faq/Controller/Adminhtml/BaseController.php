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

namespace Magebit\Faq\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpPostActionInterface;

abstract class BaseController extends Action implements HttpPostActionInterface
{
    public function __construct(
        \Magento\Backend\App\Action\Context $context
    ) {
        parent::__construct($context);
    }
}
