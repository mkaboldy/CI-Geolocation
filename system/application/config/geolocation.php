<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
/**
 * Config options for Geolocation library
 *	
 */

$config['geolocation'] = array();

/**
 * GeoIP.dat load mode
 * 
 * possible modes as defined:
 * 
define("GEOIP_STANDARD", 0);
define("GEOIP_MEMORY_CACHE", 1);
define("GEOIP_SHARED_MEMORY", 2);
 */
 
$config['geolocation']['geoip_openmode'] = GEOIP_STANDARD; 
 
?>