<?php

/**
 * @package forwarding
 * @author Mathis Schuelingkamp <math@vkf-renzel.de>
 */
class raforwardingmodel extends oxBase {

    protected $_sClassName = 'raforwardingmodel';
    protected $_sCoreTable = 'raforwarding';
    protected $_blUseLazyLoading = false;

    public function __construct() {
        parent::__construct();
        $this->init();
    }

    /**
     * @return string
     */
    public function getActive() {
        return $this->getFieldData('ACTIVE');
    }
    
    /**
     * @return \ForwardingModel
     */
    public function setActive($sActive) {
        $this->_setFieldData('ACTIVE', $sActive);
        return $this;
    }

    public function assign($aParams) {
        $sRet = parent::assign($aParams);
        return $sRet;
    }

    public function save() {
        $sRet = parent::save();
        return $sRet;
    }

    public function delete($sOXID = null) {

        $this->load($sOXID);

        return parent::delete($sOXID);
    }
    
}

?>