<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Prayer;
use App\Models\Livetv;
use App\Models\Notice;
use App\Models\Setting;
use Intervention\Image\Facades\Image;

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
            'fajr_en' => $request->fajr_en,
            'fajr_bn' => $request->fajr_bn,
            'dhuhr_en' => $request->dhuhr_en,
            'dhuhr_bn' => $request->dhuhr_bn,
            'asr_en' => $request->asr_en,
            'asr_bn' => $request->asr_bn,
            'maghrib_en' => $request->maghrib_en,
            'maghrib_bn' => $request->maghrib_bn,
            'isha_en' => $request->isha_en,
            'isha_bn' => $request->isha_bn,
            'jummah_en' => $request->jummah_en,
            'jummah_bn' => $request->jummah_bn,
        ]);
        $notification = array('messege' => 'Namaz Time Update Successfully !!', 'alert-type' => "success");
        return redirect()->back()->with($notification);
    }

    // Live Tv Function:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

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

    // Live TV Active/Deactive Function
    // Live Tv Function:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::


    // Notice Route Start
    public function notice()
    {
        $notices = DB::table('notices')->first();

        return view('admin.setting_section.notices', compact('notices'));
    }
    public function NoticeUpdate(Request $request)
    {
        $update = $request->id;

        Notice::findOrFail($update)->update([
            'notice_bn' => $request->notice_bn,
            'notice_en' => $request->notice_en,

        ]);
        $notification = array('messege' => 'New Notice Update Successfully !!', 'alert-type' => "success");
        return redirect()->back()->with($notification);
    }

    // Notice Active and Deactive Function Start :::::::::::::::::::::::::::::::::::::::::::::::::::
    public function NoticeActive($id)
    {
        DB::table('notices')->where('id', $id)->update(['status' => 1]);

        $notification = array('messege' => 'New Notice Active Successfully !!', 'alert-type' => "success");
        return redirect()->back()->with($notification);
    }

    public function NoticeDeactive($id)
    {
        DB::table('notices')->where('id', $id)->update(['status' => 0]);

        $notification = array('messege' => 'Notice Deactive Successfully !!', 'alert-type' => "success");
        return redirect()->back()->with($notification);
    }
    // Notice Active and Deactive Function End :::::::::::::::::::::::::::::::::::::::::::::::::::
    // Notice Route End


    // Website Setting Route Start
    public function WebsiteSetting()
    {
        $setting = Setting::first();

        return view('admin.setting_section.website_setting', compact('setting'));
    }
    public function WebsiteUpdate(Request $request, $id)
    {
        $request->validate([
            'address_en' => 'required',
            'address_bn' => 'required',
            'phone_en' => 'required',
            'phone_bn' => 'required',
            'email' => 'required',
        ]);

        $data = array();
        $data['address_en'] = $request->address_en;
        $data['address_bn'] = $request->address_bn;
        $data['phone_en'] = $request->phone_en;
        $data['phone_bn'] = $request->phone_bn;
        $data['email'] = $request->email;

        $logo = $request->logo;
        if ($logo) {
            $image_one = uniqid() . '.' . $logo->getClientOriginalExtension();
            Image::make($logo)->resize(320, 130)->save('image/logo/' . $image_one);
            $data['logo'] = 'image/logo/' . $image_one;
            DB::table('settings')->where('id', $id)->update($data);

            $notification = array('messege' => 'Update With ImageSuccessfully !!', 'alert-type' => "success");
            return redirect()->back()->with($notification);
        }
        DB::table('settings')->where('id', $id)->update($data);

        $notification = array('messege' => 'Update Without Image Successfully !!', 'alert-type' => "success");
        return redirect()->back()->with($notification);
    }
}
