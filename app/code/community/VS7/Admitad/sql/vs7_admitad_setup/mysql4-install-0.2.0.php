<?php
$installer = $this;
$installer->startSetup();

$installer->addAttribute('order', 'admitad_uid', array('type' => 'varchar'));
$installer->addAttribute('quote', 'admitad_uid', array('type' => 'varchar'));
$installer->endSetup();