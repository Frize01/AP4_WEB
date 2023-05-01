<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class COMMANDE
 * 
 * @property int $ID
 * @property int $ID_COMMANDE
 * @property int $ID_TYPE_TVA
 * @property int $ID_TVA
 * @property Carbon $DATE_COMMANDE
 * @property int|null $PRIX_COMMANDE
 * @property Carbon|null $DATE_REGLEMENT_COMMANDE
 * 
 * @property TVA $t_v_a
 * @property USER $u_s_e_r
 * @property AEMPORTER $a_e_m_p_o_r_t_e_r
 * @property Collection|COMPOSER[] $c_o_m_p_o_s_e_r_s
 * @property Collection|PAYER[] $p_a_y_e_r_s
 * @property SURPLACE $s_u_r_p_l_a_c_e
 *
 * @package App\Models
 */
class COMMANDE extends Model
{
	protected $table = 'COMMANDE';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID' => 'int',
		'ID_COMMANDE' => 'int',
		'ID_TYPE_TVA' => 'int',
		'ID_TVA' => 'int',
		'PRIX_COMMANDE' => 'int'
	];

	protected $dates = [
		'DATE_COMMANDE',
		'DATE_REGLEMENT_COMMANDE'
	];

	protected $fillable = [
		'ID_TYPE_TVA',
		'ID_COMMANDE',
		'ID_TVA',
		'DATE_COMMANDE',
		'PRIX_COMMANDE',
		'DATE_REGLEMENT_COMMANDE'
	];

	public function t_v_a()
	{
		return $this->belongsTo(TVA::class, 'ID_TYPE_TVA')
					->where('TVA.ID_TYPE_TVA', '=', 'COMMANDE.ID_TYPE_TVA')
					->where('TVA.ID_TVA', '=', 'COMMANDE.ID_TVA');
	}

	public function u_s_e_r()
	{
		return $this->belongsTo(USER::class, 'ID');
	}

	public function a_e_m_p_o_r_t_e_r()
	{
		return $this->hasOne(AEMPORTER::class, 'ID');
	}

	public function c_o_m_p_o_s_e_r_s()
	{
		return $this->hasMany(COMPOSER::class, 'ID');
	}

	public function p_a_y_e_r_s()
	{
		return $this->hasMany(PAYER::class, 'ID');
	}

	public function s_u_r_p_l_a_c_e()
	{
		return $this->hasOne(SURPLACE::class, 'ID_1');
	}
}
