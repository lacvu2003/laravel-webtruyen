<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DanhmucTruyen;

class DanhmucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhmuctruyen = DanhmucTruyen::orderBy('id','DESC')->get();
        return view('admin.danhmuctruyen.index')->with(compact('danhmuctruyen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.danhmuctruyen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request -> validate([
            'tendanhmuc' => 'required|unique:danhmuc|max:255',
            'motadanhmuc' => 'required|max:255',
            'trangthai' => 'required',
            ],
            [
                    'tendanhmuc.required' => 'Tên danh mục không được trống',
                    'motadanhmuc.required' => 'Mô tả không được trống',
            ]
        );

        $danhmuctruyen = new DanhmucTruyen();
        $danhmuctruyen -> tendanhmuc = $data['tendanhmuc'];
        $danhmuctruyen -> motadanhmuc = $data['motadanhmuc'];
        $danhmuctruyen -> trangthai = $data['trangthai'];
        $danhmuctruyen -> save();
        return redirect()->back()->with('status','Thêm danh mục truyện thành công');
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
        DanhmucTruyen::find($id)->delete();
        return redirect()->back()->with('status','Xóa danh mục truyện thành công');
    }
}
