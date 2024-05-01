<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index()
    {
        $lstPrd = Product::orderBy('updated_at', 'desc')->paginate(5);
        
        $data = [
            'lstPrd' => $lstPrd
        ];
        return view('admin.index', $data);
    }
    public function login()
    {
        return view('admin.login');
    }
    public function register()
    {
        return view('layouts.register');
    }
    public function store(RegisterRequest $request)
    {

        $data = [
            'name' => '',
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];

        try{
            User::create($data);
        } catch(\Exception $e) {
            Log::error($e->getMessage().' - '.$e->getLine(). ' - ' .$e->getFile());
            return redirect()->back()->with('error', 'Đăng ký thất bại');
        }


        return redirect()->route('login')->with('success', 'Login Success');
    }
    public function auth(Request $request)
    {
        $remember = $request -> has('remember') ? true : false;
        $data = [
            'username' => $request->username,
            'password' => $request->password
        ];
        if(auth()->attempt($data, $remember)){
            $user = auth()->user();
            if($user->type != 'admin'){
                return redirect()->route('home.index');
            }
            return redirect()->route('admin.index');
        }
        return redirect()->back()->with('error', 'Đăng nhập thất bại');
    }

    public function createToken()
    {
        return view('admin.token');
    }
    public function storeToken(Request $request)
    {
        $user = auth()->user();
        $token_name = $request->token_name;
        $token = $user->createToken($token_name);
        dd($token->plainTextToken, $token->accessToken);
        // return redirect()->back()->with('token', $token);
    }
}
