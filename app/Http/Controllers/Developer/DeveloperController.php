<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Log};

class DeveloperController extends BaseController
{

    public function __construct()
    {
        $this->moduleKey = 'developer';
        $this->moduleName = 'developer';
        $this->viewFolder = 'pages.developer';
        $this->apiController = 'App\Http\Controllers\Api\DeveloperController';

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
        return view('pages.developer.home');
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
        return parent::login($request);
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
                return redirect()->route('pages.login');
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
            ];
        }

        return [];
    }
}
