<?php
/**
 * Created by PhpStorm.
 * User: Florian Ceprika
 * Date: 10/08/2016
 * Time: 17:29
 */

class Wecko_Question_Model_Question extends Mage_Core_Model_Abstract{

    public function _construct()
    {
        parent::_construct();
        $this->_init('question/question');
    }

    /**
     * Save Form
     */
    public function saveForm($post)
    {
        $date = Mage::getModel('core/date')->gmtDate();

        if(!$post['id']){

            $this->setName($post['name'])
                ->setContent($post['comment'])
                ->setEmail($post['email'])
                ->setCreatedTime($date);
            $this->save();
        }else{

            $this->load($post['id']);

            $this->setName($post['name'])
                ->setContent($post['comment'])
                ->setEmail($post['email'])
                ->setUpdateTime($date);
            $this->save();
        }

    }

}