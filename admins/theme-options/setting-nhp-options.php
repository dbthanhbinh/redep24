<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class themeSetting
{
    public $_template;  // destop template default
    public $_template_url; //// destop template default url
    
    public $options;
    public $basic;
    public $curency;
    public $curencyPrefix;
    
    public function __construct() 
    {
        $this->_template = 'default';
        $this->_template_url = get_template_directory_uri().'/front-end/' . $this->_template;
        
        $this->basic = 'tie_options';
        $this->options = get_option("$this->basic");        
     
        $this->curency = 'đ';
        $this->curencyPrefix = 'last';
    }

    

    /*********** Set and Get template url **********/
    public function setting_set_resource_url($value)
    {
        $this->_template_url = $value;
    }
    
    public function setting_get_resource_url()
    {
        return $this->_template_url;
    }
    
    public function setting_show_resource_url()
    {
        echo $this->_template_url;
    }
    /**********************************************/
    
    // get resource images/js/css + and resource file
    public function setting_get_resource($resource,$resourceFile)
    {
        return $this->_template_url . '/'.$resource.'/'.$resourceFile;
    }
    
    // show resource images/js/css + and resource file
    public function setting_show_resource($resource,$resourceFile)
    {
        echo $this->_template_url . '/'.$resource.'/'.$resourceFile;
    }
    
    /**
     * 
     * @param type $price
     * @param type $discount
     * @return int  price or discount gia cuoi giua price và discount
     */
    public function setting_format_price_discount_unitprice($price,$discount)
    {
        $price = intval($price);
        $discount = intval($discount);
        
        if($price<1)
            return 0;
        
        if($discount<1 || $discount>=$price)
        {
            return $price;
        }
        else if($discount>1 && $discount < $price)
        {
            return $discount;
        }
    }
    
    public function setting_format_price_with_prefix($price,$echo=FALSE)
    {
        $html = '';
        if($this->curencyPrefix=='first')
        {
            $html .= $this->curency . ' ' . $price;
        }
        else 
        {
            $html .= $price . ' ' . $this->curency;
        }
        
        if($echo)
            echo $html;
        else 
            return $html;
    }

    public function setting_format_price_discount_show_return2($price,$discount,$echo)
    {
        $html = '';
        $price = intval($price);
        $discount = intval($discount);
                
        if($price<1)
        {            
            $html .= ' 
                <div class="group-price">                    
                    <span class="pri1_wf">Liên hệ</span>   
                </div> 
                ';        
        }
        else if($discount<1 || $discount>=$price)
        {
            $html .= ' 
                <div class="group-price">                    
                    <span class="pri2_wf">'.$this->setting_format_price_with_prefix($price, FALSE).'</span>   
                </div> 
                ';
        }
        else if($discount>1 && $discount < $price)
        {
            $html .= ' 
                <div class="group-price">                    
                    <span class="pri1_wf">'.$this->setting_format_price_with_prefix($price, FALSE).'</span> 
                    <span class="pri2_wf">'.$this->setting_format_price_with_prefix($discount, FALSE).'</span>   
                </div> 
                ';
        }
       
        if($echo)
            echo $html;
        else
            return $html;
    }

    public function setting_format_price_discount_show_return($price,$discount,$echo=FALSE)
    {
        $html = '';
        $price = intval($price);
        $discount = intval($discount);
        
        if($price<1)
        {
            $html .= ' 
                <div class="group-price">                    
                    <span class="price2">Liên hệ</span>   
                </div> 
                ';        
        }
        else if($discount<1 || $discount>=$price)
        {
            $html .= ' 
                <div class="group-price">                    
                    <span class="price2">'.$this->setting_format_price_with_prefix($price, $echo=FALSE).'</span>   
                </div> 
                ';
        }
        else if($discount>1 && $discount < $price)
        {
            $html .= ' 
                <div class="group-price">                    
                    <span class="price1">'.$this->setting_format_price_with_prefix($price, $echo=FALSE).'</span> 
                    <span class="price2">'.$this->setting_format_price_with_prefix($discount, $echo=FALSE).'</span>   
                </div> 
                ';
        }
        
        if($echo)
            echo $html;
        else
            return $html;
    }
    


    // get options
    function get($opt_name, $default = null){
            return (!empty($this->options[$opt_name])) ? $this->options[$opt_name] : $default;
    }//function

    // set options
    function set($opt_name = '', $value = '') {
            if($opt_name != '')
            {
                    $this->options[$opt_name] = $value;
                    update_option($this->basic, $this->options);
            }//if
    }

    // show options
    function show($opt_name, $default = ''){
            $option = $this->get($opt_name);
            if(!is_array($option) && $option != ''){
                    echo $option;
            }elseif($default != ''){
                    echo $default;
            }
    }//function

    
    
    /***********************************************/
    public function __destruct() {

    }    

    public function test()
    {
        print_r($this->_template_url);
    }
}

$tie_options = new themeSetting();  

//$setting->test();
