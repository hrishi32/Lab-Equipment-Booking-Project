<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tools;
use Illuminate\Support\Facades\DB;

class ToolsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin',['only'=>['create','store',]]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Tools::get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tools.addEquip');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tools = Tools::create($request->all());
        return view('tools.addEquip');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Tools::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * 
     */
    public static function gettoolsname(){
        $tool = DB::table('tools')->get();
        $tools=array();
        foreach($tool as $tl){
            $t['id']=$tl->id;
            $t['title']=$tl->tl_name;
            $t['eventColor']=$tl->color;
            array_push($tools, $t);
        }
        return ($tools);
    }

    /**
     * 
     */
    public function gettools(){
        
        $tools = DB::table('tools')->get();
        return ($tools);
    }
    public function allTools(){
        return view("dashboard.toolsTable",['tools' => Tools::get()]);
    }
    public function toolsColor(){
        $tools = Tools::get();
        foreach ($tools as $tool){
        	Tools::where('id', $tool->id)
                    ->update(['color' => '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6)]);
        }
        // echo Tools::get();
        return redirect("/");
    }
}
