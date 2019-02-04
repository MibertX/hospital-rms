<?php
namespace App\Http\Controllers;
use App\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
	protected $doctorModel;
	public function __construct(Doctor $doctorModel)
	{
		$this->doctorModel= $doctorModel;
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
}
