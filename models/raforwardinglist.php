<?php

class raforwardinglist extends oxList
{
    /**
    *
    * @var string
    */
    protected $_sObjectsInListName = 'raforwardingmodel';

    /**
    * 
    * @param string $sOXID
    */
    public function loadActive()
    {
        $sSelect = sprintf('SELECT * FROM %s WHERE ACTIVE="1" AND OXSHOPID="%s" ORDER BY `ORIGIN`', getViewName('raforwarding'), oxConfig::getInstance()->getShopId());
        $this->selectString($sSelect);
    }
    
    public function loadByShopId($iShopId)
    {
        $sSelect = sprintf('SELECT * FROM %s WHERE OXSHOPID="%s" ORDER BY `ORIGIN`', getViewName('raforwarding'), $iShopId);
        $this->selectString($sSelect);
    }
    
}