<?php
namespace App\Http\Controllers;
use App\Department;
use App\Doctor;
use App\Enums\DoctorStatus;
use App\Enums\GenderEnum;
use App\Http\Requests\CreateDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
	protected $doctorModel;
	protected $departmentModel;
	protected $userModel;

	public function __construct(Doctor $doctorModel, Department $departmentModel, User $userModel)
	{
		$this->doctorModel= $doctorModel;
		$this->departmentModel = $departmentModel;
		$this->userModel = $userModel;
	}

	public function index(Request $request)
	{
		$doctorsQuery = $this->doctorModel;
		if ( $request->get('filter-field') && $request->get('filter-value')) {
			$field = $request->get('filter-field');
			$value = $request->get('filter-value');

			if ($field == 'age') {
				$doctorsQuery = $doctorsQuery->whereHas('user', function ($q) use ($value) {
					$q->where('age', $value);
				});
			} else {
				$doctorsQuery = $doctorsQuery->whereHas('user', function ($q) use ($value, $field) {
					$q->where($field, 'LIKE', '%'.$value.'%');
				});
			}
		}

		$doctors = $doctorsQuery->paginate($this->itemsPerPage);

		if ($request->ajax()) {
			return response()->json([
				'view' => view('doctors._list', ['doctors' => $doctors])->render()
			], 200);
		}

		$filterFields = [
			'email' => __('Email'), 'name' => __('Name'),
			'phone' => __('Phone'), 'address' => __('Address'), 'age' => __('Age')
		];

		return view('doctors.index', compact('doctors', 'filterFields'));
	}


	public function show(Doctor $doctor)
	{
		return view('doctors.show', [
			'doctor' => $doctor,
			'statuses' => DoctorStatus::choices()
		]);
	}


	public function create()
	{
		return view('doctors.create', [
			'genders' => GenderEnum::choices(),
			'departments' => $this->departmentModel->all()
		]);
	}


	public function store(CreateDoctorRequest $request)
	{
		try{
			$userData = $request->only('user')['user'];
			$userData['is_registered'] = false;
			$user = $this->userModel->create($userData);

			$doctorData = $request->except(['_token', 'user']);
			$doctorData['user_id'] = $user->id;
			$this->doctorModel->create($doctorData);
			flash()->success(__('Doctor "' . $user->name . '" created!' ));
		} catch (\Exception $e) {
			flash()->error(__('Could not create new doctor!'));
		}

		return redirect()->route('doctors.all');
	}


	public function edit(Doctor $doctor)
	{
		return view('doctors.edit', [
			'doctor' => $doctor,
			'genders' => GenderEnum::choices(),
			'departments' => $this->departmentModel->all()
		]);
	}


	public function update(UpdateDoctorRequest $request, Doctor $doctor)
	{
		try {
			$doctor->user()->update($request->only('user')['user']);
			$doctor->update($request->except(['_token', 'user']));
			flash()->success(__('Doctor "' . $doctor->name . '" edited!' ));
		} catch (\Exception $e) {
			flash()->error(__('Could not edit new doctor!'));
		}

		return redirect()->route('doctors.all');
	}


	public function destroy(Doctor $doctor)
	{
		try{
			$doctorName = $doctor->name;
			$doctor->user()->delete();
			$doctor->delete();
			flash()->success(__('Doctor "' . $doctorName . '" deleted!' ));
		} catch (\Exception $e) {
			flash()->error(__('Could not deleete the department!'));
		}

		return redirect()->route('doctors.all');
	}


	public function updateStatus(Request $request, Doctor $doctor)
	{
		try{
			$newStatus = $request->get('status');
			if ($doctor->status->value() != $newStatus) {
				$doctor->status = $newStatus;
				$doctor->save();
				flash()->success(__('Status changed to "' . $doctor->status . '"'));
			}
		} catch (\Exception $e) {
			flash()->error(__('Could not change the status'));
		}

		return redirect(route('doctors.show', $doctor));
	}
}
