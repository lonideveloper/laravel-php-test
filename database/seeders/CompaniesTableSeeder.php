<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert(
        [

        [
            'name' => 'companyone',
            'email' => 'companyone@company.com',
            'logo' => 'uploads/company/1686399635.jpg'
        ],
        [
            'name' => 'companytwo',
            'email' => 'companytwo@company.com',
            'logo' => 'uploads/company/1686399683.jpg'
        ],
        [
            'name' => 'companythree',
            'email' => 'companythree@company.com',
            'logo' => 'uploads/company/1686399713.jpg'
        ],
        [
            'name' => 'companythree',
            'email' => 'companythree@company.com',
            'logo' => 'uploads/company/1686399832.jpg'
        ],
        [
            'name' => 'companyfour',
            'email' => 'companyfour@company.com',
            'logo' => 'uploads/company/1686399865.jpg'
        ],
        [
            'name' => 'companyfive',
            'email' => 'companyfive@company.com',
            'logo' => 'uploads/company/1686399912.jpg'
        ],
        [
            'name' => 'companysix',
            'email' => 'companysix@company.com',
            'logo' => 'uploads/company/1686399948.jpg'
        ],
        [
            'name' => 'companyseven',
            'email' => 'companyseven@company.com',
            'logo' => 'uploads/company/1686399071.jpg'
        ],
        [
            'name' => 'companyeight',
            'email' => 'companyseven@company.com',
            'logo' => 'uploads/company/1686400071.png'
        ],
        [
            'name' => 'companynine',
            'email' => 'companynine@company.com',
            'logo' => 'uploads/company/1686400100.png'
        ],
        [
            'name' => 'companyten',
            'email' => 'companyten@company.com',
            'logo' => 'uploads/company/1686400217.jpg'
        ]
        ]
    );
    }
}
