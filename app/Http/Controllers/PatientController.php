<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Patient;

class PatientController extends Controller
{
	protected $patientModel;
	public function __construct(Patient $patientModel)
	{
		$this->patientModel = $patientModel;
	}

	public function index(Request $request)
	{
		$patientsQuery = $this->patientModel;
		if ( $request->get('filter-field') &&  $request->get('filter-value')) {
			$field = $request->get('filter-field');
			$value = $request->get('filter-value');

			if ($field == 'age') {
				$patientsQuery = $patientsQuery->where($field, $value);
			} else {
				$patientsQuery = $patientsQuery->where($field, 'LIKE', '%'.$value.'%');
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
}
