/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// "Hello, World" class
function jsCheck()
{   
    var _payment = $('input[name=mshopping-payment]:checked').val();
    var Buyer = {            
            _mcountry:$('#mshopping-country').val(),
            _mfirstname:$('#mshopping-first-name').val(),
            _mlastname:$('#mshopping-last-name').val(),
            _maddress1:$('#mshopping-address-1').val(),
            _maddress2:$('#mshopping-address-2').val(),
            _mcitytown:$('#mshopping-city-town').val(),
            _mstate:$('#mshopping-state').val(),
            _mzipcode:$('#mshopping-zip-code').val(),
            _mphone:$('#mshopping-phone-number').val(),
            _memail:$('#mshopping-email').val(),
            _mnote:$('#mshopping-note').val(),
            _mpayment:_payment
        };
        
    this.errorBg = "#c21b15";
    this.errorText = "#fff";
    this.focusBg = "#f8ecc5";
    
    // display greeting
    this._isEmpty = function(x,id)
    {
        if (x == null || x == "") {   
            $("#" + id).css("background-color",this.focusBg);
            return false;
        }
        else
        {
            $("#" + id).css("background-color","");
            return true;
        }
    } 
    
    this._isEmail = function(x,id)
    {
        var atpos = x.indexOf("@");
        var dotpos = x.lastIndexOf(".");
        if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=x.length) { 
            $("#" + id).css("background-color",this.focusBg);
            return false;
        }
        else
        {
            $("#" + id).css("background-color","");
            return true;
        }
    }
    
    this._isCheckForm = function()
    {   
       var flag = "";         
       if(!this._isEmpty(Buyer._mfirstname,"mshopping-first-name")){flag += "0"};       
       if(!this._isEmpty(Buyer._mlastname,"mshopping-last-name")){flag += "0"};
       if(!this._isEmpty(Buyer._maddress1,"mshopping-address-1")){flag += "0"};
       if(!this._isEmpty(Buyer._mcitytown,"mshopping-city-town")){flag += "0"};
       if(!this._isEmpty(Buyer._mstate,"mshopping-state")){flag += "0"};
       if(!this._isEmpty(Buyer._mphone,"mshopping-phone-number")){flag += "0"};
       if(!this._isEmpty(Buyer._memail,"mshopping-email")){flag += "0"};   
       if(!this._isEmail(Buyer._memail,"mshopping-email")){flag += "0"};   
       if(flag=="")
           return true;
       else
           return false;
    }
}



