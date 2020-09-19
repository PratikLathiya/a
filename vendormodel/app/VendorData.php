<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class VendorData extends Model{

    protected $table = 'vendor_data';
    protected $guarded = [];
    protected $fillable = ['brand_name','customer_name','customer_email', 'customer_number','email_otp','mobile_otp','product_address','product_category','pancard_number','gst_registration','adhaar_card','shop_establishment_no'];
}