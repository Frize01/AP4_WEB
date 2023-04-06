<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModePaiement;

class payementController extends Controller
{
    function payement()
    {
        return view("payement");
    }
}
