<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Client
 * 
 * @property int $id
 * @property string $fio
 * @property int $age
 * @property string $passport_number
 * @property string $contact_data
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Policy[] $policies
 *
 * @package App\Models
 */
class Client extends Model
{
	protected $table = 'clients';

	protected $casts = [
		'age' => 'int'
	];

	protected $fillable = [
		'fio',
		'age',
		'passport_number',
		'contact_data'
	];

	public function policies()
	{
		return $this->hasMany(Policy::class);
	}
}
