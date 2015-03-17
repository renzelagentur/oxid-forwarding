<?php
/**
 * raforwardingmodel
 *
 * @package   raforwarding
 * @author    Mathis Schülingkamp <info@renzel-agentur.de>
 * @copyright Copyright (C) 17.03.2015 renzel.agentur GmbH. All rights reserved.
 * @license   MIT
 * @link      http://www.renzel-agentur.de/
 * @extends   oxBase
 */
class raforwardingmodel extends oxBase
{

    /**
     * @var string
     */
    protected $_sClassName = 'raforwardingmodel';

    /**
     * @var string
     */
    protected $_sCoreTable = 'raforwarding';

    /**
     * initialize the model
     */
    public function __construct()
    {
        parent::__construct();
        $this->init();
    }

    /**
     * getter for active
     *
     * @return string
     */
    public function getActive()
    {
        return $this->getFieldData('ACTIVE');
    }

    /**
     * setter for active
     *
     * @param boolean $blActive active flag
     *
     * @return $this
     */
    public function setActive($blActive)
    {
        $this->_setFieldData('ACTIVE', $blActive);

        return $this;
    }
}
