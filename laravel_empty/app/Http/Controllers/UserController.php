<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class UserController extends Controller
{
    function loginpost (Request $request) {
        // 유저 정보 획득
        $result = User::where('user_id', $request->user_id)->first();

        $token = Str::random(60);

        // 데이터베이스에 토큰 저장
        $result->update(['remember_token' => $token]);

        if(!$result || !(Hash::check($request->password, $result->password))) {
            return response()->json([
                'success' => false,
                'message' => '아이디와 비밀번호를 확인해주세요.',
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => '로그인이 성공적으로 수행되었습니다.',
            'cookie' => $token,
            'user_id' => $request->user_id,
        ]);
    }

    public function logout(Request $request)
    {
        // 특정 쿠키 값 가져오기
        $user_id = $request->cookie('user_id');

        $user = User::where('user_id', $user_id)->first();

        $user->update(['remember_token' => null]);

        return response()->json(['message' => '로그아웃 성공']);
    }

    function store (Request $request) {
        Log::debug("============================== 오류 확인 ==============================");
        $data = $request->only('user_id', 'email', 'password', 'password_chk', 'name', 'birthdate', 'phone_number');

        // 비밀번호 암호화
        $data['password'] = Hash::make($data['password']);
        Log::info($request);
        // 회원가입 정보 DB 저장
        $result = User::create($data);

        // 저장된 사용자를 반환하거나 다른 작업을 수행할 수 있습니다.
        // return response()->json(['user' => $user, 'message' => 'User created successfully']);
        Log::debug("============================== 오류 끝 ==============================");
    }
}
