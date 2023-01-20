<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class STAFF
 * 
 * @property int $ID
 * @property int|null $ID_RESTAURANT
 * 
 * @property RESTAURANT|null $r_e_s_t_a_u_r_a_n_t
 * @property USER $u_s_e_r
 *
 * @package App\Models
 */
class STAFF extends Model
{
	protected $table = 'STAFF';
	protected $primaryKey = 'ID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID' => 'int',
		'ID_RESTAURANT' => 'int'
	];

	protected $fillable = [
		'ID_RESTAURANT'
	];

	public function r_e_s_t_a_u_r_a_n_t()
	{
		return $this->belongsTo(RESTAURANT::class, 'ID_RESTAURANT');
	}

	public function u_s_e_r()
	{
		return $this->belongsTo(USER::class, 'ID');
	}
}
