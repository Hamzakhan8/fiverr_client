<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $campaigns = Campaign::all();
        return view('dashboard.campaign.index', compact('campaigns'));
    }

    public function create()
    {
        return view('dashboard.campaign.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','string'],
         ]);

         Campaign::create([
            'user_id' => $request->user()->id,
            'name' => $request['name'],
         ]);

         return redirect()->route('campaigns')
         ->with('created', 'Campaign has been added');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Campaign  $campaign
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Campaign $campaign)
    {
        return view('dashboard.campaign.create', compact('campaign'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCampaignRequest  $request
     * @param  \App\Models\Campaign                      $student
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $campaign_update_status = Campaign::findOrFail($id);

        if($campaign_update_status->active == 0){

            $campaign_update_status->update([
                'user_id' => $request->user()->id,
                'active' => 1,
            ]);
        }else{

            $campaign_update_status->update([
                'user_id' => $request->user()->id,
                'active' => 0,
            ]);
        }

        return redirect()->route('campaigns')
        ->with('updated', 'Campaign status updated');
    }

    public function edit(Request $request, $idd)
    {
        $campaign_update = Campaign::findOrFail($idd);
        $campaign_update->update([
            'name' => $request['name'],
        ]);
        return redirect()->route('campaigns')
        ->with('updated', 'Campaign Edit Successfully');
    }

    public function destroy($id)
    {
        Campaign::findOrFail($id)->delete();

        return redirect()->route('campaigns')->with('deleted', 'Campaign Deleted Successfully.');;
    }
}
