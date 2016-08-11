<?php
/**
 * Created by PhpStorm.
 * User: Florian Ceprika
 * Date: 11/08/2016
 * Time: 12:10
 */

class Wecko_Question_Model_Resource_Question extends  Mage_Core_Model_Resource_Db_Abstract {

    /**
     * Initialize resource model
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('question/question');
    }

}