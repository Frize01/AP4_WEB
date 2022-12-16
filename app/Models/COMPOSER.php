<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class COMPOSER
 * 
 * @property int $ID_RESTAURANT
 * @property int $ID_RECETTE
 * @property int $ID
 * @property int $ID_COMMANDE
 * 
 * @property COMMANDE $c_o_m_m_a_n_d_e
 * @property RECETTE $r_e_c_e_t_t_e
 *
 * @package App\Models
 */
class COMPOSER extends Model
{
	protected $table = 'COMPOSER';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_RESTAURANT' => 'int',
		'ID_RECETTE' => 'int',
		'ID' => 'int',
		'ID_COMMANDE' => 'int'
	];

	public function c_o_m_m_a_n_d_e()
	{
		return $this->belongsTo(COMMANDE::class, 'ID')
					->where('COMMANDE.ID', '=', 'COMPOSER.ID')
					->where('COMMANDE.ID_COMMANDE', '=', 'COMPOSER.ID_COMMANDE');
	}

	public function r_e_c_e_t_t_e()
	{
		return $this->belongsTo(RECETTE::class, 'ID_RESTAURANT')
					->where('RECETTE.ID_RESTAURANT', '=', 'COMPOSER.ID_RESTAURANT')
					->where('RECETTE.ID_RECETTE', '=', 'COMPOSER.ID_RECETTE');
	}
}
