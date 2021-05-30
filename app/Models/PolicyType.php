<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PolicyType
 * 
 * @property int $id
 * @property string $name
 * @property float $price
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Policy[] $policies
 *
 * @package App\Models
 */
class PolicyType extends Model
{
	protected $table = 'policy_types';

	protected $casts = [
		'price' => 'float'
	];

	protected $fillable = [
		'name',
		'price'
	];

	public function policies()
	{
		return $this->hasMany(Policy::class);
	}
}
