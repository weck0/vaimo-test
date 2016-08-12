<?php
/**
 * Created by PhpStorm.
 * User: Florian Ceprika
 * Date: 12/08/2016
 * Time: 12:09
 */

class Wecko_Question_Block_Adminhtml_Question extends Mage_Adminhtml_Block_Widget_Grid_Container{
    
    public function __construct()
    {
        $this->_controller = 'adminhtml_question';
        $this->_blockGroup = 'question';
        $this->_headerText = Mage::helper('question')->__('Question Manager');
        $this->_addButtonLabel = Mage::helper('question')->__('Add Item');
        parent::__construct();
    }
}