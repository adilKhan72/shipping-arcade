<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function compareCompanies()
    {
        return view('compare_company');
    }

    public function registerCompany()
    {
        return view('register_company');
    }
    public function About()
    {
        return view('about');
    }
    public function Blog()
    {
        return view('blog');
    }
    public function Contact()
    {
        return view('contact');
    }
    public function Industries()
    {
        return view('industries');
    }
    public function Services()
    {
        return view('services');
    }
}
