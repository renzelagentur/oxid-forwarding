<?php

class raforwardingoxseodecoder extends raforwardingoxseodecoder_parent {

    /**
     * @var \raforwardinglist
     */
    protected $aForwardings;

    /**
     * @return \raforwardinglist
     */
    public function getForwardings() {
        if ($this->aForwardings === NULL) {
            $this->aForwardings = oxNew('raforwardinglist');
        }

        return $this->aForwardings;
    }

    /**
     * @param string $sSeoUrl
     * @return mixed
     */ 
   public function decodeUrl($sSeoUrl) {
        $this->getForwardings()->loadActive();
        
        $sSeoUrl = trim(urldecode($sSeoUrl), '/');
        
        /* @var $oForwarding \raforwardingmodel */
        foreach ($this->getForwardings() as $oForwarding) {
            $sOrigin = trim($oForwarding->raforwarding__origin->value, '/');
            
            
            $sTarget = $oForwarding->raforwarding__target->value;
            if ($sOrigin === $sSeoUrl) {
                if($sTarget[0].$sTarget[1].$sTarget[2].$sTarget[3] != 'http' && $sTarget[0] != '/') {
                    $sTarget = '/' . $oForwarding->raforwarding__target->value;
                }
                
                header('Location: ' . $sTarget );
                exit;
            }
        }
        return parent::decodeUrl($sSeoUrl);
    }

}

?>