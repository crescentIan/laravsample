<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class EmployeeController extends Controller
{
    public function create(Request $request) {
        $request->validate([
            'name' => ['required'],
            'position' => ['required'],
            'email' => ['required'],
        ]);

        $emp = new Employee;
        $emp->name = $request->name;
        $emp->position = $request->position;
        $emp->email = $request->email;

        $emp->save();

        return response()->json($emp);
    }

    public function index () {
        $emps = Employee::orderBy('id', 'desc')->get();
        return response()->json($emps);
    }
    public function getEmployee($id) {
        $emp = Employee::findOrFail($id);
        return response()->json($emp);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => ['required'],
            'position' => ['required'],
            'email' => ['required'],
        ]);
        $emp = Employee::findOrFail($id);

        $emp->name = $request->name;
        $emp->position = $request->position;
        $emp->email = $request->email;

        $emp->save();

        return response()->json($emp);
    }
    
    public function delete($id) {
        $emp = Employee::findOrFail($id);
        $emp->delete();

        return response()->json($emp);
    }
}
