<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'User Logout Successfully',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    } // End Method

    public function profile(){
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view', compact('adminData'));
    }

    public function EditProfile(){
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('admin.admin_profile_edit', compact('editData'));
    }

    public function StoreProfile(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;

        if ($request->file('profile_image')){
            $file = $request->file('profile_image');

            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['profile_image'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'

        );

        return redirect()->route('admin.profile')->with($notification);
    }

    public function ChangePassword(){
        return view('admin.admin_change_password');
    }

    public function UpdatePassword(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword)){
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();

            session()->flash('message', 'Password Updated Successfully');
            return redirect()->back();
        }else{
            session()->flash('message', 'Old Password is not match');
            return redirect()->back();
        }
    }

    /////////////////// Admin User All Method ///////////////////

    public function AllAdmin(){
        $alladminuser = User::latest()->get();
        return view('backend.admin.all_admin', compact('alladminuser'));
    }

    public function AddAdmin(){

        $roles = Role::all();
        return view('backend.admin.add_admin',compact('roles'));
    }

    public function StoreAdmin(Request $request){

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $notification = array(
            'message' => 'New Admin User Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.admin')->with($notification);  

    }

    public function EditAdmin($id){

        $roles = Role::all();
        $adminuser = User::findOrFail($id);
        return view('backend.admin.edit_admin',compact('roles','adminuser'));

    }

    public function UpdateAdmin(Request $request){

        $admin_id = $request->id;

        $user = User::findOrFail($admin_id);
        $user->name = $request->name;
        $user->username = $request->username; 
        $user->email = $request->email;
        $user->save();

        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $notification = array(
            'message' => 'Admin User Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.admin')->with($notification);  

    }

    public function DeleteAdmin($id){

        $user = User::findOrFail($id);
        if (!is_null($user)) {
            $user->delete();
        }

        $notification = array(
            'message' => 'Admin User Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    }
}
