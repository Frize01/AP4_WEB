<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ALLERGENE
 * 
 * @property int $ID_ALLERGENE
 * @property string $LIBELLE_ALLERGENE
 * 
 * @property Collection|CONSERNER[] $c_o_n_s_e_r_n_e_r_s
 *
 * @package App\Models
 */
class ALLERGENE extends Model
{
	protected $table = 'ALLERGENE';
	protected $primaryKey = 'ID_ALLERGENE';
	public $timestamps = false;

	protected $fillable = [
		'LIBELLE_ALLERGENE'
	];

	public function c_o_n_s_e_r_n_e_r_s()
	{
		return $this->hasMany(CONSERNER::class, 'ID_ALLERGENE');
	}
}
