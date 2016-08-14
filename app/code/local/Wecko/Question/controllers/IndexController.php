<?php
/**
 * Created by PhpStorm.
 * User: Florian Ceprika
 * Date: 10/08/2016
 * Time: 17:08
 */

class Wecko_Question_IndexController extends Mage_Core_Controller_Front_Action{

    public function indexAction()
    {
        $this->loadLayout();
        $this->getLayout()->getBlock('head')->setTitle($this->__('Any Questions ?'));
        $this->renderLayout();
    }

    public function postAction()
    {
        $post = $this->getRequest()->getPost();
        if ( $post ) {
            Mage::getModel('question/question')->saveForm($post);
            return 'Success!';
        } else {
            return 'Error';
        }
    }
}