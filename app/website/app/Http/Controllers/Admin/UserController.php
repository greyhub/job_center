<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index($name)
    {
        $users = User::where('role', $name)->orderBy('email', 'asc')->paginate(12);
        return view('admin.user', compact('users', 'name'));
    }

    public function edit()
    {
        try {
            $user = User::findOrFail(Auth()->user()->id);
        }
        catch (ModelNotFoundException $e) {
            return redirect()->route('profile')->with('error', 'Thất bại');
        }

        return view('profile', compact('user'));
    }

        public function update(Request $request)
    {
        if ($request->changePassword == "Thay đổi mật khẩu") {
            $request->validate([
                'oldPassword' => ['required' , 'string', 'min:8',
                        'regex:/[a-z]/',      // must contain at least one lowercase letter
                        'regex:/[A-Z]/',      // must contain at least one uppercase letter
                        'regex:/[@$!%*#?&]/' // must contain a special character
            ],
                'password' => ['required', 'string', 'min:8',
                    'regex:/[a-z]/',      // must contain at least one lowercase letter
                    'regex:/[A-Z]/',      // must contain at least one uppercase letter
                    'regex:/[@$!%*#?&]/', // must contain a special character
                    'confirmed'
            ],
                'password_confirmation' => ['required', 'string', 'min:8', 'same:password'],
            ]);
        }
        try {
            $user = User::findOrFail(Auth()->user()->id);
            if ($user->email != $request->email) {
                $request->validate([
                    'email' => ['unique:users'],
                ]);
            }
            else {
                if ($request->changePassword != "Thay đổi mật khẩu")
                {
                    $user->update([
                    'email' => $request->email,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'birthday' => $request->birthday,
                    'gender' => $request->gender,
                    'sector' => $request->sector,
                    ]);
                }
                else {
                    $oldPass = $request->oldPassword;
                    $checkPassword = User::where('email', $request->email)->where('password', bcrypt($oldPass))->first();
                    if ($checkPassword != null) {
                        return redirect()->route('user.profile')->error('oldPassword', trans('app.message.fail'));
                    }
                    $user->update([
                    'email' => $request->email,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'birthday' => $request->birthday,
                    'gender' => $request->gender,
                    'sector' => $request->sector,
                    'password' => $request->password,
                    ]);
                }

            return redirect()->route('user.profile')->with('message', 'Thay đổi thành công');
            }
        }
        catch (ModelNotFoundException $e) {
           return redirect()->route('user.profile')->with('error', 'Thất bại');
        }
    }

    public function editAdmin(Request $request, $id)
    {
        try {
        $user = User::findOrFail($id);
        }
        catch (ModelNotFoundException $e) {
            return redirect()->route('admin.index', 'user')->with('error', 'Thất bại');
        }
        $newRole = $request->role;
        $user->update(['role' => $newRole]);
        if ($newRole == 'admin') {
            return redirect()->route('admin.index', 'admin')->with('message', 'Sửa đổi thành công');
        }
        else {
            return redirect()->route('admin.index', 'user')->with('message', 'Sửa đổi thành công');
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
        }
        catch (ModelNotFoundException $e) {
            return redirect()->route('admin.index', 'user')->with('error', 'Thất bại');
        }
        $user->delete();

        return redirect()->route('admin.index', 'user')->with('message', 'Xóa thành công');
    }
}
