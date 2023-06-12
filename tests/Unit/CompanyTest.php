<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class CompanyTest extends TestCase
{
    public function test_for_unauthenticated_user() {


        $response = $this->withHeaders([
            'Content-Type: application/json'
        ])->post('/api/login', [
            'email' => "raheen@admin.com",
            'password' => "raheen"
        ]);
    
       // dd($response);
      
        $response->assertStatus(200);
        $response->assertJson(['status' => 401]);
    
       }
    
    
    
        public function test_company_is_created_and_email_sent()
        {
          
            $response = $this->post('/api/login', [
                'email' => "admin@admin.com",
                'password' => "password"
            ]);
            $auth = $response->assertStatus(200)->decodeResponseJson()['token'];
    
             $response = $this->withHeaders([
                'Authorization' => "Bearer ".$auth,
            ])->post('/api/store-company', [
                'name'=>'microcontroller',
                'email'=>'microcontrollers@gmail.com',
                'logo'=>'uploads/company/1686468556.jp'
            ]);
    
            //$response->assertStatus(200);
    
            Mail::send('emails.companyCreated',array('name'=>'microcontroller'), function($message){
                $message->to('ziadikhan8@gmail.com','Company created')
                ->subject('Company Created Subject');
            });
    
            $response->assertStatus(200);
         
    
        }
    
        public function test_company_is_viewed() {
    
            $response = $this->post('/api/login', [
                'email' => "admin@admin.com",
                'password' => "password"
            ]);
            $auth = $response->assertStatus(200)->decodeResponseJson()['token'];
    
             $response = $this->withHeaders([
                'Authorization' => "Bearer ".$auth,
            ])->get('/api/view-company');
    
             $response->assertStatus(200);
    
        }
    
        public function test_pagination_in_the_company_record() {
    
            $response = $this->post('/api/login', [
                'email' => "admin@admin.com",
                'password' => "password"
            ]);
            $auth = $response->assertStatus(200)->decodeResponseJson()['token'];
    
             $content = $this->withHeaders([
                'Authorization' => "Bearer ".$auth,
            ])->get('/api/view-company?page=1');
    
           $contentt = $content->decodeResponseJson()['company']['data'];
    
           //dd($contentt);
    
            $this->assertCount(10, $contentt);
    
           // $response->assertStatus(200);
      
           
        }

        public function test_company_is_updated() {

            $response = $this->post('/api/login', [
                'email' => "admin@admin.com",
                'password' => "password"
            ]);
            $auth = $response->assertStatus(200)->decodeResponseJson()['token'];
    
             $response = $this->withHeaders([
                'Authorization' => "Bearer ".$auth,
            ])->post('/api/update-company/11', [
                'name'=>'companytenth',
                'email'=>'companytenth@gmail.com',
                'logo'=>'uploads/company/1686468556.jpg'
            ]);
    
            //$response->assertStatus(200);
    
          
    
            $response->assertStatus(200);
        }
}
