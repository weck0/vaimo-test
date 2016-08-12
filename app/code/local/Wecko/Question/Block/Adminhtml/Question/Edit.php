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
        $this->_updateButton('save', 'label', Mage::helper('question')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('question')->__('Delete Item'));
    }

    public function getHeaderText()
    {
        if( Mage::registry('question_data') && Mage::registry('question_data')->getId() ) {
        return Mage::helper('question')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('question_data')->getTitle()));
        } else {
            return Mage::helper('question')->__('Add Item');
        }
    }

}