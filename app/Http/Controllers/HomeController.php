<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Company;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use SKAgarwal\GoogleApi\PlacesApi;

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
    public function compareCompaniesSubmit(request $request)
    {        
    
        $validatedData = $request->validate([
        'country_id_to' => 'required',
        'city_id_to' => 'required',
        'country_id_from' => 'required',
        'city_id_from' => 'required'
    ]);
        $requestdata = $request->all();
        
        $results = Company::with(['country','city','lead_city','lead_country'])
                    ->where('leads_from_countries_ids', $request->country_id_to)
                    ->Where('leads_from_cities_ids', $request->city_id_to)
                    ->orWhere(function($query) use ($requestdata) {
                        $query->where('leads_from_countries_ids', $requestdata['country_id_from'])
                              ->where('leads_from_cities_ids', $requestdata['city_id_from']);
                    })
                    ->get();
        //dd($results);

        // $googlePlaces = new PlacesApi('AIzaSyC2L2ziPq3bpkrXLraeWU1xZJxqrLJ30mQ');
        // $response = $googlePlaces->placeDetails('ChIJp2QxV_sJVFMR1DEp1x_16F8');
       // dd($response);

        return view('compare_company_submit',["results" => $results]);
        //return redirect()->route('redirect_com_cmpr');
    }
    public function reviews(request $request){
        //dd($request->all());
        $googlePlaces = new PlacesApi('AIzaSyC2L2ziPq3bpkrXLraeWU1xZJxqrLJ30mQ');
        $response = $googlePlaces->placeDetails($request->place_id);
        //dd($response);
        return $response;
    }

    public function redirectComCmpr()
    {
        return view('compare_company_submit');
    }





    public function registerCompany()
    {
        return view('register_company');
    }

    public function registerCompaniesSubmit(request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'required',
            'number' => 'required',
            'email' => 'required|email',
            'job' => 'required',
            'company_name' => 'required',
            'address' => 'required',
            'city_id' => 'required',
            'country_id' => 'required',
            'leads_from_cities_ids' => 'required',
            'leads_from_countries_ids' => 'required',
            'postal_code' => 'required',
            'website' => 'required',
            'google_place_id_from_api' => 'required'
        ]);
        //dd($request->all());
        try {
        $checkif = DB::table('users')->where('email', '=', $request->email)->first();
        if ($checkif === null) {
            $id = DB::table('users')->insertGetId(
                ['name' => $request->name, 'email' => $request->email, 'jobtitle' => $request->job, 'phone' => $request->number]
            );
         }else{
            $id = $checkif->id;
         }
        

        DB::table('companies')->insert(
            ['user_id' => $id,'company_name' => $request->company_name,'place_id' => $request->google_place_id_from_api, 'address' => $request->address, 'city_id' => $request->city_id, 'country_id' => $request->country_id, 'leads_from_cities_ids' => $request->leads_from_cities_ids, 'leads_from_countries_ids' => $request->leads_from_countries_ids, 'postal_code' => $request->postal_code, 'website' => $request->website]
        );
        return redirect()->route('redirect_com_reg');
    } catch(\Illuminate\Database\QueryException $ex){ 
        echo $ex->getMessage();
    }
        
    }

    public function redirectComReg()
    {
         return view('register_company_submit');
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
