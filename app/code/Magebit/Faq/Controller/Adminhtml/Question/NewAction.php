<?php
/**
 * Magebit_Faq
 *
 * @category     Magebit
 * @package      Magebit_Faq
 * @author       Kristaps Zaķis
 * @copyright    Copyright (c) 2022 Magebit, Ltd.(http://www.magebit.com/)
 */

namespace Magebit\Faq\Controller\Adminhtml\Question;

class NewAction extends \Magento\Backend\App\Action
{
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();

        return $resultRedirect->setPath('*/*/index');
    }
}
