<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
/**
 * Geolocation
 *  
 * Geolocation library (actually just a wrapper class) based on Maxmind's Geolite Country solution http://www.maxmind.com/app/geolitecountry
 * 
 * Last	Modified:	5/13/2011
 * Author: MiklosK (http://codeigniter.com/forums/member/155463/)
 * 
 */
 
if (!function_exists('geoip_load_shared_mem'))
    include(dirname( __FILE__ ) . '/geoip/geoip.inc');
  
class Geolocation {
    
    var $geoip;
    
	function __construct()  {
	    
	    $CI =& get_instance();
	    	    				
		$CI->config->load('geolocation',true);
		
        $this->config = $CI->config->item('geolocation','geolocation');
        
        $this->geoip = geoip_open(dirname( __FILE__ ) . '/geoip/GeoIP.dat',$this->config['geoip_openmode']);        
		
	}
	
	function __destruct()  {
	    geoip_close($this->geoip);
	}
    
    function get_country_code($IP) {
        return geoip_country_code_by_addr($this->geoip, $this->_ip($IP));
    }
    
    function get_country_name($IP) {
        return geoip_country_name_by_addr($this->geoip, $this->_ip($IP));
    }
    
    private function _ip($IP) {
        return $IP ? $IP : $_SERVER['REMOTE_ADDR']; 
    }
        
}