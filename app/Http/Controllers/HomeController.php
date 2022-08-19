<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $data = [];
        if (auth()->user()->userType == 2) {
            $data = DB::table('users AS u')->leftJoin('applicants AS a', 'u.id', 'a.userId')
                ->select(DB::raw('`firstName`, `lastName`, `fullname`, `email`,`address`, `address2`, `state`, `City`, `phone`'))->first();
        }
        if (auth()->user()->userType == 1) {
            $users = DB::table('applicants')->count();
            $cars = DB::table('cars')->count();
            $home = DB::table('home')->count();
            $business = DB::table('business')->count();
            $data = ['users' => $users, 'cars' => $cars, 'home' => $home, 'business' => $business];
        }
        return view('index', compact('data'));
    }
}
