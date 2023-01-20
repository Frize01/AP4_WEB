<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CONSERNER
 * 
 * @property int $ID_RESTAURANT
 * @property int $ID_INGREDIANT
 * @property int $ID_ALLERGENE
 * 
 * @property ALLERGENE $a_l_l_e_r_g_e_n_e
 * @property STOCK $s_t_o_c_k
 *
 * @package App\Models
 */
class CONSERNER extends Model
{
	protected $table = 'CONSERNER';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_RESTAURANT' => 'int',
		'ID_INGREDIANT' => 'int',
		'ID_ALLERGENE' => 'int'
	];

	public function a_l_l_e_r_g_e_n_e()
	{
		return $this->belongsTo(ALLERGENE::class, 'ID_ALLERGENE');
	}

	public function s_t_o_c_k()
	{
		return $this->belongsTo(STOCK::class, 'ID_RESTAURANT')
					->where('STOCK.ID_RESTAURANT', '=', 'CONSERNER.ID_RESTAURANT')
					->where('STOCK.ID_INGREDIANT', '=', 'CONSERNER.ID_INGREDIANT');
	}
}
