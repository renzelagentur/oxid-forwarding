<?php

/**
 * @author math
 */
class admin_raforwarding_list extends oxAdminList
{

    /**
     * @var string
     */
    protected $_sThisTemplate = 'admin/forwarding_list.tpl';

    /**
     * @var string
     */
    protected $_sDefSortField = 'TITLE';

    /**
     * @var string
     */
    protected $_sListClass = 'raforwardingmodel';

    /**
     * Method which builds the where-clause
     *
     * @return array
     */
    public function buildWhere()
    {
        $aWhere = parent::buildWhere();
        $aWhere['oxshopid'] = $this->getConfig()->getShopId();

        return $aWhere;
    }
}
