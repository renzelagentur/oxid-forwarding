<?php

/**
 * @author math
 */
class admin_raforwarding_main extends oxAdminDetails
{

    protected $_sThisTemplate = 'admin/forwarding_main.tpl';

    /**
     *
     * @return string
     */
    public function render()
    {
        $sRet = parent::render();
        
        $sOxid = $this->getEditObjectId();
        $this->addTplParam('oxid', $this->getEditObjectId());
            
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

    public function save()
    {
        parent::save();

        $aParams = oxConfig::getParameter('editval');
        $sOXID = $aParams['raforwarding__oxid'];
        $sShopID = oxConfig::getInstance()->getShopId();
        
        
        if($sOXID == '-1' && isset($sOXID)) {
            $aParams['raforwarding__oxid'] = null;
        }
        
        if($sShopID != NULL) {
            $aParams['raforwarding__oxshopid'] = oxConfig::getInstance()->getShopId();
        }
        
        /* @var $oForwarding \raforwardingmodel */
        $oForwarding = oxNew('raforwardingmodel');
        
        $oForwarding->assign($aParams);
        $oForwarding->save();
        
        // set OXID if inserted
        $this->setEditObjectId( $oForwarding->getId() );
    }

}

?>
