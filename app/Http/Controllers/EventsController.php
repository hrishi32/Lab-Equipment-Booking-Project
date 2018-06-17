<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Validator;
use App\Events;
use App\User;
use Auth;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('events.calendar');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'title' => 'required',
            'eventDate' => 'required',  
        ]);

        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()->all()]);
            // \Session::flash('Warning!', 'Please enter the valid details.');
            // return Redirect::to('/events')->withInput()->withErrors($validator);
        }

        $event = new Events;
        $event->title = $request['title'];
        $event->eventDate = $request['eventDate'];
        $event->startTime=$request['startTime'].':00';
        // $event->endTime=$request['endTime'].':00';
        $duration = $request['duration'];
        // echo $duration.' ';
        // echo $event->startTime.' ';
        // echo strtotime($event->startTime).' ';
        // echo date('h:i:s', strtotime($event->startTime)).' ';

        $event->endTime = date('h:i:s', strtotime('+'.$duration.' min', strtotime($event->startTime)));
        // echo date('Y-m-d', strtotime($request['eventDate']));
        if($event->startTime > $event->endTime){
            $event->endDate = date('Y-m-d', strtotime('+1 day', strtotime($request['eventDate'])));
        }
        else{
            $event->endDate = $request['eventDate'];
        }
        // echo $event->endTime;
        $event->pid = $request['pid'];
        // $event->resourceId = $request['tl_id'];
        $event->tl_id = $request['tl_id'];
        
        $check = Events::
                  where ([
                      ['tl_id','=',$event->tl_id],
                      ['eventDate', $event->eventDate],
                      ])
                ->where(function($query) use ($event){
                    $query
                    ->whereBetween ('startTime', [$event->startTime, $event->endTime])
                    ->orwhereBetween ('endTime', [$event->startTime, $event->endTime]);
                })
                // ->where ('')
                // ->get()
                ->doesntExist()
                ;
        // echo $check;
        if($check){
            $event->save();
            \Session::flash('Success','Event Added successfuly.');
            echo $event;
            $msg = 'Event Added successfuly.';
        }
        else{
            $msg =  "Chosen slot is not available.Please choose another timing.";
            echo $msg;
        }

        response()->json(['success'=>'Data is successfully added']);
        // echo "<script>window.close();</script>";
        // return Redirect('events');
        return Redirect('events')->with('status', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Events::where('id',$id)->get();
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function edit(Events $events)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Events $events)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function destroy(Events $events)
    {
        //
    }

    public function getEvent(){
        $allevents=DB::table('events')->get();
        $events=array();
        foreach ($allevents as $eve){
            // $e=array();
            $e['id']=$eve->id;
            $username = User::where('id','=',$eve->pid)->value('name');
            $e['title']=$username;
            $e['start']=$eve->eventDate
            .' '.$eve->startTime;
            $e['end']=$eve->endDate.' '.$eve->endTime;
            $e['resourceId']=$eve->tl_id;
            // $e['color'] = $eve->color;
            array_push($events, $e);
        }
        return ($events);
    }

    public function userEvent(){
            $events = DB::table('events')
                            ->where('pid','=',Auth::user()->id)
                            ->get();
            return ($events);
    }
}
