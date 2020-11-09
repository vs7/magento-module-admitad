<?php

class VS7_Admitad_Helper_Data extends Mage_Core_Helper_Abstract {

    public function getEncodedGetString($data = null)
    {
        if (empty($data) || !is_array($data)) {
            return;
        }

        $result = '';
        foreach ($data as $key => $value) {
            $result .= urlencode($key) . '=' . urlencode($value) . '&';
        }

        return $result;
    }
}