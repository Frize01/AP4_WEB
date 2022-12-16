<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PAYER
 * 
 * @property int $ID
 * @property int $ID_COMMANDE
 * @property int $ID_MODE
 * @property int $QUANTITER_PAIMENT
 * 
 * @property COMMANDE $c_o_m_m_a_n_d_e
 * @property MODEPAIMENT $m_o_d_e_p_a_i_m_e_n_t
 *
 * @package App\Models
 */
class PAYER extends Model
{
	protected $table = 'PAYER';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID' => 'int',
		'ID_COMMANDE' => 'int',
		'ID_MODE' => 'int',
		'QUANTITER_PAIMENT' => 'int'
	];

	protected $fillable = [
		'QUANTITER_PAIMENT'
	];

	public function c_o_m_m_a_n_d_e()
	{
		return $this->belongsTo(COMMANDE::class, 'ID')
					->where('COMMANDE.ID', '=', 'PAYER.ID')
					->where('COMMANDE.ID_COMMANDE', '=', 'PAYER.ID_COMMANDE');
	}

	public function m_o_d_e_p_a_i_m_e_n_t()
	{
		return $this->belongsTo(MODEPAIMENT::class, 'ID_MODE');
	}
}
