<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BaseController extends Controller
{
    /**
     * The module key.
     *
     * @var array
     */
    protected $moduleKey;

    /**
     * The module name.
     *
     * @var array
     */
    protected $moduleName;

    /**
     * The module view folder path.
     *
     * @var array
     */
    protected $viewFolder;

    /**
     * The module api controller class path.
     *
     * @var array
     */
    protected $apiController;


    public function __construct()
    {
    }

    /**
     * Returns the module view.
     *
     * @param  Request  $request  The request object.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /* fetch all admins from DB */
        // $admins = Admin::all();
        /* returns the fetched admins */
	    // return $admins;
        /* returns the view with admins */
	    // return view('admins', [
        //     'admins' => $admins
        // ]);

        $extraInfo = (method_exists($this, 'getExtraInfo')) ? 
            $this->getExtraInfo($request, true, ['type' => 'list']) : '';

        return view("{$this->viewFolder}.list", [
            'modulekey'  => $this->moduleKey,
            'modulename' => $this->moduleName,
            'permission' => [
                'delete' => admin()->permissionAllowed($this->moduleKey, 'delete'),
                'update' => admin()->permissionAllowed($this->moduleKey, 'update'),
                'create' => admin()->permissionAllowed($this->moduleKey, 'create')
            ],
            'extraInfo'  => $extraInfo
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request  The request object.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $actionRoute = route("api.{$this->moduleName}.store");
        $actionMethod = 'POST';
        $modulePath = $this->viewFolder;
        $extraInfo = (method_exists($this, 'getExtraInfo')) ? $this->getExtraInfo($request) : '';

        return view("{$this->viewFolder}.create", compact('actionRoute', 'actionMethod', 'modulePath', 'extraInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string   $id       The request data id
     * @param  Request  $request  The request object.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $actionRoute = route("api.{$this->moduleName}.update", ['id' => $id]);
        $actionMethod = 'PUT';
        $modulePath = $this->viewFolder;
        $extraInfo = (method_exists($this, 'getExtraInfo')) ? $this->getExtraInfo($request) : '';
        $data = app($this->apiController)->show($id, $request, false);
        Log::channel('activity')->notice('[' . __CLASS__ . ' - ' . __FUNCTION__  . '] ' . 'The data: '. json_encode($data));

        if (!$data) {
            abort(404);
        }

        return view("{$this->viewFolder}.edit", compact('actionRoute', 'actionMethod', 'modulePath', 'extraInfo', 'data'));
    }

    /**
     * This method is to validate the login authentication.
     *
     * @param  Request  $request  The request object.
     * 
     * @return view
     */
    public function login(Request $request)
    {
        // if ($request->isMethod('post')) {
        //     $data = $request->only(['username', 'password']);

        //     $validated = $request->validate([
        //         'username' => ['required', 'string', 'max:50'],
        //         'password' => ['required', 'string', 'max:255'],
        //     ]);
        //     // Log::channel('activity')->info('[' . __CLASS__ . ' - ' . __FUNCTION__  . '] ' . 'data : ' . json_encode($data));
        //     // Log::channel('activity')->info('[' . __CLASS__ . ' - ' . __FUNCTION__  . '] ' . 'validated : ' . json_encode($validated));

        //     if (Auth::guard('admin')->attempt($data)) {
        //         $admin = Auth::guard('admin')->user();
        //         $token = $admin->refreshToken();
        //         if ($token) {
        //             $request->session()->put('api_token', $token);
        //             return redirect()->route('admin.home');
        //         }
        //     } else {
        //         return redirect()->back()->with('error', 'Invalid Username / Password');
        //     }
        // }

        // if (auth('admin')->user()) {
        //     return redirect()->route('admin.home');
        // }

        return view('pages.login');
    }
}
