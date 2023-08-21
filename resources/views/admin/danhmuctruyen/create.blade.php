@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm danh mục truyện</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" action="{{route('danhmuc.store')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
                            <input type="text" class="form-control" name="tendanhmuc" autocomplete="off" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Mô tả danh mục</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="motadanhmuc" autocomplete="off">
                        </div>
                        <div class="mb-3">
                                <label class="mb-2">Trạng thái</label>
                                <select class="form-select" aria-label="Đang hiện" name="trangthai">
                                    <option selected value="0">Đang hiện</option>
                                    <option value="1">Đã ẩn</option>
                                </select>
                        </div>
                        <button type="submit" name="themdanhmuc" class="btn btn-success">Thêm danh mục</button>
                    </form>

                    @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
