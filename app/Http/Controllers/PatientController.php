<?php
namespace App\Http\Controllers;
use App\Enums\PatientStatus;
use App\Http\Requests\CreatePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use Illuminate\Http\Request;
use App\Patient;
use App\Enums\GenderEnum;
use App\User;

class PatientController extends Controller
{
	protected $patientModel;
	protected $userModel;

	public function __construct(Patient $patientModel, User $userModel)
	{
		$this->patientModel = $patientModel;
		$this->userModel = $userModel;
	}

	public function index(Request $request)
	{
		$patientsQuery = $this->patientModel;
		if ($request->get('filter-field') &&  $request->get('filter-value')) {
			$field = $request->get('filter-field');
			$value = $request->get('filter-value');

			if ($field == 'age') {
				$patientsQuery = $patientsQuery->whereHas('user', function ($q) use ($value) {
					$q->where('age', $value);
				});
			} else {
				$patientsQuery = $patientsQuery->whereHas('user', function ($q) use ($value, $field) {
					$q->where($field, 'LIKE', '%'.$value.'%');
				});
			}
		}

		$patients = $patientsQuery->paginate($this->itemsPerPage);

		if ($request->ajax()) {
			return response()->json([
				'view' => view('patients._list', ['patients' => $patients])->render()
			], 200);
		}

		$filterFields = [
			'email' => __('Email'), 'name' => __('Name'),
			'phone' => __('Phone'), 'address' => __('Address'), 'age' => __('Age')
		];

		return view('patients.index', compact('patients', 'filterFields'));
	}


	public function show(Patient $patient)
	{
		return view('patients.show', [
			'patient' => $patient,
			'statuses' => PatientStatus::choices()
		]);
	}


	public function create()
	{
		return view('patients.create', [
			'genders' => GenderEnum::choices()
		]);
	}


	public function store(CreatePatientRequest $request)
	{
		try{
			$userData = $request->only('user')['user'];
			$userData['is_registered'] = false;
			$user = $this->userModel->create($userData);

			$patientData = $request->except(['_token', 'user']);
			$patientData['user_id'] = $user->id;
			$this->patientModel->create($patientData);
			flash()->success(__('Patient "' . $user->name . '" created!' ));
		} catch (\Exception $e) {
			flash()->error(__('Could not create new patient!'));
		}

		return redirect()->route('patients.all');
	}


	public function edit(Patient $patient)
	{
		return view('patients.edit', [
			'patient' => $patient,
			'genders' => GenderEnum::choices()
		]);
	}


	public function update(UpdatePatientRequest $request, Patient $patient)
	{
		try {
			$patient->user()->update($request->only('user')['user']);
			$patient->update($request->except(['_token', 'user']));
			flash()->success(__('Patient "' . $patient->name . '" edited!' ));
		} catch (\Exception $e) {
			flash()->error(__('Could not edit patient!'));
		}

		return redirect()->route('patients.all');
	}


	public function destroy(Patient $patient)
	{
		try{
			$patientName = $patient->name;
			$patient->user()->delete();
			$patient->delete();
			flash()->success(__('Patient "' . $patientName . '" deleted!' ));
		} catch (\Exception $e) {
			flash()->error(__('Could not deleete the patient!'));
		}

		return redirect()->route('patients.all');
	}


	public function updateStatus(Request $request, Patient $patient)
	{
		try{
			$newStatus = $request->get('status');
			if ($patient->status->value() != $newStatus) {
				$patient->status = $newStatus;
				$patient->save();
				flash()->success(__('Status changed to "' . $patient->status . '"'));
			}
		} catch (\Exception $e) {
			flash()->error(__('Could not change the status'));
		}

		return redirect(route('patients.show', $patient));
	}
}
