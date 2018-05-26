<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Driver;
use App\Feedback;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    public function index()
    {
        $blog = Blog::all()->count();
        $feedback = Feedback::all()->where('created_at', '>=', today())->count();

        return view('admin.dashboard', compact('feedback', 'blog'));
    }

    public function user()
    {
        $pengguna = User::all()->where('role','=','admin');

        return view('admin.user', compact('pengguna'));
    }

    public function adduser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($request->pasadminsword)
        ]);

        return back()->with([
            'success' => 'Berhasil Menambah User!'
        ]);

    }

    public function updateuser(Request $request)
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
                    'name' => $request->name,
                    'password' => bcrypt($request->passbaru)
                ]);
            }

            return back()->with([
                'success' => 'Berhasil Memperbarui Profile !'
            ]);
        }

    }

    public function blog()
    {
        $blog = Blog::all();
        return view('admin.blog', compact('blog'));
    }

    public function blogform()
    {
        return view('admin.form.form');
    }

    public function save(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'subjudul' => 'required',
            'konten' => 'required',
            'uploder' => 'required',
            'dir' => 'required',
        ]);

        if ($request->hasFile('dir')) {

            $fillnames2 = $request->dir->getClientOriginalName() . '' . str_random(4);
            $filename = 'upload/photo/'
                . str_slug($fillnames2, '-') . '.' . $request->dir->getClientOriginalExtension();
            $request->dir->storeAs('public', $filename);
            $berkas = new Blog();
            $berkas->dir = $filename;
            $berkas->judul = $request->judul;
            $berkas->subjudul = $request->subjudul;
            $berkas->konten = $request->konten;
            $berkas->uploder = $request->uploder;
            $berkas->save();
            $dir = $fillnames2;
        }
        return redirect('admin/blog')->with('message', 'Berita Baru Berhasil Dipublish');

    }

    public function delete(Request $request)
    {
        $this->validate($request, [
            'id' => 'required'
        ]);

        $news = Blog::find($request->id);
        $news->delete();

        return back()->with('message', 'Berhasil menghapus Berita Berjudul ' . $news->judul . '.');
    }

    public function hide(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'is_public' => 'required',
        ]);
        $berita = Blog::find($request->id);
        $berita->update([
            'is_public' => $request->is_public,
        ]);

        return back()->with('message', 'Berhasil Memperbarui Artikel');
    }

    public function updateblog(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'judul' => 'required',
            'konten' => 'required',
            'subjudul' => 'required'
        ]);

        $news = Blog::find($request->id);
        $news->update([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'subjudul' => $request->subjudul,

        ]);

        return back()->with('message', 'Berhasil Memperbarui Berita ');
    }

    public function driver()
    {
        $pengguna = Driver::all();

        return view('admin.driver', compact('pengguna'));
    }

    public function adddriver(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'role' => 'required',
            'tgl_lahir' => 'required',
            'dir' => 'required',
            'kendaraan' => 'required',
            'nopol' => 'required',
            'no_telp' => 'required',
        ]);

        if ($request->hasFile('dir')) {

            $fillnames2 = $request->dir->getClientOriginalName() . '' . str_random(4);
            $filename = 'upload/photo/'
                . str_slug($fillnames2, '-') . '.' . $request->dir->getClientOriginalExtension();
            $request->dir->storeAs('public', $filename);
            $berkas = new Driver();
            $berkas->dir = $filename;
            $berkas->nama = $request->nama;
            $berkas->alamat = $request->alamat;
            $berkas->tgl_lahir = $request->tgl_lahir;
            $berkas->kendaraan = $request->kendaraan;
            $berkas->nopol = $request->nopol;
            $berkas->no_telp = $request->no_telp;
            $berkas->save();
            $dir = $fillnames2;
        }

        return back()->with([
            'success' => 'Berhasil Menambah Driver!'
        ]);

    }

    public function order()
    {
        $onprogress = Order::all()->where('is_nyampek', false)->where('created_at', '>=', today());
        $finish = Order::all()->where('is_nyampek', true)->where('created_at', '>=', today());
        $finished = Order::all()->where('is_nyampek', true)->sortByDesc("updated_at");
        $order= Order::all()->where('is_nyampek', true);
        $provit = DB::table('orders')->where('is_nyampek', true)->sum('harga');
        return view('admin.order', compact('onprogress', 'finish','provit','order','finished'));
    }

    public function active(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'is_nyampek' => 'required',
        ]);
        $order = Order::find($request->id);
        $order->update([
            'is_nyampek' => $request->is_nyampek,
        ]);

        return back()->with('message', 'Barang Telah Terkirim');
    }

}
