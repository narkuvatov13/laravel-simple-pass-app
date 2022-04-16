<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = auth()->user()->site()->get();

        return view('home', compact('posts'));
    }
    public function store()
    {
        $inputs = request()->validate([
            'url' => 'required|min:2|max:255',
            'name' => 'required|min:2|max:255',
            'username' => 'required|min:2|max:255',
            'password' => 'required|min:2|max:255',
            'img' => 'file',
            'note' => 'required',
        ]);
        if (request('img')) {

            $path = request('img')->store('images', 's3');
            Storage::disk('s3')->put('images', $path);
            $inputs['img'] = Storage::disk('s3')->url($path);
        }
        //return dd($inputs);
        auth()->user()->site()->create($inputs);
        //$user = User::findOrFail(1);
        //$user->site()->create($inputs);
        return redirect()->route('home');
    }

    public function edit($site_id)
    {
        $modal = 'data-toggle="modal"';
        $site = Site::findOrFail($site_id);
        return view('edit', compact('site', 'modal'));
        //return dd($site_id);
    }


    public function update(Site $site)
    {
        $inputs = request()->validate([
            'url' => 'required|min:2|max:255',
            'name' => 'required|min:2|max:255',
            'username' => 'required|min:2|max:255',
            'password' => 'required|min:2|max:255',
            'img' => 'file',
            'note' => 'required',
        ]);
        if (request('img')) {
           // $inputs['img'] = request('img')->store('images', 's3');
            $path = request('img')->store('images', 's3');
            Storage::disk('s3')->put('images', $path);
            $inputs['img'] = Storage::disk('s3')->url($path);
            $site->img = $inputs['img'];
        }
        $site->url = $inputs['url'];
        $site->name = $inputs['name'];
        $site->username = $inputs['username'];
        $site->password = $inputs['password'];
        $site->note = $inputs['note'];
        $site->save();
        return redirect()->route('home');
    }

    public function destroy(Site $site_id)
    {
        $site_id->delete();
        return back();
    }
}
