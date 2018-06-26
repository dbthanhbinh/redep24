<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class payPal
{
    public $payPalUrl;
    public $payPalSandbox;
    public $payPalUrlRun;
    public $payPalItem_name;
    public $payPalQuantity;
    public $payPalAmount;
    public $payPalBusiness; // email
    public $payPalItem_number;
    public $payPalReturn;
    public $payPalCancel_return;
    public $payPalNotify_url;
    public $payPalButtonUrl;
    public $payPalCurrency;


    public function __construct() {
     
        $this->payPalUrl = 'https://www.paypal.com/cgi-bin/webscr';
        $this->payPalSandbox = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
        $this->payPalUrlRun  = '';
        $this->payPalItemname = date('mdYhi');
        $this->payPalQuantity = '';
        $this->payPalAmount = '';
        $this->payPalBusiness = 'dbthanhbinh@gmail.com';
        $this->payPalItem_number = '';
        $this->payPalReturn = get_bloginfo("url").'/paypal-success';  // page thanks after payment success
        $this->payPalCancel_return = get_bloginfo("url").'/paypal-cancel'; // page cancel after payment paypal
        $this->payPalNotify_url = get_bloginfo("url").'/paypal-verify';  // page paypal verify paymen after
        $this->payPalButtonUrl = get_template_directory_uri().'/webseo24h-shop/payment/images/paypal-buy-now-button.jpg';
        $this->payPalCurrency = 'USD';
    }
    
    public function __destruct() {
        
    }
    
     // payPalCurrency
    public function payPal_set_payPalCurrency($value)
    {
        $this->payPalCurrency = $value;
    }
    
    public function payPal_get_payPalCurrency()
    {
        return $this->payPalCurrency;
    }
    
     // payPalButtonUrl
    public function payPal_set_payPalButtonUrl($value)
    {
        $this->payPalButtonUrl = $value;
    }
    
    public function payPal_get_payPalButtonUrl()
    {
        return $this->payPalButtonUrl;
    }
    
     // payPalNotify_url
    public function payPal_set_payPalNotify_url($value)
    {
        $this->payPalNotify_url = $value;
    }
    
    public function payPal_get_payPalNotify_url()
    {
        return $this->payPalNotify_url;
    }
    
     // payPalCancel_return
    public function payPal_set_payPalCancel_return($value)
    {
        $this->payPalCancel_return = $value;
    }
    
    public function payPal_get_payPalCancel_return()
    {
        return $this->payPalCancel_return;
    }
    
    // payPalReturn
    public function payPal_set_payPalReturn($value)
    {
        $this->payPalReturn = $value;
    }
    
    public function payPal_get_payPalReturn()
    {
        return $this->payPalReturn;
    }
    
    // payPalItem_number
    public function payPal_set_payPalItem_number($value)
    {
        $this->payPalItem_number = $value;
    }
    
    public function payPal_get_payPalItem_number()
    {
        return $this->payPalItem_number;
    }
    
    // payPalBusiness
    public function payPal_set_payPalBusiness($value)
    {
        $this->payPalBusiness = $value;
    }
    
    public function payPal_get_payPalBusiness()
    {
        return $this->payPalBusiness;
    }
    
    // payPalpayPalAmount
    public function payPal_set_payPalAmount($value)
    {
        $this->payPalAmount = $value;
    }
    
    public function payPal_get_payPalAmount()
    {
        return $this->payPalAmount;
    }
    
    // payPalpayPalQuantity
    public function payPal_set_payPalQuantity($value)
    {
        $this->payPalQuantity = $value;
    }
    
    public function payPal_get_payPalQuantity()
    {
        return $this->payPalQuantity;
    }
    
    // payPalSandbox
    public function payPal_set_payPalItemname($value)
    {
        $this->payPalItemname = $value;
    }
    
    public function payPal_get_payPalItemname()
    {
        return $this->payPalItemname;
    }    

    // payPalSandbox
    public function payPal_set_payPalSandbox($value)
    {
        $this->payPalSandbox = $value;
    }
    
    public function payPal_get_payPalSandbox()
    {
        return $this->payPalSandbox;
    }
    
    // PayPalUrl
    public function payPal_set_payPalUrl($value)
    {
        $this->payPalUrl = $value;
    }
    
    public function payPal_get_payPalUrl()
    {
        return $this->payPalUrl;
    }
    
    // Run PayPalUrl
    public function payPal_set_payPalUrl_run($value)
    {
        $this->payPalUrlRun = $value;
    }
    
    public function payPal_get_payPalUrl_run()
    {
        return $this->payPalUrlRun;
    }
    
    public function payPal_reset_payPalMethod($modeSandbox,$emailbuyer,$quantity,$amount,$item_number)
    {
        if($modeSandbox=='run')
        {
            $this->payPal_set_payPalUrl_run($this->payPalUrl);
            $this->payPal_set_payPalBusiness($emailbuyer?$emailbuyer:$this->payPalBusiness);
        }
        else
        {
            $this->payPal_set_payPalUrl_run($this->payPalSandbox);
            $this->payPal_set_payPalBusiness($emailbuyer?$emailbuyer:$this->payPalBusiness);
        }
        
        $this->payPal_set_payPalQuantity($quantity);
        $this->payPal_set_payPalAmount($amount);
        $this->payPal_set_payPalItem_number($item_number);
    }


    public function payMent_get_button($quantity,$amount,$item_number)
    {   
        $this->payPal_set_payPalQuantity($quantity);
        $this->payPal_set_payPalAmount($amount);
        $this->payPal_set_payPalItem_number($item_number);
        
        $mybutton = '';
        $mybutton .= '
                <form name="paypal_form" action="" method="post" class="checkout-load-form-paypal">													
                    
                    <div class="mshopping-btn-complete-fix">
                        <input class="go-to-checkout" type="button" id="mshopping-btn-complete" value="Complete" />
                        <img  alt="" src="'. $this->payPal_get_payPalButtonUrl() . '" />
                    </div>    
                </form>
                ';
        
        return $mybutton;
    }
    
    public function payMent_get_button_submit_form($quantity,$amount,$item_number)
    {
        global $options;
        $modeSandbox = $options->get('payment-running-method');
        $emailbuyer = $options->get('payment-account-paypal');
        
        $this->payPal_reset_payPalMethod($modeSandbox,$emailbuyer,$quantity,$amount,$item_number);
        
        $mybutton = '';
        $mybutton .= '
                <form id="paypal_form" name="paypal_form" action="'.$this->payPal_get_payPalUrl_run().'" method="post" class="checkout-load-form-paypal">													
                    <input type="hidden" name="item_name_1" value="'.$this->payPal_get_payPalItemname().'" />
                    <input type="hidden" name="quantity_1" value="'.$this->payPal_get_payPalQuantity().'" />
                    <input type="hidden" name="amount_1" value="'.$this->payPal_get_payPalAmount().'" />

                    <input type="hidden" name="cmd" value="_cart" />
                    <input type="hidden" name="upload" value="1" />
                    <input type="hidden" name="business" value="'.$this->payPal_get_payPalBusiness().'" /> 	                        
                    <input type="hidden" name="item_number" value="'.$this->payPal_get_payPalItem_number().'" />

                    <input type="hidden" name="currency_code" value="'.$this->payPal_get_payPalCurrency().'" />											
                    <input type="hidden" name="return" value="'.$this->payPal_get_payPalReturn().'" />
                    <input type="hidden" name="cancel_return" value="'.$this->payPal_get_payPalCancel_return().'" />
                    <input type="hidden" name="notify_url" value="'.$this->payPal_get_payPalNotify_url().'" />	
                    
                    <div class="mshopping-btn-complete-fix">
                        <input class="go-to-checkout" type="submit" id="mshopping-btn-complete" value="Complete" />
                        <img  alt="" src="'. $this->payPal_get_payPalButtonUrl() . '" />
                    </div>    
                </form>
                 
                <script type="text/javascript">                    
                    document.paypal_form.submit();
                </script>
                
                ';
        
        return $mybutton;
    }
    
    
    

    public function test()
    {
        return 'fasdfas';
    }
}

$payMent = new payPal();
      
/*
$quantity = 1;
$amount = intval($ws24hShop->shopCartGetTotalPrice());
$item_number = date('mdYhi');        
print_r($payMent->payMent_get_button_submit_form($quantity,$amount,$item_number));
*/        
//print_r($payMent->payMent_get_button_submit_form(1,1,1));