<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AEMPORTER
 * 
 * @property int $ID
 * @property int $ID_COMMANDE
 * @property string $DESCRIPTION_COMMANDE
 * @property bool $RECUPERER
 * @property string|null $HEURE_RECUP_COMMANDE
 * 
 * @property COMMANDE $c_o_m_m_a_n_d_e
 *
 * @package App\Models
 */
class AEMPORTER extends Model
{
	protected $table = 'A_EMPORTER';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID' => 'int',
		'ID_COMMANDE' => 'int',
		'RECUPERER' => 'bool'
	];

	protected $fillable = [
		'DESCRIPTION_COMMANDE',
		'RECUPERER',
		'HEURE_RECUP_COMMANDE'
	];

	public function c_o_m_m_a_n_d_e()
	{
		return $this->belongsTo(COMMANDE::class, 'ID')
					->where('COMMANDE.ID', '=', 'A_EMPORTER.ID')
					->where('COMMANDE.ID_COMMANDE', '=', 'A_EMPORTER.ID_COMMANDE');
	}
}
