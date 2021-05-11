<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
       $files = File::all();
       return view('file',compact('files'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'file'=>'required',
            'store'=>'required'
        ]);
        $data = [
            'name'=>$request->file('file')->getClientOriginalName(),
            'store'=>$request->store,
            'user-id'=>1,
            'url'=>"local",

        ];
        $file = File::create($data);
        Storage::disk($file->store)->putFileAs('/files',$request->file('file'),  $file->name,'public');
        $file->url = $this->createLink($file);
        $file->save();

        return redirect()->route('index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return string
     */
    public function createLink(File $file): string
    {

        if($file->store ==="public")
        {
            $url = Storage::disk('public')->url('/files/'.$file->name);
        }
        else $url = Storage::disk($file->store)->temporaryUrl('/files/'.$file->name,now()->addMinutes());
        return $url;

    }


    public function destroy(File $file): \Illuminate\Http\RedirectResponse
    {
Storage::disk($file->store)->delete('/files/'.$file->name);
        $file->delete();
        return redirect()->route('index');
    }
}
