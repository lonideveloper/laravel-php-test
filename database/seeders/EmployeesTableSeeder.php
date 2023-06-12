<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('employees')->insert(
            [
    
            [
                'firstName' => 'employee',
                'lastname'=>'one',
                'company_id' => '1',
                'email' => 'employeeone@gmail.com',
                'phone' => '901234567'
            ],
            [
                'firstName' => 'employee',
                'lastname'=>'two',
                'company_id' => '2',
                'email' => 'employeetwo@gmail.com',
                'phone' => '901234567'
            ],
            [
                'firstName' => 'employee',
                'lastname'=>'three',
                'company_id' => '3',
                'email' => 'employeethree@gmail.com',
                'phone' => '901234569'
            ],
            [
                'firstName' => 'employee',
                'lastname'=>'three',
                'company_id' => '4',
                'email' => 'employeethree@gmail.com',
                'phone' => '901234579'
            ],
            [
                'firstName' => 'employee',
                'lastname'=>'four',
                'company_id' => '5',
                'email' => 'employeefour@gmail.com',
                'phone' => '901234519'
            ],
            [
                'firstName' => 'employee',
                'lastname'=>'five',
                'company_id' => '6',
                'email' => 'employeefive@gmail.com',
                'phone' => '901234520'
            ],
            [
                'firstName' => 'employee',
                'lastname'=>'six',
                'company_id' => '7',
                'email' => 'employeesix@gmail.com',
                'phone' => '901234570'
            ],
            [
                'firstName' => 'employee',
                'lastname'=>'seven',
                'company_id' => '8',
                'email' => 'employeeseven@gmail.com',
                'phone' => '901234588'
            ],
            [
                'firstName' => 'employee',
                'lastname'=>'eight',
                'company_id' => '9',
                'email' => 'employeeeight@gmail.com',
                'phone' => '901234599'
            ],
            [
                'firstName' => 'employee',
                'lastname'=>'nine',
                'company_id' => '10',
                'email' => 'employeenine@gmail.com',
                'phone' => '901234522'
            ],
            [
                'firstName' => 'employee',
                'lastname'=>'ten',
                'company_id' => '11',
                'email' => 'employeeten@gmail.com',
                'phone' => '901234522'
            ]
            ]
        );
    }
}
