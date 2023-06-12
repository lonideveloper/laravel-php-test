<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class EmployeeTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_employee_is_created()
    {
          
            $response = $this->post('/api/login', [
                'email' => "admin@admin.com",
                'password' => "password"
            ]);
            $auth = $response->assertStatus(200)->decodeResponseJson()['token'];
    
             $response = $this->withHeaders([
                'Authorization' => "Bearer ".$auth,
            ])->post('/api/store-employee', [
                'firstName'=>'employee',
                'lastName'=>'thirty',
                'company_id'=>'12',
                'email'=>'employeethirty@gmail.com',
                'phone'=>'987654321'
            ]);

    
            $response->assertStatus(200);
         
    }

    public function test_employee_is_viewed() {

        $response = $this->post('/api/login', [
            'email' => "admin@admin.com",
            'password' => "password"
        ]);
        $auth = $response->assertStatus(200)->decodeResponseJson()['token'];

         $response = $this->withHeaders([
            'Authorization' => "Bearer ".$auth,
        ])->get('/api/view-employee');

         $response->assertStatus(200);

    }

    public function test_pagination_in_the_employee_record() {

        $response = $this->post('/api/login', [
            'email' => "admin@admin.com",
            'password' => "password"
        ]);
        $auth = $response->assertStatus(200)->decodeResponseJson()['token'];

         $content = $this->withHeaders([
            'Authorization' => "Bearer ".$auth,
        ])->get('/api/view-employee?page=1');

         $contentt = $content->decodeResponseJson()['employees']['data'];

         $this->assertCount(10, $contentt);

     
    }

    public function test_employee_is_updated(){

        $response = $this->post('/api/login', [
            'email' => "admin@admin.com",
            'password' => "password"
        ]);
        $auth = $response->assertStatus(200)->decodeResponseJson()['token'];

         $response = $this->withHeaders([
            'Authorization' => "Bearer ".$auth,
        ])->post('/api/update-employee/21', [
            'firstName'=>'employeess',
            'lastName'=>'nines',
            'company_id'=>'12',
            'email'=>'employeenines@gmail.com',
            'phone'=>'987654321'
        ]);
        $response->assertStatus(200);
    }


}
