<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\UserChangePasswordRequest;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;
use App\Jenispersijilan;
use App\Lookup;
use App\Role;
use App\User;
//use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();   // select * from users
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = Lookup::where('name', 'user_status')->where('status', 'active')->orderBy('value', 'asc')->get();
        // SELECT * FROM lookups WHERE 'name' = 'user_status' AND 'status' = 'active' ORDERBY ASC
        $roles = Role::where('status', 'active')->get();
        $jenispersijilans = Jenispersijilan::where('status', 'active')->get();
        // SELECT * FROM roles WHERE 'status' = 'active'
        return view('user.create', compact('statuses', 'roles', 'jenispersijilans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User();
//        return ($request->input('name'));
        $user->name = $request->input('name');
        $user->email = $request->input('email');
//        $user->password = $request->input('password');
        $user->password = bcrypt($request->input('password'));
        $user->ic_number = $request->input('ic_number');
        $user->phone_number = $request->input('phone_number');
        $user->role = $request->input('role');
        $user->user_type = $request->input('jenispersijilan');

        if ($request->input('role') == 'super_admin') {
            $user->access_power = 10000;
        } else if ($request->input('role') == 'pegawai') {
            $user->access_power = 8000;
        } else if ($request->input('role') == 'pegawai_admin') {
            $user->access_power = 5000;
        } else if ($request->input('role') == 'pencetak') {
            $user->access_power = 1000;
        } else if ($request->input('role') == 'akauntan') {
            $user->access_power = 2000;
        } else if ($request->input('role') == 'company') {
            $user->access_power = 500;
        } else {
            $user->access_power = 100;
        }

        $user->remark = $request->input('remark');
        $user->status = $request->input('status');
        // Untuk upload gambar avatar
        if (isset($request->avatar)) {
            if ($request->file('avatar')->isValid()) {
                $destinationPath = "images/user/";
                $extension = $request->file('avatar')->getClientOriginalExtension();
                $fileName = str_random(32) . '.' . $extension;
                $request->file('avatar')->move($destinationPath, $fileName);

                // standardize the image dimension (optional)
                Image::make($destinationPath.$fileName)->fit(500, 500)->save();

                $user->avatar = '/' . $destinationPath . $fileName;
            }
        }

        if ($user->save()) {
            return redirect('/user')->with('successMessage', 'User has been successfully created');
        } else {
            return back()->with('errorMessage', 'Unable to create new user into database. Contact admin');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // SELECT * FROM users WHERE id = 1 LIMIT 1
        $user = User::findOrFail($id);
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $statuses = Lookup::where('name', 'user_status')->where('status', 'active')->orderBy('value', 'asc')->get();
        $roles = Role::where('status', 'active')->get();
        $jenispersijilans = Jenispersijilan::where('status', 'active')->get();
        return view('user.edit', compact('user', 'statuses', 'roles', 'jenispersijilans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
//        $user->password = $request->input('password');
        $user->ic_number = $request->input('ic_number');
        $user->phone_number = $request->input('phone_number');
        $user->role = $request->input('role');
        $user->user_type = $request->input('jenispersijilan');
//        access power
        if ($request->input('role') == 'super_admin') {
            $user->access_power = 10000;
        } else if ($request->input('role') == 'pegawai') {
            $user->access_power = 8000;
        } else if ($request->input('role') == 'pegawai_admin') {
            $user->access_power = 5000;
        } else if ($request->input('role') == 'pencetak') {
            $user->access_power = 1000;
        } else if ($request->input('role') == 'akauntan') {
            $user->access_power = 2000;
        } else if ($request->input('role') == 'company') {
            $user->access_power = 500;
        } else {
            $user->access_power = 100;
        }

        $user->remark = $request->input('remark');
        $user->status = $request->input('status');
        // Untuk upload gambar avatar
        if (isset($request->avatar)) {
            if ($request->file('avatar')->isValid()) {
                $destinationPath = "images/user/";
                $extension = $request->file('avatar')->getClientOriginalExtension();
                $fileName = str_random(32) . '.' . $extension;
                $request->file('avatar')->move($destinationPath, $fileName);

                // standardize the image dimension (optional)
                Image::make($destinationPath.$fileName)->fit(500, 500)->save();

                $user->avatar = '/' . $destinationPath . $fileName;
            }
        }

        if ($user->save()) {
            return redirect('/user/show/'.$id)->with('successMessage', 'User has been successfully created');
        } else {
            return back()->with('errorMessage', 'Unable to create new user into database. Contact admin');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if($user->delete()) {
            return back()->with('successMessage', 'The user has been successfully deleted');
        } else {
            return back()->with('errorMessage', 'Unable to delete the user from database');
        }
    }

    public function profile()
    {
        $user = Auth::user();           // current user yang tengah login punya record
        return view('user.profile', compact('user'));
    }

    public function editProfile()
    {
//        $user = User::findOrFail($id);
        $user = Auth::user();
        $statuses = Lookup::where('name', 'user_status')->where('status', 'active')->orderBy('value', 'asc')->get();
        $roles = Role::where('status', 'active')->get();
        return view('user.edit', compact('user', 'statuses', 'roles'));
    }

    public function updateProfile(UserEditRequest $request)
    {
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
//        $user->password = $request->input('password');
        $user->ic_number = $request->input('ic_number');
        $user->phone_number = $request->input('phone_number');

        if (Auth::user()->role == 'super_admin' || Auth::user()->role == 'admin') {
            $user->role = $request->input('role');

            if ($request->input('role') == 'user') {
                $user->access_power = 100;
            } else if ($request->input('role') == 'company') {
                $user->access_power = 500;
            } else if ($request->input('role') == 'pencetak') {
                $user->access_power = 1000;
            } else if ($request->input('role') == 'pegawai_admin') {
                $user->access_power = 5000;
            } else if ($request->input('role') == 'admin') {
                $user->access_power = 8000;
            }else {
                $user->access_power = 10000;
            }
            $user->status = $request->input('status');
        }

        $user->remark = $request->input('remark');

        // Untuk upload gambar avatar
        if (isset($request->avatar)) {
            if ($request->file('avatar')->isValid()) {
                $destinationPath = "images/user/";
                $extension = $request->file('avatar')->getClientOriginalExtension();
                $fileName = str_random(32) . '.' . $extension;
                $request->file('avatar')->move($destinationPath, $fileName);

                // standardize the image dimension (optional)
                Image::make($destinationPath.$fileName)->fit(500, 500)->save();

                $user->avatar = '/' . $destinationPath . $fileName;
            }
        }

        if ($user->save()) {
            return redirect('/user/profile')->with('successMessage', 'Your profile has been updated.');
        } else {
            return back()->with('errorMessage', 'Unable to update your profile. Contact admin');
        }
    }

    public function changePassword()
    {
        return view('user.change_password');
    }

    public function updatePassword(UserChangePasswordRequest $request)
    {
        $user = Auth::user();
        $oldPassword = $request->input('old_password');
        $password = $request->input('password');

        // check old password sama tak dengan yang dlm db
        $genuine = Hash::check($oldPassword, $user->password);
        // kalau sama, dia akan return true

        if ($genuine == false) {
            return back()->withInput()->with('errorMessage', 'Miss match old password');
        } else {
            // store new password into database
            $user->password = bcrypt($password);

            if ($user->save()) {
                return back()->with('successMessage', 'Password has been changed successfully.');
            } else {
                return back()->withInput()->with('errorMessage', 'Unable to change password.');
            }
        }
    }

    public function resetPassword($id)
    {
        //cari siapa punya id
        $user = User::findOrFail($id);

        // generate 8 random character
        $randomPassword = str_random(8);
        // change user's password dengan randompassword di atas
        $user->password = bcrypt($randomPassword);

        // data to be sent to user via email
        $data['new_password']  = $randomPassword;
        $data['name']  = $user->name; //field name
        $data['email']  = $user->email;

        //hantar mail
        Mail::send('emails.reset_password', $data, function($message) use ($data)
        {
            $message->from('esijil@mohr.gov.my', "Admin eSijil");
            $message->subject("New Password - System eSijil");
            $message->to($data['email']);
        });

        if ($user->save()) {
            return redirect('/user')->with('successMessage', 'The user password has been reset and an email 
            has been dispatched to the user');
        } else {
            return back()->with('errorMessage', 'Unable to reset password. Contact admin');
        }
    }


}




















