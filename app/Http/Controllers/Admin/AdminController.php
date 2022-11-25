<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Admin;
use App\Models\Division;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth,Log};

class AdminController extends BaseController
{

    public function __construct()
    {
        $this->moduleKey = 'admin';
        $this->moduleName = 'admin';
        $this->viewFolder = 'admin.pages.admin';
        $this->apiController = 'App\Http\Controllers\Api\AdminController';

        parent::__construct();
    }

    /**
     * This method is to return to the home view.
     *
     * @param  Request  $request  The request object.
     * 
     * @return view
     */
    public function home(Request $request)
    {
        return view('admin.pages.home');
    }

    /**
     * This method is to allow the admin change password.
     *
     * @param  Request  $request  The request object.
     * 
     * @return view
     */
    public function changePassword(Request $request)
    {
        $actionRoute = route("api.{$this->moduleName}.change-password");
        $actionMethod = 'POST';

        return view('change-password', compact('actionRoute', 'actionMethod'));
    }

    /**
     * This method is to validate the admin login authentication.
     *
     * @param  Request  $request  The request object.
     * 
     * @return view
     */
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->only(['username', 'password']);

            $validated = $request->validate([
                'username' => ['required', 'string', 'max:50'],
                'password' => ['required', 'string', 'max:255'],
            ]);
            // Log::channel('activity')->info('[' . __CLASS__ . ' - ' . __FUNCTION__  . '] ' . 'data : ' . json_encode($data));
            // Log::channel('activity')->info('[' . __CLASS__ . ' - ' . __FUNCTION__  . '] ' . 'validated : ' . json_encode($validated));

            if (Auth::guard('admin')->attempt($data)) {
                $admin = Auth::guard('admin')->user();
                $token = $admin->refreshToken();
                if ($token) {
                    $request->session()->put('api_token', $token);
                    return redirect()->route('admin.home');
                }
            } else {
                return redirect()->back()->with('error', 'Invalid Username / Password');
            }
        }

        if (auth('admin')->user()) {
            return redirect()->route('admin.home');
        }

        return view('admin.login');
    }

    /**
     * This method is to run the admin logout.
     *
     * @param  Request  $request  The request object.
     * *
     * @return view
     */
    public function logout(Request $request)
    {
        $admin = $request->user();

        if ($admin) {
            $admin->api_token = null;
            
            if ($admin->save()) {
                $request->session()->flush();
                return redirect()->route('admin.login');
            }
        }
    }

    /**
     * This method is to retrieve additional information for the view.
     * 
     * @param  Request  $request    The request object.
     * @param  boolean  $isDefault  If loaded for the default page, then True; otherwise, False.
     * @param  array    $optional   The optional information to be applied.
     * 
     * @return array
     */
    public function getExtraInfo(Request $request, bool $isDefault = true, array $optional = []) 
    {
        if ($isDefault) {
            return [
                'site' => (new Site())->getChoices(),
            ];
        }

        return [];
    }
}
