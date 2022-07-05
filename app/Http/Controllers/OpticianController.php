<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Optician;
use Illuminate\Http\Request;

class OpticianController extends Controller
{
    public function index()
    {
        $opticians = Optician::with('campaigns')->get();

        $campaigns = Campaign::all();

        return view('dashboard.opticians.index', compact('opticians', 'campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $opticians = Optician::findOrFail($id);

        return view('dashboard.opticians.optician_view', compact('opticians'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           $request->validate([
            'name' => ['required','string'],
            'street' => ['required','string'],
            'zip' => ['required', 'numeric'],
            'city' => ['required'],
            'url_homepage' => ['required','url'],
            'url_imprint' => ['required','url'],
            'url_privacy' => ['required','url'],
            'url_contact' => ['required','url'],
            'url_appointment' => ['required','url'],
         ]);

         Optician::create([
            'name'=>$request['name'],
            'street'=>$request['street'],
            'zip'=>$request['zip'],
            'city'=>$request['city'],
            'url_homepage'=>$request['url_homepage'],
            'url_imprint'=>$request['url_imprint'],
            'url_privacy'=>$request['url_privacy'],
            'url_contact'=>$request['url_contact'],
            'url_appointment'=>$request['url_appointment'],
         ]);

         return redirect()->route('opticians')
         ->with('created', 'Optician has been added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function lockOptician($id)
    {
        $optician_lock = Optician::findOrFail($id);

        $optician_lock->update([
            'status' => 'locked',
        ]);

        return redirect()->route('campaigns')
        ->with('lock', 'The optician has been locked');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function UnLockOptician($id)
    {
        $optician_lock = Optician::findOrFail($id);

        $optician_lock->update([
            'status' => 'unlocked',
        ]);

        return redirect()->route('campaigns')
        ->with('unlock', 'The optician has been unlocked');
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

        $request->validate([
            'name'=>['required','string'],
            'street'=>['required','string'],
            'zip'=>['required'],
            'city'=>['required'],
            'url_homepage'=>['required','url'],
            'url_imprint'=>['required','url'],
            'url_privacy'=>['required','url'],
            'url_contact'=>['required','url'],
            'url_appointment'=>['required','url'],
         ]);

         $optician_update = Optician::FindOrFail($id);

         $optician_update->update([
            'name'=>$request['name'],
            'street'=>$request['street'],
            'zip'=>$request['zip'],
            'city'=>$request['city'],
            'url_homepage'=>$request['url_homepage'],
            'url_imprint'=>$request['url_imprint'],
            'url_privacy'=>$request['url_privacy'],
            'url_contact'=>$request['url_contact'],
            'url_appointment'=>$request['url_appointment'],
         ]);

         return redirect()->route('opticians')
         ->with('updated', 'Optician has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Optician::findOrFail($id)->delete();

        return redirect()->route('opticians');
    }
}
