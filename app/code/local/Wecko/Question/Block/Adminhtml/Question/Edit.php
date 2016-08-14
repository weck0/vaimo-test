<?php
/**
 * Created by PhpStorm.
 * User: Florian Ceprika
 * Date: 12/08/2016
 * Time: 12:11
 */

class Wecko_Question_Block_Adminhtml_Question_Edit extends Mage_Adminhtml_Block_Widget_Form_Container{

    public function __construct()
    {
        parent::__construct();
        $this->_objectId = 'id';
        $this->_blockGroup = 'question';
        $this->_controller = 'adminhtml_question';
        $this->_updateButton('delete', 'label', Mage::helper('question')->__('Delete Question'));
        $this->_updateButton('save', 'label', Mage::helper('question')->__("Save Question"));
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('question')->__('Save and Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);
        $this->_formScripts[] = "
            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";

    }

    public function getHeaderText()
    {
        if( Mage::registry('question_data') && Mage::registry('question_data')->getId() ) {
            return Mage::helper('question')->__("Edit Question from '%s'", $this->htmlEscape(Mage::registry('question_data')->getName()));
        } else {
            return Mage::helper('question')->__('Add Question');
        }
    }


    protected function _getModelTitle(){
        return 'Question';
    }

}