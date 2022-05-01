<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecords = [
            ['id'=>2,'name'=>'Toni','type'=>'vendor','vendor_id'=>1,'mobile'=>'1234567890','email'=>'toni@admin.com','password'=>'$2a$12$UrI1wPsR12z.6Ug01S8NlulcP460dJZRo5yvXLFRdhrOFWZJ97Twi','image'=>'','status'=>0],
        ];
        Admin::insert($adminRecords);
    }
}
