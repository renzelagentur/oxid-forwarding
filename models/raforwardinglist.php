<?php

/**
 * raforwardinglist
 *
 * @package   MODULNAME
 * @version   GIT: $Id$ PHP5.4 (16.10.2014)
 * @author    Robin Lehrmann <info@renzel-agentur.de>
 * @copyright Copyright (C) 22.10.2014 renzel.agentur GmbH. All rights reserved.
 * @license   http://www.renzel-agentur.de/licenses/raoxid-1.0.txt
 * @link      http://www.renzel-agentur.de/
 * @extend    EXTENDEDCLASS
 *
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
