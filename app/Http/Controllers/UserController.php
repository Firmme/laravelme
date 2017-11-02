<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\User;

class UserController extends Controller
{
    //个人设置页面
    public function setting(User $user)
    {
        return view('user.setting');
    }

    public function settingStore()
        {

        }

    //个人设置行为
    public function profile(User $user)
    {
        //返回个人信息 包括关注/粉丝/文章数
        $user = User::withCount(['stars','fans','posts'])->find($user->id);
        $posts = $user->posts()->orderBy('created_at','desc')->take(10)->get();
        //关注的用户,粉丝列表
        $fans = $user->fans;
        $fusers = User::whereIn('id',$fans->pluck('fan_id'))->withCount(['stars','fans','posts'])->get();
        //文章列表,关注者文章
        $stars = $user->stars;
        $susers = User::whereIn('id',$fans->pluck('star_id'))->withCount(['stars','fans','posts'])->get();
        return view('user/profile',compact('user','posts','susers','fusers'));
    }

    public function fan()
    {
        return;
    }

    public function unfan()
    {
        return;
    }
}
