<?php
/**
 * Created by PhpStorm.
 * User: Florian Ceprika
 * Date: 10/08/2016
 * Time: 17:07
 */ 
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;
$installer->startSetup();
$installer->run("
DROP TABLE IF EXISTS {$this->getTable('question')};
CREATE TABLE {$this->getTable('question')} (
`question_id` int(11) unsigned NOT NULL auto_increment,
`title` varchar(255),
`content` text,
`status` smallint(6),
`created_time` datetime,
`update_time` datetime,
PRIMARY KEY (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");
$installer->endSetup();