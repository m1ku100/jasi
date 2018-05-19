<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Feedback;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('landing');
    }


    public function about()
    {
        return view('public.about');
    }

    public function blog()
    {
        $blog = Blog::all();
        return view('public.blog',compact('blog'));

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

}
