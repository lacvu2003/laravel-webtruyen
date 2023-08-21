@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liệt kê danh mục truyện</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên danh mục</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Quản lý</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($danhmuctruyen as $key => $danhmuc)
                                    <tr>
                                        <th scope="row">{{$key}}</th>
                                        <td>{{$danhmuc->tendanhmuc}}</td>
                                        <td>{{$danhmuc->motadanhmuc}}</td>
                                        <td>
                                            @if($danhmuc->trangthai == 0)
                                                <span class="text text-success">Đang hiện</span>
                                            @else
                                                <span class="text text-danger">Đã ẩn</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{route('danhmuc.destroy',['danhmuc' => $danhmuc->id])}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa danh mục này')">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
