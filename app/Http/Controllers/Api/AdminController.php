<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\RestfulController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Log, Validator};

class AdminController extends RestfulController
{

    public function __construct()
    {
        $this->moduleKey = 'admin';
        $this->moduleName = 'admin';
        $this->model = 'App\Models\Admin';
        $this->resource = 'App\Resources\Admin';
        
        parent::__construct();
    }
    
    /**
     * This method is to update the admin password by request.
     *
     * @param  Request  $request  The request object.
     *
     * @return collections  The result of the updated password action
     */
    public function changePassword(Request $request)
    {
        // Log::channel('activity')->notice('[' . __CLASS__ . ' - ' . __FUNCTION__  . '] ' . 'The api admin change password is initiated.');
        
        $admin = $request->user();

        if (!$admin) {
            return $this->error(401, 'Permission Denied');
        }

        $validator = Validator::make($request->all(), [
            'current_password' => ['required', 'password_match:' . $admin->password],
            'new_password'     => ['required', 'min:6', 'max:255', 'different:current_password'],
            'confirm_password' => ['required', 'same:new_password'],
        ]);

        if ($validator->fails()) {
            Log::channel('activity')->error('[' . __CLASS__ . ' - ' . __FUNCTION__  . '] ' . 'The admin password did not match with the database data.');
            return $this->error(422, 'Invalid Parameters', $validator->errors()->getMessages());
        }
        Log::channel('activity')->debug('[' . __CLASS__ . ' - ' . __FUNCTION__  . '] ' . 'Validated successfully.');

        $admin->password = $request->get('new_password');

        if ($admin->save()) {
            Log::channel('activity')->notice('[' . __CLASS__ . ' - ' . __FUNCTION__  . '] ' . 'The admin password was updated successfully.');
            return $this->responseWithMessage(200, 'Password successfully updated.');
        }

        return $this->error('500', 'Internal Error');
    }
}
