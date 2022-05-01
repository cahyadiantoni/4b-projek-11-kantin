<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBusinessDetail;

class VendorsBusinessDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorRecords = [
            ['id'=>1,'vendor_id'=>1,'shop_name'=>'Toni Store','shop_address'=>'1234-CP','shop_city'=>'Bekasi','shop_state'=>'Jawa Barat','shop_country'=>'Indonesia','shop_pincode'=>'17530','shop_mobile'=>'1234567890','shop_website'=>'toni.com','shop_email'=>'toni@admin.com','address_proof'=>'Passport','address_proof_image'=>'test.jpg','business_license_number'=>'123456','gst_number'=>'123456','pan_number'=>'123456'],
        ];
        VendorsBusinessDetail::insert($vendorRecords);
    }
}
