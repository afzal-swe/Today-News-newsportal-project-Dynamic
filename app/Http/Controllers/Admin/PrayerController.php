<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Prayer;
use App\Models\Livetv;

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


    // Live Tv Function

    public function live()
    {
        $livetv = DB::table('livetvs')->first();

        return view('admin.setting_section.livetv', compact('livetv'));
    }

    public function livetvUpdate(Request $request)
    {
        $update = $request->id;

        Livetv::findOrFail($update)->update([
            'embed_code' => $request->embed_code,

        ]);
        $notification = array('messege' => 'Live Successfully !!', 'alert-type' => "success");
        return redirect()->back()->with($notification);
    }

    // Live TV Active/Deactive Function

    public function ActiveLivetv($id)
    {
        DB::table('livetvs')->where('id', $id)->update(['status' => 1]);

        $notification = array('messege' => 'Live TV Active !!', 'alert-type' => "success");
        return redirect()->back()->with($notification);
    }


    public function DeactiveLivetv($id)
    {
        DB::table('livetvs')->where('id', $id)->update(['status' => 0]);

        $notification = array('messege' => 'Live TV Deactive !!', 'alert-type' => "warning");
        return redirect()->back()->with($notification);
    }
}
