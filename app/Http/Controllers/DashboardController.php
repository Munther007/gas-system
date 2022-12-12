<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $cars = Car::all();

        if($cars->number_type == 'خصوصي 1') {
            $count = Car::all()->count();
            dd($count);
        }

    }
}
