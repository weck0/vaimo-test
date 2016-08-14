<?php
/**
 * Created by PhpStorm.
 * User: Florian Ceprika
 * Date: 12/08/2016
 * Time: 12:30
 */

class Wecko_Question_Adminhtml_QuestionController extends Mage_Adminhtml_Controller_Action{

    protected function _initAction()
    {
        $this->loadLayout()
            ->_setActiveMenu('question/items')
            ->_addBreadcrumb(Mage::helper('adminhtml')->__('Items Manager'), Mage::helper('adminhtml')->__('Item Manager'));
        return $this;
    }
    
    public function indexAction() {
        $this->_initAction();
        $this->_addContent($this->getLayout()->createBlock('question/adminhtml_question'));
        $this->renderLayout();
    }
    
    public function editAction()
    {
        $questionId = $this->getRequest()->getParam('id');
        $questionModel = Mage::getModel('question/question')->load($questionId);
        
        if ($questionModel->getId() || $questionId == 0) {
            
            Mage::register('question_data', $questionModel);
            $this->loadLayout();
            $this->_addContent($this->getLayout()->createBlock('question/adminhtml_question_edit'));
            $this->renderLayout();
            
        } else {
            
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('question')->__('Question does not exist'));
            $this->_redirect('*/*/');
        }
    }
    
    public function newAction()
    {
        $this->_forward('edit');
    }

    public function saveAction()
    {
        $date = Mage::getModel('core/date')->gmtDate();
        $redirectBack = $this->getRequest()->getParam('back', false);

        if ( $this->getRequest()->getPost() ) {
            try {
                $postData = $this->getRequest()->getPost();
                $questionModel = Mage::getModel('question/question')->load($this->getRequest()->getParam('question_id'));
                $questionModel->setName($postData['name'])
                    ->setContent($postData['content'])
                    ->setEmail($postData['email'])
                    ->setUpdateTime($date)
                ->save();
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Question was successfully saved'));
                Mage::getSingleton('adminhtml/session')->setquestionData(false);

                if ($redirectBack) {
                    $this->_redirect('*/*/edit', array('id' => $questionModel->getId()));
                    return;
                }

                $this->_redirect('*/*/');
                return;
                } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setquestionData($this->getRequest()->getPost());
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('question_id')));
            return;
        }
    }
            $this->_redirect('*/*/');
    }
    public function deleteAction()
    {
        if( $this->getRequest()->getParam('id') > 0 ) {
            try {
                $questionModel = Mage::getModel('question/question');
                $questionModel->setId($this->getRequest()->getParam('id'))
                            ->delete();

                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully deleted'));
                $this->_redirect('*/*/');

                } catch (Exception $e) {

                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
            }
        }

        $this->_redirect('*/*/');
    }

    public function massDeleteAction()
    {
        $questionIds = $this->getRequest()->getParam('question_id');
        if(!is_array($questionIds)) {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('question')->__('Please select question(s).'));
        } else {
            try {
                $questionModel = Mage::getModel('question/question');
                foreach ($questionIds as $questionId) {
                    $questionModel->load($questionId)->delete();
                }
                Mage::getSingleton('adminhtml/session')->addSuccess(
                    Mage::helper('question')->__(
                        'Total of %d record(s) were deleted.', count($questionIds)
                    )
                );
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }

        $this->_redirect('*/*/index');
    }

    /**
    * Product grid for AJAX request.
    * Sort and filter result for example.
    */
    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody($this->getLayout()->createBlock('importedit/adminhtml_question_grid')->toHtml());
    }
    
}