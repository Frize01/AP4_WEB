<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CONSERNER
 * 
 * @property int $ID_INGREDIANT
 * @property int $ID_ALLERGENE
 * 
 * @property INGREDIANT $i_n_g_r_e_d_i_a_n_t
 * @property ALLERGENE $a_l_l_e_r_g_e_n_e
 *
 * @package App\Models
 */
class CONSERNER extends Model
{
	protected $table = 'CONSERNER';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_INGREDIANT' => 'int',
		'ID_ALLERGENE' => 'int'
	];

	public function i_n_g_r_e_d_i_a_n_t()
	{
		return $this->belongsTo(INGREDIANT::class, 'ID_INGREDIANT');
	}

	public function a_l_l_e_r_g_e_n_e()
	{
		return $this->belongsTo(ALLERGENE::class, 'ID_ALLERGENE');
	}
}
