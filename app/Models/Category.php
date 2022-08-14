<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    public function getAllCate(){
        $categories = DB::table('categories')->get();
        return $categories;
    }
    public function add($data){
        DB::insert('insert into  categories  (name_cate,des_cate,created_at) values (?, ?,?)', $data);
    }
}
