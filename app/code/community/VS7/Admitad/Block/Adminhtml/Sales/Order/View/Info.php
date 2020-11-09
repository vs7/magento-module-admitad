<?php

class VS7_Admitad_Block_Adminhtml_Sales_Order_View_Info extends Mage_Adminhtml_Block_Sales_Order_View_Info
{

    protected $_order;

    public function getOrder()
    {
        if (is_null($this->_order)) {
            if (Mage::registry('current_order')) {
                $this->_order = Mage::registry('current_order');
            } elseif (Mage::registry('order')) {
                $this->_order = Mage::registry('order');
            } else {
                $this->_order = new Varien_Object();
            }
        }
        return $this->_order;
    }
}