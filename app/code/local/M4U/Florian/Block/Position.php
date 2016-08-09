<?php class M4U_Florian_Block_Position extends Mage_Catalog_Block_Product_Abstract
{

    protected $_params;

    public function _getProductCollection()
    {
        $this->_params = $this->getRequest()->getParams();

        if($this->_params['pos'] == 'desc'){
            $pos = 'DESC';
        }else{
            $pos = 'ASC';
        }

        $collection = Mage::getModel('catalog/product')->getCollection()
            ->addAttributeToSelect('*')
            ->addAttributeToFilter('cat_position', array('nlike' => ''))
            ->addAttributeToSort('cat_position', $pos);


        return $collection;
    }
}