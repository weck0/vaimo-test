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
        $this->renderLayout();
    }
}