<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CONTENIR
 * 
 * @property int $ID_RESTAURANT
 * @property int $ID_RECETTE
 * @property int $ID_RESTAURANT_1
 * @property int $ID_INGREDIANT
 * 
 * @property RECETTE $r_e_c_e_t_t_e
 * @property STOCK $s_t_o_c_k
 *
 * @package App\Models
 */
class CONTENIR extends Model
{
	protected $table = 'CONTENIR';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_RESTAURANT' => 'int',
		'ID_RECETTE' => 'int',
		'ID_RESTAURANT_1' => 'int',
		'ID_INGREDIANT' => 'int'
	];

	public function r_e_c_e_t_t_e()
	{
		return $this->belongsTo(RECETTE::class, 'ID_RESTAURANT')
					->where('RECETTE.ID_RESTAURANT', '=', 'CONTENIR.ID_RESTAURANT')
					->where('RECETTE.ID_RECETTE', '=', 'CONTENIR.ID_RECETTE');
	}

	public function s_t_o_c_k()
	{
		return $this->belongsTo(STOCK::class, 'ID_RESTAURANT_1')
					->where('STOCK.ID_RESTAURANT', '=', 'CONTENIR.ID_RESTAURANT_1')
					->where('STOCK.ID_INGREDIANT', '=', 'CONTENIR.ID_INGREDIANT');
	}
}
