@extends('admin.home')
@section('content')
    <div class="container">
        <h1 class="text-success text-center pt-2">Thêm thể loại </h1>
        <!-- Button trigger modal -->
    <a href="{{route('cate.index')}}">
      <button   button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Quay lại
        </button>
    </a>

    <br><br>
       <form action="{{route('cate.store')}}" method="POST">
        
        @error('name_cate')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <div class="form-floating mb-3">
            <input type="text" name="name_cate" class="form-control" value="{{old('name_cate')}}" id="floatingInput" placeholder="Nhập tên thể loại">
            <label for="floatingInput">Tên thể loại</label>
          </div>
          @error('des_cate')
        <span class="text-danger">{{$message}}</span>
        @enderror
          <div class="form-floating">
            <textarea  class="form-control" name="des_cate" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">
                {{old('des_cate')}}
            </textarea>
            <label for="floatingTextarea2">Mô tả</label>
          </div><br>
          @csrf
          <button type="submit" class="btn btn-success " style="float: right">Thêm thể loại</button>
       </form>
     

    </div>
    
@endsection