<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Booster;



class BoosterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
        {
        $boosters = Booster::all();
        

        $params = [
            'title' => 'Boosters',
            
            'boosters' => $boosters,
            
        ];
        

        return view('admin.boosters.booster_list')->with($params);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $params = [
            'title' => 'Create Booster',
            
        ];

        return view('admin.boosters.booster_create')->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:posts',
            'verse' => 'required',
            'confession' => 'required',
            
        ]);

        
        $new_booster = Booster::create([
            'title' => $request->input('title'),
            'verse' => $request->input('verse'),
            'confession' => $request->input('confession'),
            'color' => $request->input('color'),
        ]);

        return redirect()->route('booster.index')->with('success', "The Booster <strong>$new_booster->title</strong> has successfully been created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booster = Booster::find($id);
    
        $params = [
            'title' => 'View Booster',
            'booster' => $booster,

        ];

        return view('admin.boosters.booster_view')->with($params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booster = Booster::find($id);

        $params = [
            'title' => 'Edit Booster',
            'booster' => $booster,
            
        ];

        return view('admin.boosters.booster_edit')->with($params);
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
                $booster = Booster::find($id);

        if (!$booster){
            return redirect()
                ->route('booster.index')
                ->with('warning', 'The booster you requested for was not found.');
        }

        $this->validate($request, [
           'title' => 'required',
            'verse' => 'required',
            'confession' => 'required',
            'color' => 'required',
            
        ]);

        $booster->title = $request->input('title');
        $booster->verse = $request->input('verse');
        $booster->confession = $request->input('confession');
        $booster->color = $request->input('color');
        $booster->save();

        return redirect()->back()->with('success', "The booster was successfully updated.");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $booster = Booster::find($id);
        if (!$booster){
            return redirect()
                ->route('booster.index')
                ->with('warning', 'The booster you requested for has not been found.');
        }

        $booster->delete();

        return redirect()->back()->with('success', "The Booster has successfully been archived.");

    }


}
