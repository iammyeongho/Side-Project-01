<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class MyUserValidation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        Log::debug("============================== 오류 확인 ==============================");
        // Log::debug("****************** 유저 유효성 체크 시작 ******************");
        // Log::debug("값 :" .$request);
        $arrBaseKey = [
            'user_id'
            ,'email'
            ,'password'
            ,'password_chk'
            ,'name'
            ,'phone_number'
            ,'birthdate'
        ];

        $arrBaseValidation = [
            'user_id' => 'regex:/^[a-z0-9]{4,16}$/'
            ,'email' => 'regex:/^\S+@\S+\.\S+$/'
            ,'password' => 'required|string|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'
            ,'password_chk' => 'required|string|same:password'
            ,'name' => 'required|regex:/^[a-zA-Z가-힣]+$/|min:2|max:50'
            ,'phone_number' => 'required|string|min:10|regex:/^\d+$/'
            ,'birthdate' => 'required|date_format:Y-m-d'
        ];

        $arrRequestParam = [];

        Log::debug("****************** foreach 시작 ******************");
        foreach($arrBaseKey as $val) {
            Log::debug("항목 :" .$val);
            if($request->has($val)) {
                $arrRequestParam[$val] = $request->$val;
            } else {
                // 배열 안에 없는 값은 바리데이션에서 제거
                unset($arrBaseValidation[$val]);
            }
            Log::debug("리퀘스트 파라미터 획득", $arrRequestParam);
            Log::debug("유효성 체크 리스트 획득", $arrBaseValidation);
        }
        Log::debug("****************** foreach 끝 ******************");

        // 유효성 검사 | regex(정규식)
        $validator = Validator::make($arrRequestParam, $arrBaseValidation);
        
        if ($validator->fails()) {
            $errors = [];
            foreach ($validator->errors()->messages() as $field => $messages) {
                $errors[$field] = $messages[0]; // 첫 번째 오류 메시지만 사용
                Log::error("Validation error for field '$field': " . implode(', ', $messages));
            }
        
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $errors,
            ], 400);
        }

        Log::debug("****************** 유저 유효성 체크 종료 ******************");
        return $next($request);
    }
}
