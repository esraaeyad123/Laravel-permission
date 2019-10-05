<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Post;

class PostController extends Controller
{
    public function create()
    {
        return view('/create');
    }

    public function store(Post $post , Request $request)
    {
      $this->validate($request,
    [
        'description'=>['required','min:5','max:8'] ,
 'title'=>['required','min:5','max:8']
    ]



);


        Post::create([
            'description' => $request->description,
            'title' => $request->title ,
            'user_id'=> auth()->user()->id ,
        ]);



        return redirect()->back()->with('success', 'post has been created successfully');



    }
    public function show(Request $request)
    {


        $allpost=Post::all();

        return view('post')->with(compact('allpost'));

    }
    public function edit(Request $request ,$id )
    {
        $Details = Post::find($id);


        return view('edit')->with(compact('Details'));


    }
    public function update(  Request $request ,$id )
    {

        $this->validate($request,
            [
                'description'=>['required','min:5','max:100'] ,
                'title'=>['required','min:8','max:8']
            ]



        );

       $post = Post::find($id);


       $post->description= $request->description;
       $post->title = $request->title ;


        $post->save();


        return redirect()->back()->with('flash_message_success', 'post has been edited successfully');
    }
    public function showdescription(  Request $request ,$id )
    {



       // $post = Post::find($id);
        $description = Post::where(['id' => $id])->first()->description;



        return view('description')->with(compact('description'));
    }
    public function destroy($id)
    {
        Post::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'post has been deleted successfully');
    }

    public function search( Request $request)
    {
        $request->validate([
            'q' => 'required'
        ]);


       $q= $request->q;

       $filter=Post::where('title', 'like' , '%'. $q .'%')->get();

        if ($filter->count()) {
            return view('post')->with([
                'allpost' =>  $filter
            ]);
        } else {

            return redirect('/post')->with([
                'status' => 'search failed ,, please try again'
            ]);
        }

    }
    }
