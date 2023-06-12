<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::select(
            "employees.id",
            "employees.firstName",
            "employees.lastName",
            "employees.email",
            "employees.phone",
            
            "companies.name as company_name"
        )
        ->leftJoin("companies", "companies.id", "=", "employees.company_id")
        ->paginate(10);
        return response()->json([
            'status'=>200,
            'employees'=>$employees
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
    public function store(EmployeeRequest $request)
    {
        $validated = $request->validated();

            Employee::create($validated); 

            return response()->json([
                'success' => true,
                'message' => 'Employee Created Successfully',
            ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        if($employee)
        {
            return response()->json([
                'status'=>200,
                'product'=>$employee,
            ]);   
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No employee Found',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {
        $validated = $request->validated();

        $employee = Employee::find($id);
        if($employee) {
        
                $employee->update($validated); 
    
                return response()->json([
                    'success' => true,
                    'message' => 'Employee Updated Successfully',
                ]);

          }
          else {
            return response()->json([
                'status'=>404,
                'message'=>'Employee Not Found',
            ]); 
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
