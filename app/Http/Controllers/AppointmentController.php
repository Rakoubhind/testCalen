<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Appointment;
use App\Models\Agent;
use App\Models\History;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Response;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::all();
        $events = Appointment::all();
        $agents = Agent::all();

        return view('dashlite.appointment.appointment', compact('agents' ,'appointments' , 'events'));
    }
    public function getAppointment()
    {
        $events = Appointment::all();

        return view('fullcalendar')->with('events' , $events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents = Agent::all();
        $teams = Team::all();
        $users = User::all();

        return view('dashlite.appointment.addAppointment', compact('agents' , 'teams' ,'users'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $appointments = Appointment::all();
        $agents = Agent::all();
        $users = User::all();
        $teams = Team::all();
        $appointment = new Appointment();
        $appointment->firstName =$request->firstName;
        $appointment->lastName =$request->lastName;
        $appointment->phone =$request->phone;
        $appointment->phone2 =$request->phone2;
        $appointment->email =$request->email;
        $appointment->dateInstall =$request->dateInstall;
        $appointment->adress =$request->adress;
        $appointment->city =$request->city;
        $appointment->region =$request->region;
        $appointment->campagnie =$request->campagnie;
        $appointment->postalCode =$request->postalCode;
        $appointment->country =$request->country;
        $appointment->description =$request->description;
        $appointment->agent_id =1;

        $appointment->estimation =$request->estimation;
        $appointment->prospectOrigin =$request->prospectOrigin;
        $appointment->sur101 =$request->sur101;
        $appointment->mat101 =$request->mat101;
        $appointment->type101 =$request->type101;
        $appointment->access =$request->access;

        $appointment->sur101r =$request->sur101r;
        $appointment->mat101r =$request->mat101r;
        $appointment->type101r =$request->type101r;
        $appointment->accessr =$request->accessr;

        $appointment->sur102 =$request->sur102;
        $appointment->mat102 =$request->mat102;
        $appointment->type102 =$request->type102;
        $appointment->height103 =$request->height103;

        $appointment->sur103 =$request->sur103;
        $appointment->mat103 =$request->mat103;
        $appointment->type103 =$request->type103;
        $appointment->height103 =$request->height103;
        $appointment->materialProvide =$request->materialProvide;

        $appointment->taxId = $request->taxId;
        $appointment->referenceNotice = $request->referenceNotice;
        $appointment->taxIncome = $request->taxIncome;
        $appointment->taxId2 = $request->taxId2;
        $appointment->referenceNotice2 = $request->referenceNotice2;
        $appointment->taxIncome2 = $request->taxIncome2;
        $appointment->taxId3 = $request->taxId3;
        $appointment->referenceNotice3 = $request->referenceNotice3;
        $appointment->taxIncome3 = $request->taxIncome3;
        $appointment->taxId4 = $request->taxId4;
        $appointment->referenceNotice4 = $request->referenceNotice4;
        $appointment->taxIncome4 = $request->taxIncome4;
        $appointment->taxId5 = $request->taxId5;
        $appointment->referenceNotice5 = $request->referenceNotice5;
        $appointment->taxIncome5 = $request->taxIncome5;
        $appointment->nbrPerson = $request->nbrPerson;
        $appointment->overallIncome = $request->overallIncome;
        $appointment->taxCategory = $request->taxCategory;

        $appointment->user_id = $request->user_id;
        $appointment->installer = $request->installer;
        $appointment->team_id = $request->team_id;
        $appointment->dateInstallAffect = $request->dateInstallAffect;
        $appointment->statut = $request->statut;
        $appointment->productionPole = $request->productionPole;
        $appointment->save();

        $history = new History();
        $history->appointment_id=$appointment->id;
        $history->description="ajout";
        $history->save();
        if(request()->ajax())
        {
            $agenda = new Agenda();
            $agenda->appointment_id=$appointment->id;
            $agenda->save();
            return Response::json($agenda);
        }



        return redirect('/appointment')->with('appointment' , $appointment)->with('appointments' , $appointments)
        ->with('agents' , $agents)->with('users' , $users)->with('teams' , $teams);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $agent =$request->agent;
        $statut =explode(',',$request->statut);
        $pole =explode(',',$request->pole);
        $camp =explode(',',$request->camp);
        
        $datede=$request->datede;
        $deb=$request->deb;
        $fin=$request->fin;
        

        $appointments = Appointment::where('agent_id', $agent)
                                    // ->where('statut', $statut )
                                    // ->where('productionPole', $pole )
                                    // ->where('campagnie', $camp )
                                    ->get();

      
            
                
                   
        // if($deb && $fin){
            
            //     if($datede=="creation"){
                
            //         $appointments = Appointment::whereBetween('created_at', [$deb,$fin])->get();
            
            //     }elseif($datede=="installation"){
    
                //         $appointments = Appointment::whereBetween('dateInstallAffect', [$deb,$fin])->get();
                
                //     }else{
                    //         $appointments = Appointment::whereBetween('dateInstall', [$deb,$fin])->get();
        //     }
        
        // }
 
        
        return response()->json(['appointments' =>$appointments]);
    }
                
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $agents = Agent::all();
        $users = User::all();
        $teams = Team::all();
        $appointment = Appointment::findOrFail($id);
        return view('dashlite.appointment.editAppointment')->with('appointment' , $appointment)
        ->with('agents' , $agents)->with('teams' , $teams)->with('users' , $users);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->firstName =$request->firstName;
        $appointment->lastName =$request->lastName;
        $appointment->phone =$request->phone;
        $appointment->phone2 =$request->phone2;
        $appointment->email =$request->email;
        $appointment->dateInstall =$request->dateInstall;
        $appointment->adress =$request->adress;
        $appointment->city =$request->city;
        $appointment->region =$request->region;
        $appointment->campagnie =$request->campagnie;
        $appointment->postalCode =$request->postalCode;
        $appointment->country =$request->country;
        $appointment->description =$request->description;
        $appointment->agent_id =1;

        $appointment->estimation =$request->estimation;
        $appointment->prospectOrigin =$request->prospectOrigin;

        $appointment->sur101 =$request->sur101;
        $appointment->mat101 =$request->mat101;
        $appointment->type101 =$request->type101;
        $appointment->access =$request->access;

        $appointment->sur101r =$request->sur101r;
        $appointment->mat101r =$request->mat101r;
        $appointment->type101r =$request->type101r;
        $appointment->accessr =$request->accessr;

        $appointment->sur102 =$request->sur102;
        $appointment->mat102 =$request->mat102;
        $appointment->type102 =$request->type102;
        $appointment->height103 =$request->height103;

        $appointment->sur103 =$request->sur103;
        $appointment->mat103 =$request->mat103;
        $appointment->type103 =$request->type103;
        $appointment->height103 =$request->height103;
        $appointment->materialProvide =$request->materialProvide;

        $appointment->taxId = $request->taxId;
        $appointment->referenceNotice = $request->referenceNotice;
        $appointment->taxIncome = $request->taxIncome;
        $appointment->taxId2 = $request->taxId2;
        $appointment->referenceNotice2 = $request->referenceNotice2;
        $appointment->taxIncome2 = $request->taxIncome2;
        $appointment->taxId3 = $request->taxId3;
        $appointment->referenceNotice3 = $request->referenceNotice3;
        $appointment->taxIncome3 = $request->taxIncome3;
        $appointment->taxId4 = $request->taxId4;
        $appointment->referenceNotice4 = $request->referenceNotice4;
        $appointment->taxIncome4 = $request->taxIncome4;
        $appointment->taxId5 = $request->taxId5;
        $appointment->referenceNotice5 = $request->referenceNotice5;
        $appointment->taxIncome5 = $request->taxIncome5;
        $appointment->nbrPerson = $request->nbrPerson;
        $appointment->overallIncome = $request->overallIncome;
        $appointment->taxCategory = $request->taxCategory;

        $appointment->user_id = $request->user_id;
        $appointment->installer = $request->installer;
        $appointment->team_id = $request->team_id;
        $appointment->dateInstallAffect = $request->dateInstallAffect;
        $appointment->statut = $request->statut;
        $appointment->productionPole = $request->productionPole;
        $appointment->save();


        $history = new History();
        $history->appointment_id=$appointment->id;
        $history->description="modification";
        $history->save();

        return redirect('/appointment')->with('appointment' , $appointment);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $history = new History();
        $history->appointment_id=$appointment->id;
        $history->description="suppression";
        $history->save();
    }

    public function fetchteamInstaller($id)

    {
        $teams = Team::where('user_id' , $id)->get();
        // return response()->JSON(['teams'=>$teams]);
        return Response::json($teams);
    }
    // public function getAppointment()
    // {
    //     $appointments = Appointment::all();
    //     return Response::json($appointments);

    // }



}
