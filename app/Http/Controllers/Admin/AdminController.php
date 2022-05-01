<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\Admin;
use Image;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function updateAdminPassword(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
            // echo "<pre>"; print_r($data); die;
            if(Hash::check($data['current_password'],Auth::guard('admin')->user()->password)){
                if($data['confirm_password']==$data['new_password']){
                    Admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['new_password'])]);
                    return redirect()->back()->with('success_message','Pasword berhasil diganti!');
                }else{
                    return redirect()->back()->with('error_message','Pasword baru dan konfirmasi password tidak cocok!');
                }
            }else{
                return redirect()->back()->with('error_message','Pasword saat ini salah!');
            }
        }
        $adminDetails = Admin::where('email',Auth::guard('admin')->user()->email)->first()->toArray();
        return view('admin.settings.update_admin_password')->with(compact('adminDetails'));
    }

    public function checkAdminPassword(Request $request){
        $data = $request->ALL();
        // echo "<pre>"; print_r($data);die;
        if(Hash::check($data['current_password'],Auth::guard('admin')->user()->password)){
            return "true";
        }else{
            return "false";
        }
    }

    public function updateAdminDetails(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $rules = [
                'admin_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'admin_mobile' => 'required|numeric',
            ];
            $customMessage = [
                'admin_name.required' => 'Nama Harus Diisi!',
                'admin_name.regex' => 'Nama Harus Valid!',
                'admin_mobile.required' => 'Nomor Telepon Harus Diisi!',
                'admin_mobile.numeric' => 'Nomor Telepon Harus Valid!',
            ];
            $this -> validate($request,$rules,$customMessage);

            if($request->hasFile('admin_image')){
                $image_tmp = $request->file('admin_image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();

                    $imageName = rand(111,99999).'.'.$extension;
                    $imagePath = 'admin/images/photos/'.$imageName;

                    Image::make($image_tmp)->save($imagePath);
                }
            }elseif(!empty($data['current_admin_image'])){
                $imageName = $data['current_admin_image'];
            }else{
                $imageName = "";
            }

            Admin::where('id',Auth::guard('admin')->user()->id)->update(['name'=>$data['admin_name'], 'mobile'=>$data['admin_mobile'], 'image'=>$imageName]);
            return redirect()->back()->with('success_message','Detail admin telah berhasil diupdate!');
        }
        return view('admin.settings.update_admin_details');
    }
    public function updateVendorDetails($slug){
        if($slug=="personal"){

        }else if($slug=="business"){

        }else if($slug=="bank"){

        }
        return view('admin.settings.update_vendor_details')->with(compact('slug'));
    }
    public function login(Request $request){
        //echo $password = Hash::make('123456'); die;
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required',
            ];

                $customMessage = [
                    'email.required' => 'Email harus diisi',
                    'email.email' => 'Pastikan format email benar',
                    'password.required' => 'Password harus diisi',
                ];

                $this->validate($request,$rules,$customMessage);

            if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password'],'status'=>1])){
                return redirect('admin/dashboard');
            }else{
                return redirect()->back()->with('error_message','Invalid Email or Password');
            }
        }
        return view('admin.login');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}
