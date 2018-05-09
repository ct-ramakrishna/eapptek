<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Products;
use File;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $products=Products::all();
        $products=Products::orderBy('id','desc')->paginate(3);
        return view('products.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return  view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'category'=>'required',
            'title'=>'required',
            'price'=>'required',
            'description'=>'required',
            // 'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        $files=$request->file('images');
      
        $error='';
        $files_=[];
               if($files=$request->file('images')){
                   foreach($files as $file){
                    $rules = array('file' => 'required|mimes:png,gif,jpeg,txt,pdf,doc'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
                    $validator = Validator::make(array('file'=> $file), $rules);
                        if($validator->passes()){
        
                        $input['imagename'] = time().'.'.$file->getClientOriginalExtension();
                        $sub_dir=date('Y-m');
                        $destinationPath ='public/product_images/'.$sub_dir;
                        // if(!is_dir($destinationPath)){
                        //     mkdir($destinationPath);
                        // }
                        $file->storeAs($destinationPath, $input['imagename']);
                        //$file->move($destinationPath, $input['imagename']);
                        $files_[]= $sub_dir.'/'.$input['imagename'];
                        //$this->postImage->add($input);
                    }else{
                        $error=$validator->getMessageBag()->toArray()['file'][0];
                    }
                       
                   }
               }
            
            if($error!=''){
                return redirect('/products/create')->with('error',$error);
            }
               
             
        
            // return back()->with('success','Image Upload successful');
        
        
                //
              
                $prd=new Products;
                $prd->category=$request->category;
                $prd->title=$request->title;
                $prd->price=$request->price;
                $prd->description=$request->description;
                $prd->sort_order=$request->sort_order;
                $prd->user_id=auth()->user()->id;
                if(count($files_)>0){
                    $prd->images=implode("|",$files_);
                }
                
                $prd->save();
                return redirect('/products')->with('success','Success! Product created.');
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
        $product=Products::find($id);
        return view('products.edit')->with('product',$product);
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
        //file upload
      // echo $request->category;
       
      
       $this->validate($request,[
        'category'=>'required',
        'title'=>'required',
        'price'=>'required',
        'description'=>'required',
        // 'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
$files=$request->file('images');
$error='';
$files_=[];
       if($files=$request->file('images')){
           foreach($files as $file){
            $rules = array('file' => 'required|mimes:png,gif,jpeg,txt,pdf,doc'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
            $validator = Validator::make(array('file'=> $file), $rules);
                if($validator->passes()){

                $input['imagename'] = time().'.'.$file->getClientOriginalExtension();
                $sub_dir=date('Y-m');
                $destinationPath = 'public/product_images/'.$sub_dir;
                // if(!is_dir($destinationPath)){
                //     mkdir($destinationPath);
                // }
                // $file->move($destinationPath, $input['imagename']);
                $file->storeAs($destinationPath,$input['imagename']);
                $files_[]= $sub_dir.'/'.$input['imagename'];
                //$this->postImage->add($input);
            }else{
                $error=$validator->getMessageBag()->toArray()['file'][0];
            }
               
           }
       }
    //    print_r($error);exit;
    if($error!=''){
        return redirect('/products/'.$id.'/edit')->with('error',$error);
    }
       
     

    // return back()->with('success','Image Upload successful');


        //
      
        $prd=Products::find($id);
        $prd->category=$request->category;
        $prd->title=$request->title;
        $prd->price=$request->price;
        $prd->description=$request->description;
        $prd->sort_order=$request->sort_order;
        $prd->user_id=auth()->user()->id;
        if(count($files_)>0){
            $prd->images=implode("|",$files_);
        }
        
        $prd->save();
        return redirect('/products')->with('success','Success! Product Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pro=Products::find($id);
        if($pro->user_id!==auth()->user()->id){
            return redirect('/products')->with('error','Unauthorized Page');
        }
        foreach(explode('|',$pro->images) as $img){
            $filename='./images/'.$img;
            File::delete($filename);
        }
        $pro->delete();

        return redirect('/products')->with('success','Success! Product has been deleted.');
    }
}
