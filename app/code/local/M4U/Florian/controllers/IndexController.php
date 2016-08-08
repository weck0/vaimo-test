<?php
/**
 * Created by PhpStorm.
 * User: Florian Ceprika
 * Date: 08/08/2016
 * Time: 22:19
 */

class M4U_Florian_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout(array('default'));
        $this->renderLayout();
    }
}