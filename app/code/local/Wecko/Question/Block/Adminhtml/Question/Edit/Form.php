<?php
/**
 * Created by PhpStorm.
 * User: Florian Ceprika
 * Date: 12/08/2016
 * Time: 12:23
 */

class Wecko_Question_Block_Adminhtml_Question_Edit_Form extends Mage_Adminhtml_Block_Widget_Form{

    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('question_form', array('legend'=>Mage::helper('question')->__('Question information')));

        $fieldset->addField('name', 'text', array(
            'label' => Mage::helper('question')->__('Name'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'name',
        ));

        $fieldset->addField('email', 'text', array(
            'label' => Mage::helper('question')->__('Email'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'email',
        ));

        $fieldset->addField('content', 'editor', array(
            'name' => 'content',
            'label' => Mage::helper('question')->__('Comment'),
            'style' => 'width:98%; height:200px;',
            'required' => true,
        ));

        if ( Mage::getSingleton('adminhtml/session')->getquestionData() )
        {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getquestionData());
            Mage::getSingleton('adminhtml/session')->setquestionData(null);
        } elseif ( Mage::registry('question_data') ) {
            $form->setValues(Mage::registry('question_data')->getData());
        }

        return parent::_prepareForm();
    }
    
}