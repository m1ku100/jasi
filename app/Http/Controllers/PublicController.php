<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Feedback;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PublicController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $blog = Blog::take(3)->get();
        return view('landing', compact('blog'));
    }


    public function about()
    {
        return view('public.about');
    }

    public function blog()
    {
        $blog = Blog::all();
        return view('public.blog', compact('blog'));

    }

    public function contact()
    {
        return view('public.contact');

    }

    public function portal()
    {
        return view('public.portal');

    }

    public function order()
    {
        return view('public.order');

    }

    public function feedback(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'konten' => 'required',
            'isread' => 'required',
        ]);
//dd($request);

        Feedback::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'subject' => $request->subject,
            'konten' => $request->konten,
            'isread' => $request->isread,
        ]);

        return back()->with([
            'message' => 'Terima Kasih Atas Kritik Dan saran  yang anda Kirimkan '
        ]);
    }

    public function ordersave(Request $request)
    {
        $request->validate([
            'pengambilan' => 'required',
            'tujuan' => 'required',
            'jarak' => 'required',
            'harga' => 'required',
            'user_id' => 'required',
            'catatan' => 'required',
            'is_nyampek' => 'required',
        ]);


        Order::create([
            'pengambilan' => $request->pengambilan,
            'tujuan' => $request->tujuan,
            'jarak' => $request->jarak,
            'harga' => $request->harga,
            'user_id' => $request->user_id,
            'catatan' => $request->catatan,
            'is_nyampek' => $request->is_nyampek,
        ]);

        return back()->with([
            'message' => 'Silahkan Tunggu dan Pantau Perjalan ASI Anda'
        ]);
    }

    public function profile()
    {
        return view('public.include.profile');
    }

    public function saveprofile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $user = User::find($request->id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return back()->with([
            'message' => 'Berhasil Memperbarui Profile !'
        ]);
    }

    public function savepass(Request $request)
    {
        if (!Hash::check($request->passlama, Auth::user()->password)) {
            return back()->with([
                'error' => 'Kata sandi lama anda salah !'
            ]);
        } else {
            if ($request->passbaru !== $request->pass_confirm) {
                return back()->with([
                    'error' => 'Kata sandi yang anda masukkan tidak sama !'
                ]);
            } else {

                Auth::user()->update([
                    'password' => bcrypt($request->passbaru)
                ]);
            }

            return back()->with([
                'message' => 'Berhasil Memperbarui Profile !'
            ]);
        }
    }

}
