<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Admin\CateRequest;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $Categories;
    public function __construct() {
      $this-> Categories = new Category() ;
    }

    public function index()
    {
        //
        $title = "Categories";
        $datas = $this->Categories -> getAllCate();
        return view('admin.categories.category',compact('title',"datas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = "Categories";
        return view('admin.categories.AddCate',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CateRequest $request)
    {
        //
        // $request->validate([
        //     'name_cate' => 'required|min:10|unique:categories',
        //     'des_cate'  => 'required|min:20|max:1000'
        // ],[
        //     'name_cate.required' => "Tên thể loại không được để trống",
        //     'name_cate.min' => "Tên thể loại tối thiểu 10 ký tự.",
        //     'des_cate.required' => "Miêu tả không được để trống",
        //     'des_cate.min' => "Miêu tả tối thiểu 20 ký tự.",
        //     'des_cate.max' => "Miêu tả tối đa 1000 ký tự.",
        //     'name_cate.unique' => "Tên thể loại đã tồn tại"
        // ]);
        $dataInsert = [
            $request->name_cate,
            $request->des_cate,
           date("Y-m-d H:i:s")
        ] ;
        $this -> Categories -> add($dataInsert);
        return redirect()->route('cate.index')->with('msg',"Thêm thể loại thành công");
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
            if(!empty($id)){
                $title = "Sửa thể loại";
                session()->put('id',$id);
                $datas = $this -> Categories -> getDetail($id);
                 return view('admin.categories.edit',compact("title","datas"));
               
            }else{
                return redirect()->back();
            }

      

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CateRequest $request)
    {
        //
        // dd($request);
        $id = session('id');
        // if(!empty($id)){
        //     return redirect()->back()->with('msg',"Lỗi");
        // }
        $request->validate([
            'name_cate' => 'unique:categories,name_cate,'.$id,
        ],[
            'name_cate.unique' => "Tên thể loại đã tồn tại1"
        ]);
        $datas = [
            $request->name_cate,
            $request->des_cate,
            date("Y-m-d H:i:s")
        ];
        $this -> Categories -> updateCate($datas,$id);
        return redirect()->route('cate.index')->with('msg',"Sửa thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
        // return $id;
    }
}
