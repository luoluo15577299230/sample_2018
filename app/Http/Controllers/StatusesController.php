<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Status;
use Auth;

class StatusesController extends Controller
{
    public function __construct()   //权限设置，仅限用户
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'content' =>'required|max:500'
        ]);

        Auth::user()->statuses()->create([
            'content' => $request['content']
        ]);

        return redirect()->back();
    }

    public function destroy(Status $status)
    {
        $this->authorize('destroy', $status);       //做删除授权检测， 不通过返回403 异常
        $status->delete();      //执行删除操作
        session()->flash('success', '微博已被删除！');
        return redirect()->back();
    }

}
