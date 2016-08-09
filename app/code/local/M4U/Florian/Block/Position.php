<?php class M4U_Florian_Block_Position extends Mage_Catalog_Block_Product_Abstract
{

    protected $_params;

    public function _getProductCollection()
    {
        $this->_params = $this->getRequest()->getParams();
        Mage::log($this->_params,null,'florian.log');

        $collection = Mage::getModel('catalog/product')->getCollection()
            ->addAttributeToSelect('*')
            ->addAttributeToFilter('cat_position', array('nlike' => ''))
            ->addAttributeToSort('cat_position', 'ASC');


        return $collection;
    }
}