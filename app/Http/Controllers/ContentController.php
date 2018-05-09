<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

         //$contents=Content::all()->paginate(1);
         $contents=Content::orderBy('title','asc')->paginate(3);
        //  $contents=Content::where('title','about')->get();
        //  $contents=Content::orderBy('id','desc')->take()->get();
        //  $contents=DB::select('select * from contents')->get();
        return view('contents.index')->with('contents',$contents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('contents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'title' =>'required',
            'content'  =>'required'
        ]);
        $content=new Content;
        $content->title=$request->post('title');
        $content->content=$request->post('content');
        $content->user_id=auth()->user()->id;
        $content->save();
        return redirect('/contents')->with('success','Success! new content has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
       $content=Content::find($id);
       return view('contents.show')->with('content',$content);
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
        $content=Content::find($id);
        return view('contents.edit')->with('content',$content);
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
        $this->validate($request,['title'=>'required','content'=>'required']  );
        $content=Content::find($id);
        $content->title=$request->title;
        $content->content=$request->content;
        $content->user_id=auth()->user()->id;
        $content->save();
        return redirect('/contents')->with('success','Success! Content Updated');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cont=Content::find($id);
        $cont->delete();
        return redirect('/contents')->with('success','Success! Content has been deleted.');
        //
    }
}
