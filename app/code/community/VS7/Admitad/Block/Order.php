<?php

class VS7_Admitad_Block_Order extends Mage_Core_Block_Template
{
    private $_orderItemsData = array();

    public function getOrderItemsData($force = false)
    {
        if (!empty($this->_orderItemsData) && !$force) {
            return $this->_orderItemsData;
        }

        $admitadUid = isset($_COOKIE['_aid']) ? $_COOKIE['_aid'] : null;
        if (empty($admitadUid)) {
            return;
        }
        $lastOrderId = Mage::getSingleton('checkout/session')->getLastOrderId();
        if (empty($lastOrderId)) {
            return;
        }
        $orderObj = Mage::getModel('sales/order')->load($lastOrderId);
        if (empty($orderObj)) {
            return;
        }
        $orderItems = $orderObj->getAllItems();
        $numItems = count($orderItems);
        if ($numItems == 0) {
            return;
        }

        $i = 0;
        foreach($orderItems as $item) {
            $i++;
            $itemArray = array(
                'uid' => $admitadUid,
                'tariff_code' => '1',
                'order_id' => $orderObj->getIncrementId(),
                'position_id' => $i,
                'currency_code' => $orderObj->getOrderCurrencyCode(),
                'position_count' => $numItems,
                'price' => $item->getPrice(),
                'quantity' => (int)$item->getQtyOrdered(),
                'product_id' => $item->getSku(),
                'payment_type' => 'sale'
            );
            $this->_orderItemsData[] = $itemArray;
        }
        return $this->_orderItemsData;
    }
}