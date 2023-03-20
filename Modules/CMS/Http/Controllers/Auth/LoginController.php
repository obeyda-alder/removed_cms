<?php

namespace Modules\CMS\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\JsonResponse;
use App\Helpers\HttpRequests;
use Illuminate\Database\Events\ModelsPruned;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class LoginController extends Controller
{
    use HttpRequests;
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->redirectTo = route('cms::dashboard');
    }
    public function showLoginForm (Request $request)
    {
        try {
            return view('cms::backend.auth.login');
        } catch (\Exception $e) {

            $msg = ( \Lang::has( $e->getMessage() ) )
                 ? __( $e->getMessage() )
                 : __('cms::base.error_login_to_account');

            return redirect()->back()->with('result', [
                'success' => false,
                'type' => 'danger',
                'strong' => __('cms::base.error'),
                'msg'  => $msg
            ]);
        }
    }
    public function login(Request $request)
    {
        // dd(session()->get('_token'));
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $conn = $this->post('auth/login', $data);
        $user = new User($conn['data']['user']);
        $auth = Auth::login($user);
        // $request->session()->regenerate();
        // return redirect()->route('cms::dashboard');
    }
}
