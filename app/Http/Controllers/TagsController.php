<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App\Models\Tag;
class TagsController extends Controller
{
 
  
  
  public function main()
  {
    $tag = new \stdClass();
    foreach ($this->PostValadationRules() as $k=>$v) {
     
     $tag->{$k} = request()->input($k); 
    
    }
    return view('tags')->withTag($tag) 
                       ->withName('My project')
                       ->with('tags',Tag::all());
   
  }
  public function add()
  {
    $validator = $this->PostValadition(request()->all());
    if ($validator->fails())
    {
      return redirect(route('tags'))->withErrors($validator)->withInput();
    } else
    {
      Tag::create(['name'=>request()->input('name')]);
      return redirect(route('tags'))->withMessage('Good!!!');
    }
  }
  function PostValadition($data,$id = null)
  {
    return Validator::make($data, $this->PostValadationRules($id));
  }
  function PostValadationRules($id = null)
  {
    return array('name' => "required|max:100|unique:tags,name,$id");
  } 
  function PostDelValadationRules()
  {
    return array('id' => "exists:tags,id|required");
  }
  function Delete($id)
  {
    
    $validator = Validator::make(array('id'=>$id), $this->PostDelValadationRules());
    if ($validator->fails())
    {
     return redirect(route('tags'))->withErrors($validator);
    } else
    {
      Tag::where('id', $id)->delete();
      return redirect(route('tags'))->withMessage('Good!!!');
    }
    
    
  
  }
  function Edit($id)
  {
    $validator = Validator::make(array('id'=>$id), $this->PostDelValadationRules());
    if ($validator->fails())
    {
     return redirect(route('tags'))->withErrors($validator);
    }
    $tag = Tag::where('id', $id)->first();
    foreach ($this->PostValadationRules() as $k=>$v) {
      $tag->{$k} = request()->input($k)?:$tag->{$k}; 
    }
    return view('tags')->with('tag',$tag) 
                       ->with('name','My project')
                       ->with('tags',Tag::all());
    
  }
  function Update($id){
    
    $validator = $this->PostValadition(request()->all(),$id);
    if ($validator->fails())
    {
      return redirect(route('tags'))->withErrors($validator)->withInput();
    } else
    {
      Tag::where('id',$id)->update(['name'=>request()->input('name')]);
      return redirect(route('tags'))->withMessage('Good!!!');
    }
    
  }
}

