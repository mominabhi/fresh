<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Form;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MasterController extends Controller
{
    public function form_view()
    {
        return view('form');
    }

    public function form_submit(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|max:10',
            'email' => 'required|email:rfc,dns|unique:forms,email',
            'password' => 'required'
        ));
        $form = new Form();
        $form->name = $request->input('name');
        $form->email = $request->input('email');
        $form->password = $request->input('password');
        $form->save();
        return redirect()->route('table_view');
    }

    public function table_view()
    {
        $datas = Form::all();
        return view('table', ['datas' => $datas]);

    }

    public function delete_data($id)
    {
        $form = Form::where('id', $id)->first();
        $form->delete();
        return redirect()->route('table_view');
    }

    public function edit_data($id)
    {
        $data = Form::find($id);
        return view('form', ['data' => $data]);
    }

    public function form_update(Request $request)
    {
        $this->validate($request,array(
            'name'=>'required|max:10',
            'email'=>'required|email:rfc,dns|unique:forms,email',
            'password'=>'required'
        ));

        $id = $request->input('id');
        $form = Form::find($id);
        $form->name = $request->input('name');
        $form->email = $request->input('email');
        $form->password = $request->input('password');
        $form->save();
        Session::flash('success','successfuly Upadted');
        return redirect()->route('table_view');
    }
    public function relation(){
        $id=4;
        $post=Post::find($id);
        $categoryCheck=$post->category->name;
        echo $categoryCheck;
    }
    public function form_show()
    {
        $tags=Tag::all();
        $categories=Category::all();
        return view('manyTomany',['tags'=>$tags],['categories'=>$categories]);
    }
    public function form_many(Request $request)
    {
        $post=new Post();
        $post->post=$request->input('post');
        $post->body=$request->input('body');
        $post->category_id=$request->input('category');
        $post->save();
        $post->tags()->sync($request->tags,false);
        Session::flash('success','Successfully fucked up');
        return redirect()->route('form_show');
    }
    public function show_fuck()
    {
        $post=Post::find(1);
        echo $post->post;
       echo $post->category->name;
      foreach ($post->tags as $tag)
      {
          echo $tag->name;
      }
      $tag=Tag::find(1);
      foreach ($tag->posts as $post)
      {
          echo $post->post;
      }
    }
    public function detach($id)
    {
        $post=Post::find($id);
        $post->tags()->detach();
        $post->delete();
        Session::flash('success','successfully Deleted');
    }

}
