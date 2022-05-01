<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBankDetail;

class VendorsBankDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorRecords = [
            ['id'=>1,'vendor_id'=>1,'account_holder_name'=>'Muhammad Toni','bank_name'=>'Bank Indonesia','account_number'=>'1234567890','bank_ifsc_code'=>'123456'],
        ];
        VendorsBankDetail::insert($vendorRecords);
    }
}
