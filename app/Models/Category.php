<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected  $table =  "categories";
    public function getAllCate(){
        $categories = DB::table('categories')->get();
        return $categories;
    }
    public function add($data){
      return  DB::insert('insert into  '.$this->table.'  (name_cate,des_cate,created_at) values (?, ?,?)', $data);
    }
    public function getDetail($id){
       return DB::select('select * from '.$this->table.' where id = '.$id );
    }
    public function updateCate($datas,$id){
        DB::update('update '.$this->table.' set name_cate = ? , des_cate = ?, updated_at = ? where id = '.$id, $datas);
    }
}
