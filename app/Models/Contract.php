<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Contract
 * 
 * @property int $id
 * @property float $sum
 * @property Carbon $date_registration
 * @property int $policy_id
 * 
 * @property Policy $policy
 *
 * @package App\Models
 */
class Contract extends Model
{
	protected $table = 'contracts';
	public $timestamps = false;

	protected $casts = [
		'sum' => 'float',
		'policy_id' => 'int'
	];

	protected $dates = [
		'date_registration'
	];

	protected $fillable = [
		'sum',
		'date_registration',
		'policy_id'
	];

	public function policy()
	{
		return $this->belongsTo(Policy::class);
	}
}
