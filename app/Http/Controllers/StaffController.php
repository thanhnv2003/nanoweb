<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffRequest;
use App\Models\Staffs;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    //
    public function list(Request $request){
        $perPage = 10;
        $currentPage = request('page', 1);
        $data = Staffs::paginate($perPage);
        if ($request->isMethod('POST') && $request->name != ''){
            $data = Staffs::where('name', 'like', '%'.$request->name.'%')->orderBy('id','asc')->get();
        }
        return view('layout.list', compact('data'));
    }
    public function add(StaffRequest $request){
        if ($request->isMethod('POST')){
            $params = $request->except('_token');

            $name = $request->input('name');
            $name = strip_tags($name);
            $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
            $params['name'] =  $name;

            $result = Staffs::create($params);
            if ($result->id){
                return redirect()->route('list')->with('success', 'Thêm mới thành công');
            }
        }
        return view('layout.add');
    }
    public function edit(StaffRequest $request, $id){
        $data = Staffs::find($id);
        if ($request->isMethod('POST')){
            $params = $request->all();

            $name = $request->input('name');
            $name = strip_tags($name);
            $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
            $params['name'] =  $name;

            $result = $data->update($params);
            if ($result){
                return redirect()->route('list')->with('success', 'Cập nhật thành công');
            }
        }
        return view('layout.edit', compact('data'));
    }
}
