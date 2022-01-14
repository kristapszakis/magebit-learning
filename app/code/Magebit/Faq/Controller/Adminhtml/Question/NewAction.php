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

        $this->_view->loadLayout();
        $this->_view->renderLayout();

        $faqData = $this->getRequest()->getParam('faq');

        if(is_array($faqData)) {
            $contact = $this->_objectManager->create(Contact::class);

            $contact->setData($faqData)->save();
            $resultRedirect = $this->resultRedirectFactory->create();

            return $resultRedirect->setPath('*/*/index');
        }
    }
}
