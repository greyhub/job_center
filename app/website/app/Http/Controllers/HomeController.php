<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{
    public function index()
    {
        $cities = City::with('jobs')->orderBy('name', 'asc')->take(8)->get();
        $jobs = Job::with('city')->take(10)->get();
        return view('common.home', compact('cities', 'jobs'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function user()
    {
        return User::create([
            'email' => 'hungyen1101@gmail.com',//$data['email'],
            'first_name' => 'manh', //$data['first_name'],
            'last_name' => 'nguyen dinh', //$data['last_name'],
            'password' => Hash::make('Manh@123'), //Hash::make($data['password']),

        ]);
    }
}
