<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\{
    Category,
    Subcategory,
    User
};

class MainController extends Controller
{
    public function index(){
        $user = User::find(6);
        dd($user->favorites);
    }
}
