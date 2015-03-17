<?php
/**
 * admin_raforwarding_main
 *
 * @package   raforwarding
 * @author    Mathis Schülingkamp <info@renzel-agentur.de>
 * @copyright Copyright (C) 17.03.2015 renzel.agentur GmbH. All rights reserved.
 * @license   MIT
 * @link      http://www.renzel-agentur.de/
 * @extends   oxAdminDetails
 */
class admin_raforwarding_main extends oxAdminDetails
{

    protected $_sThisTemplate = 'admin/forwarding_main.tpl';

    /**
     * Render Method
     *
     * @return string
     */
    public function render()
    {
        $sRet = parent::render();
        
        $sOxid = $this->getEditObjectId();
        $this->addTplParam('oxid', $sOxid);
            
        if ($sOxid != "-1" && isset($sOxid)) {
            /* @var $oForwarding \raforwardingmodel */
            $oForwarding = oxNew('raforwardingmodel');
            
            if ($oForwarding->load($sOxid)) {
                $this->addTplParam('edit', $oForwarding);
            }

            if ($oForwarding->isDerived()) {
                $this->addTplParam('readonly', true);
            }
            
        }
        return $sRet;
    }

    /**
     * Save the current forwarding rule
     */
    public function save()
    {
        parent::save();

        $oConfig = oxRegistry::getConfig();
        $sShopID = $oConfig->getShopId();
        $aParams = $oConfig->getRequestParameter('editval');
        $sOXID = $aParams['raforwarding__oxid'];

        if ($sOXID == '-1' && isset($sOXID)) {
            $aParams['raforwarding__oxid'] = null;
        }
        
        if ($sShopID != null) {
            $aParams['raforwarding__oxshopid'] = $sShopID;
        }
        
        /* @var $oForwarding \raforwardingmodel */
        $oForwarding = oxNew('raforwardingmodel');
        $oForwarding->assign($aParams);
        $oForwarding->save();
        
        // set OXID if inserted
        $this->setEditObjectId($oForwarding->getId());
    }
}
