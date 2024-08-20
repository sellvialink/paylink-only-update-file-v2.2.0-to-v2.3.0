<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\AppSettings;
use App\Models\Admin\BasicSettings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UpdateFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(BasicSettings::first()) {
            BasicSettings::first()->update([
                'web_version'       => "2.3.0",
            ]);
        }

        if(AppSettings::first()){
            AppSettings::first()->update(['version' => '2.3.0']);
        }
    }
}
