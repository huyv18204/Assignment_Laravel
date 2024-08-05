<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequests;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()->latest('id')->paginate(5);
        return view('admin.users.index', compact('users'));
    }

    public function store(UserRequests $request)
    {
        User::query()->create($request->validated());
        return redirect()->route('users.index')->with('success', 'Người dùng đã được tạo thành công.');
    }


    public function update(Request $request, $id)
    {
        $user = User::query()->findOrFail($id);
//        dd($user);
        $user->update([
            "is_admin" => $user->is_admin == 0 ? 1 : 0
        ]);
        return redirect()->route('users.index')->with('success', 'Người dùng đã được cập nhật thành công.');
    }


    public function destroy($id)
    {

        $user = User::query()->find($id);
        if ($user) {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'Người dùng đã được xóa thành công.');
        } else {
            return redirect()->back()->with('error', 'Người dùng không tồn tại.');
        }


    }

    public function trash(Request $request)
    {
        $data = User::onlyTrashed()->paginate(5);
        return view('admin.users.trash', compact('data'));
    }

    public function restore($id)
    {
        $user = User::withTrashed()->find($id);
        if ($user) {
            $user->restore();
            return redirect()->route('users.trash')->with('success', 'Người dùng đã được khôi phục.');
        }
        return redirect()->route('users.trash')->with('error', 'Không tìm thấy người dùng.');
    }
}
