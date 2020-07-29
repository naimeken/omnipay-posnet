<?php

namespace Omnipay\PosNet\Messages;

use SimpleXMLElement;

trait HelperTrait
{
    public function getRandomString(int $length)
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle($permitted_chars), 0, $length);
    }

    public function convertArrayToXml($data, SimpleXMLElement $xml): void
    {
        $_xml = $xml;

        // Visit all key value pair
        foreach ($data as $k => $v) {

            // If there is nested array then
            if (is_array($v)) {

                // Call function for nested array
                $this->convertArrayToXml($v, $_xml->addChild($k));
            } else {

                // Simply add child element.
                $_xml->addChild($k, $v);
            }
        }
    }
}