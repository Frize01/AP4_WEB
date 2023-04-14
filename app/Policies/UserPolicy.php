<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CLIENT;
use App\Models\SERVEUR;

use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function view(User $user)
    {
        // Vérifier si l'utilisateur est un client
        $client = CLIENT::where('user_id', $user->id)->first();

        // Retourner vrai si l'utilisateur est soit un client, soit un serveur
        return $client;
    }
}
