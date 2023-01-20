<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LIVRER
 * 
 * @property int $ID_RESTAURANT
 * @property int $ID_INGREDIANT
 * @property int $ID_LIVRAISON
 * @property int $QUANTITE
 * 
 * @property LIVRAISON $l_i_v_r_a_i_s_o_n
 * @property STOCK $s_t_o_c_k
 *
 * @package App\Models
 */
class LIVRER extends Model
{
	protected $table = 'LIVRER';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_RESTAURANT' => 'int',
		'ID_INGREDIANT' => 'int',
		'ID_LIVRAISON' => 'int',
		'QUANTITE' => 'int'
	];

	protected $fillable = [
		'QUANTITE'
	];

	public function l_i_v_r_a_i_s_o_n()
	{
		return $this->belongsTo(LIVRAISON::class, 'ID_LIVRAISON');
	}

	public function s_t_o_c_k()
	{
		return $this->belongsTo(STOCK::class, 'ID_RESTAURANT')
					->where('STOCK.ID_RESTAURANT', '=', 'LIVRER.ID_RESTAURANT')
					->where('STOCK.ID_INGREDIANT', '=', 'LIVRER.ID_INGREDIANT');
	}
}
