<?php

namespace App\Http\Controllers;
use App\Models\Report;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReportController extends Controller
{
    public function index()
    {
        return view('pages.uap-reportings');
    }
    public function create(){
        $data['form'] = fake();
        return view('pages.uap-reporting',['data' => $data]);
    }
    public function store(Request $request){

        $faker = fake();
        $request->street = $faker->streetAddress();
        $request->number = $faker->buildingNumber();
        $request->complement = $faker->secondaryAddress();
        $request->district = $faker->citySuffix();
        $request->city = $faker->city();
        $request->state = $faker->stateAbbr();
        $request->zipcode = $faker->postcode();
        $request->country = 'BR';
        
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'sighting' => 'required',
            'description' => 'required'
            // 'street' => 'required',
            // 'city' => 'required',
            // 'state' => 'required',
            // 'zipcode' => 'required',
            // 'country' => 'required'
        ];
        $messages = [
            'required' => 'Preenchimento obrigatório.',
            'email' => 'Por favor, informe um e-mail válido.'
            //'required' => 'Preencha o campo :attribute',,
            // 'email.email' => 'O campo email deve ser um email válido',
            // 'street.required' => 'O campo rua é obrigatório',
            // 'city.required' => 'O campo cidade é obrigatório',
            // 'state.required' => 'O campo estado é obrigatório',
            // 'zipcode.required' => 'O campo CEP é obrigatório',
            // 'country.required' => 'O campo país é obrigatório'
        ];
        $request->validate($rules,$messages);

        $report = new Report;
        $report->name = $request->name;
        $report->email = $request->email;
        $report->sighting = $request->sighting;

        $report->street = $request->street; 
        $report->number = $request->number;
        $report->complement = $request->complement;
        $report->district = $request->district;
        $report->city = $request->city;
        $report->state = $request->state;
        $report->zipcode = $request->zipcode;
        $report->country = $request->country;
        $report->latitude = $request->latitude;
        $report->longitude = $request->longitude;
        $report->visitor = request()->ip();

        $report->subject = $request->city.' - '.$request->state.' - '.$request->country.' - '.str_replace('T',"-",$request->sighting).' - '.$request->name;
        $report->slug = Str::slug($report->subject, '-');
        $report->description = $request->description;

        if (auth()->check()) {
            $user = auth()->user();
            $report->user_id = $user->id;
        }else{
            $report->user_id = 1;
        }

        $report->save();
        return redirect('/uap-reportings')->with('success','Relato salvo com sucesso!');
    }
}