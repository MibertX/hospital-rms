<?php
namespace App\Http\Controllers;
use App\Department;
use App\Http\Requests\CreateDepartmentRequest;

class DepartmentController extends Controller
{
	protected $departmentModel;

	public function __construct(Department $departmentModel)
	{
		$this->departmentModel = $departmentModel;
	}


    public function index()
	{
		$departments = Department::all()->sortBy('name');
		return view('departments.index', compact('departments'));
	}


	public function create()
	{
		return view('departments.create');
	}


	public function store(CreateDepartmentRequest $request)
	{
		try{
			$department = Department::create($request->all());
			flash()->success(__('Department "' . $department->name . '" created!' ));
		} catch (\Exception $e) {
			flash()->error(__('Could not create new department!'));
		}

		return redirect()->route('departments.all');
	}


	public function edit(Department $department)
	{
		return view('departments.edit', ['department' => $department]);
	}

	public function update(Department $department, CreateDepartmentRequest $request)
	{
		try{
			$department->update($request->all());
			flash()->success(__('Department "' . $department->name . '" updated!' ));
		} catch (\Exception $e) {
			flash()->error(__('Could not edit the department!'));
		}

		return redirect()->route('departments.all');
	}

	public function destroy(Department $department)
	{
		try{
			$department->delete();
			flash()->success(__('Department "' . $department->name . '" deleted!' ));
		} catch (\Exception $e) {
			flash()->error(__('Could not deleete the department!'));
		}

		return redirect()->route('departments.all');
	}
}
