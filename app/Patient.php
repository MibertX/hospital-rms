<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelWithUserData;

class Patient extends Model
{
	use ModelWithUserData;
}
