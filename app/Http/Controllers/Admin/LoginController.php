<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;
use URL;
use Illuminate\Support\Facades\Redis;

class LoginController extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality tvalidatorFormo your applications.
    |
    */
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    public function username()
    {
        return 'account';
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    /**
     * 登录失败
     * @param Request $request
     * @return array
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        return ([ 'code' => 1, 'msg' => '会员或密码错误']);
    }



    protected function formError($error)
    {
        $error = $error->all();
        if (count($error) <= 0) return [];
        $error_str = '';
        foreach ($error as $k => $v) {
            $error_str .= $v . "*<br/>";
        }
        return response()->json([ 'code' => 1, 'msg' => $error_str]);
    }

    /**
     * 登录成功
     * @return \Illuminate\Http\JsonResponse
     */
    public function authenticated()
    {
        //更新session_key
        $admin = admin();
        $admin->session_token = Session::getId();
        $admin->last_ip = \request()->getClientIp();
        $admin->login_numbers += 1;
        $admin->save();
        $back_url = '';
        $url = route('admin.home');
        return response()->json(['code' => 200, 'msg' => '登录成功', 'data' => $url]);
    }

    /**
     * 登录页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {

        return $this->display();
    }

    protected function validatorForm($request)
    {
        $message_data = [
            $this->username() . '.required' => '请输入账号',
            'password.required' => '请输入密码',
        ];
        $check_data =
            [
                $this->username() => 'required|string',
                'password' => 'required|string',
                'captcha' => 'required|captcha'
            ];
        $validator = Validator::make($request->all(), $check_data, $message_data);
        if ($validator->fails()) {
            if ($request->ajax() || $request->wantsJson()) {
                return $validator->errors();
            }
        }
        return [];
    }

    protected function sendLockoutResponse(Request $request)
    {
        $seconds = $this->limiter()->availableIn(
            $this->throttleKey($request)
        );
        return response()->json(['error' => 1, 'msg' => '登陆失败次数过多，请'.$seconds.'秒后再重试'  ]);
    }

    public function login(Request $request)
    {
        $error = $this->validatorForm($request);
        if (count($error) > 0) {
            return $this->formError($error);
        };
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        //确定用户是否有太多失败的登录尝试。
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            //太多次返回的信息
            return $this->sendLockoutResponse($request);
        }
        if ($this->attemptLogin($request)) {
            //通过之后响应
            return $this->sendLoginResponse($request);
        }
        //增加登陆尝试次数，默认尝试增加1次
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        return $this->loggedOut($request) ?: redirect()->route('admin.login');
    }
}
