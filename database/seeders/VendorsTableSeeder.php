<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vendor;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorRecords = [
            ['id'=>1,'name'=>'toni','address'=>'CP-112','city'=>'Cikarang','state'=>'Jawa Barat','country'=>'Indonesia','pincode'=>'17530','mobile'=>'1234567890','email'=>'toni@admin.com','status'=>0],
        ];
        Vendor::insert($vendorRecords);
    }
}
