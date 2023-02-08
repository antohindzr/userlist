<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class ListController extends Controller
{
    public function list() {
        return response()->json(User::get(), 200);
    }
}
