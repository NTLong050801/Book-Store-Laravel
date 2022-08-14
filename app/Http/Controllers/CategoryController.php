<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
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
    public function store(Request $request)
    {
        //
        $request->validate([
            'name_cate' => 'required|min:10|unique:categories',
            'des_cate'  => 'required|min:20|max:1000'
        ],[
            'name_cate.required' => "Tên thể loại không được để trống",
            'name_cate.min' => "Tên thể loại tối thiểu 10 ký tự.",
            'des_cate.required' => "Miêu tả không được để trống",
            'des_cate.min' => "Miêu tả tối thiểu 20 ký tự.",
            'des_cate.max' => "Miêu tả tối đa 1000 ký tự.",
            'name_cate.unique' => "Tên thể loại đã tồn tại"
        ]);
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
        //
    }
}
