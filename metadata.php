<?php
/**
 * This Software is the property of OXID eSales and is protected
 * by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license key
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.

 * @link      http://www.oxid-esales.com
 * @copyright (C) OXID eSales AG 2003-2013
 */

/**
 * Metadata version
 */
$sMetadataVersion = '1.1';

/**
 * Module information
 */
$aModule = array(
    'id'           => 'raforwarding',
    'title'        => 'Renzel agentur Weiterleitung',
    'description'  => array(
        'de' => 'Modul zum erstellen und bearbeiten von Weiterleitungen',
        'en' => 'RA Forwarding lets you create custom 301 Redirects with origin and target for each shop',
    ),
    'thumbnail'    => 'picture.jpg',
    'version'      => '1.0',
    'author'       => 'math@vkf-renzel.de',
    'url'          => 'http://www.oxid-esales.com',
    'email'        => 'math@vkf-renzel.de',
    'extend' => array(
        'oxseodecoder' => 'ra/forwarding/extend/raforwardingoxseodecoder'
    ),
    'templates' => array(
        'admin/forwarding.tpl' => 'ra/forwarding/views/admin/tpl/forwarding.tpl',
        'admin/forwarding_list.tpl' => 'ra/forwarding/views/admin/tpl/forwarding_list.tpl',
        'admin/forwarding_main.tpl' => 'ra/forwarding/views/admin/tpl/forwarding_main.tpl',
    ),
    'files' => array(
        'raforwardingevents' => 'ra/forwarding/events.php',
        'raforwardingmodel' => 'ra/forwarding/models/raforwardingmodel.php',
        'raforwardinglist' => 'ra/forwarding/models/raforwardinglist.php',
    	'admin_raforwarding' => 'ra/forwarding/controllers/admin/raforwarding.php',
        'admin_raforwarding_main' => 'ra/forwarding/controllers/admin/raforwarding_main.php',
        'admin_raforwarding_list' => 'ra/forwarding/controllers/admin/raforwarding_list.php'
    ),
    'events' => array(
        'onActivate' => 'raforwardingevents::onActivate',
    )
);