<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

//Changes in company controller

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::paginate(10);
        return response()->json([
            'status'=>200,
            'company'=>$company,
        ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
       

           $validated = $request->validated();
           $file = $request->file('logo');
           $path = $file->storeAs(
            'uploads/company', 
            time() . '.' . $request->file('logo')->extension());

            $file->move('uploads/company/', basename($path));

            $validated['logo'] = $path;

        $company = Company::create($validated); 

        Mail::send('emails.companyCreated',$company->toArray(), function($message){
            $message->to('ziadikhan8@gmail.com','Company created')
            ->subject('Company Created Subject');
        });

        return response()->json([
           'success' => true,
           'status' => 200,
           'message' => 'Company Created AND Email Sent Successfully',
       ]);

        /*

        if (isset($data['logo'])) {
            $relativePath = $this->saveImage($data['logo']);
            $data['logo'] = $relativePath;
        }  */
/*
        return response()->json([
           
            
            'return' => $data,
            'message'=>'Company Registered Successfully',
            
        ]); */

        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        if($company)
        {
            return response()->json([
                'status'=>200,
                'company'=>$company,
            ]);   
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Company Found',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        
        $validated = $request->validated();

        $company = Company::find($id);
        if($company) {

               $file = $request->file('logo');
                $path = $file->storeAs(
                'uploads/company', 
                time() . '.' . $request->file('logo')->extension());
        
                $file->move('uploads/company/', basename($path));
        
                $validated['logo'] = $path;
        
                $company->update($validated); 
    
                return response()->json([
                    'success' => true,
                    'message' => 'Company Updated Successfully',
                ]);

          }
          else {
            return response()->json([
                'status'=>404,
                'message'=>'Company Not Found',
            ]); 
          }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
         if($company)
         {
             $company->delete();
             return response()->json([
                'status'=>200,
                'message'=>'Company Deleted Successfully',
            ]);  
         }
         else
         {
            return response()->json([
                'status'=>404,
                'message'=>'No company ID found',
            ]);
         }
    }

}
