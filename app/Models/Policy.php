<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Policy
 * 
 * @property int $id
 * @property string $series
 * @property string $number
 * @property Carbon $date_registration
 * @property Carbon $valid_to
 * @property int $policy_type_id
 * @property int $client_id
 * 
 * @property Client $client
 * @property PolicyType $policy_type
 * @property Collection|Contract[] $contracts
 *
 * @package App\Models
 */
class Policy extends Model
{
	protected $table = 'policies';
	public $timestamps = false;

	protected $casts = [
		'policy_type_id' => 'int',
		'client_id' => 'int'
	];

	protected $dates = [
		'date_registration',
		'valid_to'
	];

	protected $fillable = [
		'series',
		'number',
		'date_registration',
		'valid_to',
		'policy_type_id',
		'client_id'
	];

	public function client()
	{
		return $this->belongsTo(Client::class);
	}

	public function policy_type()
	{
		return $this->belongsTo(PolicyType::class);
	}

	public function contracts()
	{
		return $this->hasMany(Contract::class);
	}
}
