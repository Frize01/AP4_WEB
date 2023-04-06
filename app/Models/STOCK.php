<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class STOCK
 * 
 * @property int $ID_RESTAURANT
 * @property int $ID_INGREDIANT
 * @property int $ID_INGREDANT
 * @property int $STOCK_ING
 * 
 * @property INGREDIANT $i_n_g_r_e_d_i_a_n_t
 * @property RESTAURANT $r_e_s_t_a_u_r_a_n_t
 * @property Collection|LIVRER[] $l_i_v_r_e_r_s
 *
 * @package App\Models
 */
class STOCK extends Model
{
	protected $table = 'STOCK';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_RESTAURANT' => 'int',
		'ID_INGREDIANT' => 'int',
		'ID_INGREDANT' => 'int',
		'STOCK_ING' => 'int'
	];

	protected $fillable = [
		'ID_INGREDANT',
		'STOCK_ING'
	];

	public function i_n_g_r_e_d_i_a_n_t()
	{
		return $this->belongsTo(INGREDIANT::class, 'ID_INGREDANT');
	}

	public function r_e_s_t_a_u_r_a_n_t()
	{
		return $this->belongsTo(RESTAURANT::class, 'ID_RESTAURANT');
	}

	public function l_i_v_r_e_r_s()
	{
		return $this->hasMany(LIVRER::class, 'ID_RESTAURANT');
	}
}
