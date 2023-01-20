<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CATEGORIE
 * 
 * @property int $ID_CATEGORIE
 * @property string $LIBELLE_CATEGORIE
 * 
 * @property Collection|RECETTE[] $r_e_c_e_t_t_e_s
 *
 * @package App\Models
 */
class CATEGORIE extends Model
{
	protected $table = 'CATEGORIE';
	protected $primaryKey = 'ID_CATEGORIE';
	public $timestamps = false;

	protected $fillable = [
		'LIBELLE_CATEGORIE'
	];

	public function r_e_c_e_t_t_e_s()
	{
		return $this->hasMany(RECETTE::class, 'ID_CATEGORIE');
	}
}
