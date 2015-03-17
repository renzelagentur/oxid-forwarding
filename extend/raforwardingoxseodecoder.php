<?php
/**
 * raforwardingoxseodecoder
 *
 * @package   raforwarding
 * @author    Mathis Schülingkamp <info@renzel-agentur.de>
 * @copyright Copyright (C) 17.03.2015 renzel.agentur GmbH. All rights reserved.
 * @license   MIT
 * @link      http://www.renzel-agentur.de/
 */
class raforwardingoxseodecoder extends raforwardingoxseodecoder_parent
{

    /**
     * @var \raforwardinglist
     */
    protected $_aForwardings;

    /**
     * redirect's if the seourl matches
     *
     * @param string $sSeoUrl seo url to analyse
     *
     * @return mixed
     */
    public function decodeUrl($sSeoUrl)
    {
        $aForwardings = $this->getForwardings();
        $aForwardings->loadActive();

        /* @var $oForwarding \raforwardingmodel */
        foreach ($aForwardings as $oForwarding) {
            $sOrigin = trim($oForwarding->raforwarding__origin->value, '/');
            $sTarget = $oForwarding->raforwarding__target->value;
            if ($sOrigin === trim(urldecode($sSeoUrl), '/')) {
                if (substr($sOrigin, 0, 4) == 'http') {
                    $sTarget = '/' . $oForwarding->raforwarding__target->value;
                }
                header('Location: ' . $sTarget);
                exit;
            }
        }

        return parent::decodeUrl($sSeoUrl);
    }

    /**
     * get active forwarding list
     *
     * @return \raforwardinglist
     */
    public function getForwardings()
    {
        if ($this->_aForwardings === null) {
            $this->_aForwardings = oxNew('raforwardinglist');
        }

        return $this->_aForwardings;
    }
}
