<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Prayer;

class PrayerController extends Controller
{
    public function prayer()
    {
        $prayer = DB::table('prayers')->first(); // First method use first row show .

        return view('admin.setting_section.prayer', compact('prayer'));
    }


    public function update(Request $request)
    {
        $update = $request->id;

        Prayer::findOrFail($update)->update([
            'fajr' => $request->fajr,
            'dhuhr' => $request->dhuhr,
            'asr' => $request->asr,
            'maghrib' => $request->maghrib,
            'isha' => $request->isha,
            'jummah' => $request->jummah,
        ]);
        $notification = array('messege' => 'Namaz Time Update Successfully !!', 'alert-type' => "success");
        return redirect()->back()->with($notification);
    }
}
