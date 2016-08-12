<?php
/**
 * Created by PhpStorm.
 * User: Florian Ceprika
 * Date: 12/08/2016
 * Time: 12:19
 */

class Wecko_Question_Block_Adminhtml_Question_Grid extends Mage_Adminhtml_Block_Widget_Grid{

    public function __construct()
    {
        parent::__construct();
        $this->setId('questionGrid');
        // This is the primary key of the database
        $this->setDefaultSort('question_id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('question_id');
        $this->getMassactionBlock()->setFormFieldName('question_id');

        $this->getMassactionBlock()->addItem('delete', array(
            'label'=> Mage::helper('question')->__('Delete'),
            'url'  => $this->getUrl('*/*/massDelete', array('' => '')),        // public function massDeleteAction() in Mage_Adminhtml_Tax_RateController
            'confirm' => Mage::helper('question')->__('Are you sure?')
        ));

        return $this;
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('question/question')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $helper = Mage::helper('question');

        $this->addColumn('question_id', array(
        'header' => Mage::helper('question')->__('ID'),
        'align' =>'right',
        'width' => '50px',
        'index' => 'question_id',
        ));

        $this->addColumn('name', array(
        'header' => Mage::helper('question')->__('Name'),
        'align' =>'left',
        'index' => 'name',
        ));

        $this->addColumn('email', array(
            'header' => Mage::helper('question')->__('Email'),
            'align' =>'left',
            'index' => 'email',
        ));

        $this->addColumn('created_time', array(
        'header' => Mage::helper('question')->__('Creation Time'),
        'align' => 'left',
        'width' => '120px',
        'type' => 'date',
        'default' => '–',
        'index' => 'created_time',
        ));

        $this->addColumn('update_time', array(
        'header' => Mage::helper('question')->__('Update Time'),
        'align' => 'left',
        'width' => '120px',
        'type' => 'date',
        'default' => '–',
        'index' => 'update_time',
        ));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getQuestionId()));
    }
    
}