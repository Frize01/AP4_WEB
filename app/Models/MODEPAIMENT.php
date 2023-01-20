<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MODEPAIMENT
 * 
 * @property int $ID_MODE
 * @property string $LIBELLE_MODE
 * 
 * @property Collection|PAYER[] $p_a_y_e_r_s
 *
 * @package App\Models
 */
class MODEPAIMENT extends Model
{
	protected $table = 'MODE_PAIMENT';
	protected $primaryKey = 'ID_MODE';
	public $timestamps = false;

	protected $fillable = [
		'LIBELLE_MODE'
	];

	public function p_a_y_e_r_s()
	{
		return $this->hasMany(PAYER::class, 'ID_MODE');
	}
}
