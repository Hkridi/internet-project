<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        return view('admin-side.users.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('admin-side.users.create');
    }

    public function store(Request $request)
    {
        // validate user_email
        $validatedData = $request->validate([
            'email' => 'required|string',
        ]);
        // Check if the entered user_email already exists among other emails
        $user = User::where('email', $validatedData['email'])->first();
        // return error message if the user_email already exists
        if ($user) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['custom_error' =>
                    'The entered email "'.$request->email.'" already exists, please use another email']);
        }

        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->role = $request->role;
        $data->gender = $request->input('gender', null);
        $data->save();

        return redirect()->route('admin.users');
    }

    public function show($id)
    {
        $user = User::find($id);
        /*$encryptedPassword = $user->password;
        $decryptedPassword = Crypt::decrypt($encryptedPassword);*/
        return view('admin-side.users.show', [
            'user' => $user,
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin-side.users.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = User::find($id);

        // validate user_email
        $validatedData = $request->validate([
            'email' => 'required|string',
        ]);
        // Check if the entered user_email already exists among other emails (excluding the current email)
        $user = User::where('email', $validatedData['email'])
            ->where('id', '!=', $data->id)
            ->first();
        // return error message if the user_email already exists
        if ($user) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['custom_error' =>
                    'The entered email "'.$request->email.'" already exists, please use another email']);
        }

        $data->name = $request->name;
        $data->email = $request->email;
//        $data->password = $request->password;
        $data->role = $request->role;
        $data->gender = $request->input('gender', null);
        $data->save();
        return redirect()->route('admin.users');
    }

    public function destroy($id)
    {
        $data =User::find($id);
        $data->delete();
        return redirect()->route('admin.users');
    }
}
