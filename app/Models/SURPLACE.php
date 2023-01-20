<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SURPLACE
 * 
 * @property int $ID_1
 * @property int $ID_COMMANDE
 * @property int $ID_TABLE
 * @property int $ID_RESTAURANT
 * @property int $ID
 * @property Carbon|null $DATE_FIN_COMMANDE
 * @property Carbon $DATE_DEBUT_COMMANDE
 * 
 * @property COMMANDE $c_o_m_m_a_n_d_e
 * @property SERVEUR $s_e_r_v_e_u_r
 * @property TABLECLIENT $t_a_b_l_e_c_l_i_e_n_t
 *
 * @package App\Models
 */
class SURPLACE extends Model
{
	protected $table = 'SUR_PLACE';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_1' => 'int',
		'ID_COMMANDE' => 'int',
		'ID_TABLE' => 'int',
		'ID_RESTAURANT' => 'int',
		'ID' => 'int'
	];

	protected $dates = [
		'DATE_FIN_COMMANDE',
		'DATE_DEBUT_COMMANDE'
	];

	protected $fillable = [
		'ID_TABLE',
		'ID_RESTAURANT',
		'ID',
		'DATE_FIN_COMMANDE',
		'DATE_DEBUT_COMMANDE'
	];

	public function c_o_m_m_a_n_d_e()
	{
		return $this->belongsTo(COMMANDE::class, 'ID_1')
					->where('COMMANDE.ID', '=', 'SUR_PLACE.ID_1')
					->where('COMMANDE.ID_COMMANDE', '=', 'SUR_PLACE.ID_COMMANDE');
	}

	public function s_e_r_v_e_u_r()
	{
		return $this->belongsTo(SERVEUR::class, 'ID');
	}

	public function t_a_b_l_e_c_l_i_e_n_t()
	{
		return $this->belongsTo(TABLECLIENT::class, 'ID_RESTAURANT')
					->where('TABLE_CLIENTS.ID_RESTAURANT', '=', 'SUR_PLACE.ID_RESTAURANT')
					->where('TABLE_CLIENTS.ID_TABLE', '=', 'SUR_PLACE.ID_TABLE');
	}
}
