<?php
/**
 * raforwardinglist
 *
 * @package   raforwarding
 * @author    Mathis Schülingkamp <info@renzel-agentur.de>
 * @copyright Copyright (C) 17.03.2015 renzel.agentur GmbH. All rights reserved.
 * @license   MIT
 * @link      http://www.renzel-agentur.de/
 * @extends   oxList
 */
class raforwardinglist extends oxList
{

    /**
     * @var string
     */
    protected $_sObjectsInListName = 'raforwardingmodel';

    /**
     * loads all active forwarding list
     */
    public function loadActive()
    {
        $sSelect = sprintf('SELECT * FROM %s WHERE ACTIVE="1" AND OXSHOPID="%s" ORDER BY `ORIGIN`', getViewName('raforwarding'), $this->getConfig()->getShopId());
        $this->selectString($sSelect);
    }

    /**
     * loads all active by shop id
     *
     * @param int $iShopId shop id
     */
    public function loadByShopId($iShopId)
    {
        $sSelect = sprintf('SELECT * FROM %s WHERE OXSHOPID="%s" ORDER BY `ORIGIN`', getViewName('raforwarding'), $iShopId);
        $this->selectString($sSelect);
    }
}
