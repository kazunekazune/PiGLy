<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterStep1Request;
use App\Http\Requests\RegisterStep2Request;
use App\Models\User;
use App\Models\WeightTarget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Show step 1 of registration (user info).
     *
     * @return \Illuminate\Http\Response
     */
    public function showStep1()
    {
        return view('auth.register_step1');
    }

    /**
     * Store step 1 data and redirect to step 2.
     *
     * @param  \App\Http\Requests\RegisterStep1Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeStep1(RegisterStep1Request $request)
    {
        // セッションにユーザー情報を保存
        session([
            'register_name' => $request->name,
            'register_email' => $request->email,
            'register_password' => $request->password,
        ]);

        return redirect()->route('register.step2');
    }

    /**
     * Show step 2 of registration (weight info).
     *
     * @return \Illuminate\Http\Response
     */
    public function showStep2()
    {
        // セッションにユーザー情報がない場合はstep1に戻る
        if (!session('register_name')) {
            return redirect()->route('register.step1');
        }

        return view('auth.register_step2');
    }

    /**
     * Store step 2 data and create user account.
     *
     * @param  \App\Http\Requests\RegisterStep2Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeStep2(RegisterStep2Request $request)
    {
        // セッションにユーザー情報がない場合はstep1に戻る
        if (!session('register_name')) {
            return redirect()->route('register.step1');
        }

        // メールアドレスのユニークチェック
        if (\App\Models\User::where('email', session('register_email'))->exists()) {
            return redirect()->route('register.step1')
                ->withErrors(['email' => 'このメールアドレスは既に使用されています'])
                ->withInput([
                    'name' => session('register_name'),
                    'email' => session('register_email'),
                ]);
        }

        // ユーザーを作成
        $user = User::create([
            'name' => session('register_name'),
            'email' => session('register_email'),
            'password' => Hash::make(session('register_password')),
        ]);

        // 目標体重を作成
        WeightTarget::create([
            'user_id' => $user->id,
            'target_weight' => $request->target_weight,
        ]);

        // 初期体重ログを作成
        $user->weightLogs()->create([
            'date' => now()->format('Y-m-d'),
            'weight' => $request->current_weight,
            'calories' => 0,
            'exercise_time' => '00:00:00',
            'exercise_content' => '',
        ]);

        // セッションをクリア
        session()->forget(['register_name', 'register_email', 'register_password']);

        // 自動ログイン
        Auth::login($user);

        return redirect()->route('weight_logs.index')
            ->with('success', 'アカウントを作成しました');
    }
}
