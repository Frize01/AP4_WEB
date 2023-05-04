<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TVA
 * 
 * @property int $ID_TYPE_TVA
 * @property int $ID_TVA
 * @property int $POURCENTAGE_TVA
 * @property Carbon $DATE_INSERTION
 * 
 * @property TYPETVA $t_y_p_e_t_v_a
 * @property Collection|COMMANDE[] $c_o_m_m_a_n_d_e_s
 *
 * @package App\Models
 */
class TVA extends Model
{
	protected $table = 'TVA';
	public $incrementing = false;
	public $timestamps = false;
	public $primaryKey = 'ID_TVA';

	protected $casts = [
		'ID_TYPE_TVA' => 'int',
		'ID_TVA' => 'int',
		'POURCENTAGE_TVA' => 'int'
	];

	protected $dates = [
		'DATE_INSERTION'
	];

	protected $fillable = [
		'POURCENTAGE_TVA',
		'DATE_INSERTION'
	];

	public function t_y_p_e_t_v_a()
	{
		return $this->belongsTo(TYPETVA::class, 'ID_TYPE_TVA');
	}

	public function c_o_m_m_a_n_d_e_s()
	{
		return $this->hasMany(COMMANDE::class, 'ID_TYPE_TVA');
	}
}
