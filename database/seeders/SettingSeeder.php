<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::updateOrCreate(['id' => '1'], [
            'address' => 'Address Example',
            'phone' => '01154665843',
            'email' => 'ahmed131@gmail.com',
            'facebook' => 'Ahmed Elmsery',
            'twitter' => 'Ahmed Elmsery',
            'youtube' => 'Ahmed Elmsery',
            'linkedin' => 'Ahmed Elmsery',
            'instagram' => 'Ahmed Elmsery',
        ]);
    }
}
