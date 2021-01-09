<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Evento que me regresa todos los empleados
     */
    public function all()
    {
        $employees = Employee::all();

        return view('employees', compact('employees'));
    }

    public function employeeCreateForm()
    {
        return view('form');
    }

    public function create(Request $request)
    {
        $rules = [
            'code' => ['unique:employees'], // El código lo tomo como valor único por cada usuario que se dé de alta
            'name' => ['regex:/(^([a-zA-Z\s_-]+)$)/u'],
            'paternal_surname' => ['regex:/(^([a-zA-ZÁ-ÿ\s_-]+)$)/u'],
            'maternal_surname' => ['regex:/(^([a-zA-Z\s_-]+)$)/u'],
            'email' => ['email']
        ];

        $messages = [
            'code.unique' => 'El código debe ser único.',
            'name.regex' => 'El nombre no debe inlcuir números y solo son guiones.',
            'paternal_surname.regex' => 'El apellido paterno no debe inlcuir números y solo son guiones.',
            'maternal_surname.regex' => 'El apellido materno no debe inlcuir números y solo son guiones.',
            'email.email' => 'El correo no cumple con el formato usuario@dominio'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
        }

        $input = $request->all();

        $employee = new Employee();
        $employee->code = $input['code'];
        $employee->name = $input['name'];
        $employee->paternal_surname = $input['paternal_surname'];
        $employee->maternal_surname = $input['maternal_surname'];
        $employee->email = $input['email'];
        $employee->contract_type = $input['contract_type'];
        $employee->save();

        return redirect()->route('employee.all');
    }

    public function detail($id)
    {
        $employee = Employee::where('id', $id)->first();
        return view('detail', compact('employee'));
    }


    public function employeeEditForm($id)
    {
        $employee = Employee::where('id', $id)->first();
        return view('editform', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'code' => ['unique:employees'], // El código lo tomo como valor único por cada usuario que se dé de alta
            'name' => ['regex:/(^([a-zA-Z\s_-]+)$)/u'],
            'paternal_surname' => ['regex:/(^([a-zA-ZÁ-ÿ\s_-]+)$)/u'],
            'maternal_surname' => ['regex:/(^([a-zA-Z\s_-]+)$)/u'],
            'email' => ['email']
        ];

        $messages = [
            'code.unique' => 'El código debe ser único.',
            'name.regex' => 'El nombre no debe inlcuir números y solo son guiones.',
            'paternal_surname.regex' => 'El apellido paterno no debe inlcuir números y solo son guiones.',
            'maternal_surname.regex' => 'El apellido materno no debe inlcuir números y solo son guiones.',
            'email.email' => 'El correo no cumple con el formato usuario@dominio'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
        }

        $input = $request->all();

        $employee = Employee::where('id', $id)->first();
        $employee->name = $input['name'];
        $employee->paternal_surname = $input['paternal_surname'];
        $employee->maternal_surname = $input['maternal_surname'];
        $employee->email = $input['email'];
        $employee->contract_type = $input['contract_type'];
        $employee->save();

        return redirect()->route('employee.all');
    }

    public function changeState($id)
    {
        $employee = Employee::where('id', $id)->first();

        if ($employee->state == 'Activo') { // Si el estado del empleado esta activo, lo desactivo y regreso al listado de los empleados
            $employee->state = 'Inactivo';
            $employee->save();
            return redirect()->route('employee.all');
        }
        if ($employee->state == 'Inactivo') { // Si el estado del empleado esta inactivo, lo activo y regreso al listado de los empleados
            $employee->state = 'Activo';
            $employee->save();
            return redirect()->route('employee.all');
        }
    }

    public function delete($id)
    {
        // La eliminación lógica se ejecuta normal, en el modelo employee agrego SoftDeletes y en la migrsación igual
        $employee = Employee::where('id', $id)->first();
        if (!is_null($employee)) {
            $employee->delete();
        }
        return redirect()->route('employee.all');
    }
}
