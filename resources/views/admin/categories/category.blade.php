@extends('admin.home')
@section('content')
    <div class="container">
        <h1 class="text-success text-center pt-2">Quản lý thể loại</h1>
        <!-- Button trigger modal -->
    <a href="{{route('cate.create')}}">
      <button   button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Thêm thể loại
        </button>
    </a>
    <br><br>
    @if (session('msg'))
        <div class="alert alert-success text-center">{{session('msg')}}</div>
    @endif

    <table class="table">
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col" style="width: 20%">Tên thể loại</th>
            <th scope="col">Miêu tả</th>
            <th scope="col">Ngày tạo</th>
            <th scope="col">Xóa</th>
            <th scope="col">Sửa</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($datas   as $key => $cate)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{ $cate->name_cate}}</td>
                <td>{{ $cate->des_cate}}</td>
                <td>{{ $cate->created_at}}</td>
                <td>
                  <a href="#" class="text-danger"><i class="fa-solid fa-trash-can"></i></a>
                 
                </td>
                <td><a href="#" class="text-info"><i class="fa-solid fa-pen-to-square"></i></a></td>
              </tr>
            @endforeach
        </tbody>
      </table>

  <!-- Modal -->
  
</div>
    
@endsection