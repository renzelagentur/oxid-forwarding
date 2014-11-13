<?php

/**
 * raforwardingevents
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
class raforwardingevents
{

    /**
     * creates a new table
     */
    public static function onActivate()
    {
        $oDB = oxDb::getDb();
        $oDB->execute(
            'CREATE TABLE IF NOT EXISTS raforwarding (
            `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
            `TITLE` varchar(255) NOT NULL,
            `ORIGIN` varchar(255) NOT NULL,
            `TARGET` varchar(255) NOT NULL,
            `ACTIVE` tinyint(1) NOT NULL DEFAULT "1",
            `OXSHOPID` int(11) NOT NULL,
            `OXPARENTID` char(32) DEFAULT NULL,
            PRIMARY KEY (`OXID`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8'
        );
    }
}
