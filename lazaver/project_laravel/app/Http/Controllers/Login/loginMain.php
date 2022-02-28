<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Models\Social;
use App\Models\users;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class loginMain extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // LOGIN GG
    public function loginGoogleApi()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callback_googleApi()
    {
        $users = Socialite::driver('google')->stateless()->user();
        
        return $this->findOrCreateUser($users, 'google');
    }
    public function findOrCreateUser($users, $provider)
    {
        $authUser = Social::where('provider_user_id', $users->id)->first();
        if ($authUser) {
            $account_name = users::where('id', $authUser->user)->get();
            session(['user' => $account_name]);
            return redirect(route('trangchu'));
        }
        $dataUser = new Social([
            'provider_user_id' => $users->id,
            'provider' => strtoupper($provider)
        ]);
        $orang = users::where('email', $users->email)->first();
        if (!$orang) {
            $orang = users::create([
                'name' => $users->name,
                'email' => $users->email,
                'matkhau' => NULL,
                'address' => NULL,
                'img' => $users->avatar,
                'sdt' => NULL,


            ]);
        }
        $dataUser->login()->associate($orang);
        $dataUser->save();
        $authUser = Social::where('provider_user_id', $users->id)->first();
        $account_name = users::where('id', $authUser->user)->get();
        session(['user' => $account_name]);
        return redirect(route('trangchu'));
    }

    public function index(Request $request)
    {
        if ($request->session()->has('user')) {
            $request->session()->forget('user');
        }
        return view('Login.login');
    }
    public function login(Request $request)
    {


        $request->validate([
            'email' => 'required|email',
            'pass' => 'required'

        ], [
            'email.required' => 'Bạn đang bỏ trống email',
            'email.email' => 'Sai định dạng email',
            'pass.required' => 'Mật Khẩu đang bỏ trống',


        ]);

        //   dd($request->all());
        $checkTk = users::where('email', $request->email)->get();
        //    dd($checkTk);
        if (isset($checkTk[0]) && !empty($checkTk[0])) {
            if (Hash::check($request->pass, $checkTk[0]->matkhau)) {
                $request->session()->put('user', $checkTk);
                return redirect(route('trangchu'));
            } else {
                return redirect(route('login.index'))->with('error', 'Sai mật khẩu hoặc tài khoản');
            }
        } else {
            return redirect(route('login.index'))->with('error', 'Sai mật khẩu hoặc tài khoản');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Login.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            // dd($request->image);
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('backend/img'), $filename);
            $request->merge(['img' => $filename]);
        }
        $request->merge(['matkhau' => Hash::make($request->pass)]);
        // dd($request->all());
        $request->validate([
            'name' => "required",
            'img' => "required",
            'email' => 'required|email',
            'address' => 'required',
            'sdt' => 'required|min:9|max:11',
            'matkhau' => 'required|min:6'

        ], [
            'name.required' => 'Bạn đang bỏ trống tên',
            'img.required' => 'Bạn đang bỏ trông ảnh',
            'email.required' => 'Bạn đang bỏ trống email',
            'email.email' => 'Sai định dạng email',
            'address.required' => 'Bạn đang bỏ trống địa chỉ',
            'sdt.required' => 'Bạn đang bỏ trống sdt',
            'sdt.min' => 'Sai số điện thoại',
            'sdt.max' => 'Sai số điện thoại',

            'matkhau.required' => 'Mật Khẩu đang bỏ trống',
            'matkhau.min' => 'Mật khẩu quá ngắn',

        ]);
        $checkemail = users::where('email', $request->email)->get();
        if (
            count($checkemail) >= 1
        ) {
            return redirect(route('login.create'))->with('error', 'Email Đã Tồn tại');
        }
        if (users::create($request->all())) {
            return redirect(route('login.create'))->with('success', 'Đăng Kí thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(users $users, Request $request)
    {
        dd($request->all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, users $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(users $users)
    {
    }
}
