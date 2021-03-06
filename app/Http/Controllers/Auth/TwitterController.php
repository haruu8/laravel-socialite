<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Suppport\Facades\Log;

class TwitterController extends Controller
{
    /**
      * Twitterの認証ページヘユーザーをリダイレクト
      *
      * @return \Illuminate\Http\Response
      */
    public function redirectToProvider(){
        return Socialite::driver('twitter')->redirect();
    }
    /**
      * Twitterからユーザー情報を取得(Callback先)
      *
      * @return \Illuminate\Http\Response
    */
    public function handleProviderCallback() {
        $user = Socialite::driver('twitter')->user();
        Log::info('Twitterから取得しました。', ['user' => $user]);
         // $user->token;
    }
}
