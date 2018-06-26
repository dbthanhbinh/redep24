<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// Detect mobile or desktop
require_once 'Mobile_Detect.php';
class deviceDetect
{
    public $deviceresource;
    public $detectdevice_or_not;
    public $devicedetect;
    public $computerdefault;
    public $mobiledefault;
    public $tabletdefault;
    public $devicedefault;
    public $deviceclass;


    public function __construct() {
        $detect = new Mobile_Detect;
        $this->detectdevice_or_not = TRUE;
        $this->computerdefault  = 'front-end/default';
        $this->mobiledefault    = 'mobile';
        $this->tabletdefault    = 'mobile';
        if($this->detectdevice_or_not)
        {
            $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'mobile') : 'computer');            
            $this->devicedetect = $deviceType;
        }
        else
        {
            $this->devicedetect = 'computer';
        }
        $this->device_set_template_device();
    }
    
    /**
     * 
     * @param type $deviceName  ** name of device for check Ex: device_is_Checked('mobile')
     * @return boolean ** device name check is ok
     */
    public function device_is_Checked($deviceName)
    {
        if($this->devicedetect==$deviceName)
            return TRUE;
        return FALSE;
    }
    
    /**
     * 
     * @return type  ** return  device is detected  Ex: retur 'mobile' or return 'tablet' or return 'computer'
     */
    public function device_get_device_name()
    {
        return $this->devicedetect;
    }

    /**
     * 
     * @return type $this->devicedefault is template detect default folder Ex: mobile or tablet or front-end/default
     */
    public function device_get_template_device()
    {
         return $this->devicedefault;
    }
    
    public function device_set_template_device()
    {
        if($this->devicedetect=='mobile')
        {
            $this->devicedefault = $this->mobiledefault;
        }
        else if($this->devicedetect=='tablet') 
        {
            $this->devicedefault = $this->tabletdefault;
        }
        else {
            $this->devicedefault = $this->computerdefault;
        }
        
        $this->deviceclass   = $this->devicedetect . '-layout';        
    }
    
    public function device_show_device_class()
    {
        echo $this->deviceclass;
    }
    
    public function device_set_device_resource($value)
    {
        $this->deviceresource = $value;
    }
    
    public function device_get_device_resource($changeResource)
    {
        if($changeResource)
        {
            return get_template_directory_uri().'/' . $changeResource;
        }
        else 
        {
            return get_template_directory_uri().'/' . $this->devicedefault;
        }        
    }

    public function __destruct() {
        
    }
    
    public function test()
    {
        echo $this->deviceclass;
        echo '<br/>' . $this->devicedefault;
        echo '<br/>' . $this->devicedetect;
    }
}

$deviceDetect = new deviceDetect();
