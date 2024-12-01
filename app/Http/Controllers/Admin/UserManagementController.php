<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\CustomEncrypt;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Repositories\UserManagementRepository;

class UserManagementController extends Controller
{
    //user management route
    use CustomEncrypt;
    protected $sysModuleName = 'user_management';
    protected $url;
    protected $userManagementRepo;

    public function __construct(UserManagementRepository $userManagementRepository)
    {
        $this->userManagementRepo = $userManagementRepository;
        $this->url = \route($this->sysModuleName);
    }

    public function index()
    {
        $userGroup = $this->userManagementRepo->getUserGroup();
        return \view('admin.user-management.index', [
            'userGroup' => $userGroup
        ]);
    }
    /**
     * method get user for datatable
     */
    public function list(Request $request)
    {
        //initialize datatable payload
        $draw = $request['draw'];
        $offset = $request['start'] ? $request['start'] : 0;
        $limit = $request['length'] ? $request['length'] : 15;
        $globalSearch = $request['search']['value'];
        //data
        $query = User::with('userToUserGroup:id,name');
        if ($globalSearch) {
            $query->where('name', 'like', '%' . $globalSearch . '%')
                ->orWhere('email', 'like', '%' . $globalSearch . '%')
                ->orWhereHas('userToUserGroup', function ($q) use ($globalSearch) {
                    $q->where('name', 'like', '%' . $globalSearch . '%');
                });
        }
        //count data & filter data
        $recordsFiltered = $query->count();
        $resData = $query->skip($offset)
            ->take($limit)
            ->get();
        $recordsTotal = $resData->count();

        $data = [];
        $i = $offset + 1;
        $arr = [];
        //convert to array, because datatable using array
        foreach ($resData as $key => $value) {
            $data['rnum'] = $i;
            $data['name'] = $value->name;
            $data['email'] = $value->email;
            if (1 != $value->is_active) {
                $active = '';
            } else {
                $active = 'checked';
            }
            $data['active'] = '<div class="form-check"><input type="checkbox" class="active-user form-check-input" data-active="' . $this->encryptData($value->id) . '" id="cbx-active-user" ' . $active . '></div>';
            $data['verified'] = is_null($value->email_verified_at) ? '<span class="text-success">Verified</span>' : '<span class="text-success">Not verified</span>';
            $data['group'] = $value->userToUserGroup ? $value->userToUserGroup->name : 'Empty data';
            $data['google'] = is_null($value->google_id) ? 'Google account' : 'Non google';
            $data['registered'] = Carbon::parse($value->created_at)->locale('id-ID')->format('l, j F Y ; h:i:s a');
            $arr[] = $data;
            $i++;
        }

        return \response()->json([
            'draw' => $draw,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $arr,
        ]);
    }
    /**
     * method handle register new user
     */
    public function registerNewUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'group_user' => 'required',
            'is_active' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/|same:password_confirmation',
            'password_confirmation' => 'required|string|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/'
        ]);

        if ($validator->fails()) {
            return \response()->json($validator->errors(), 403);
        }
        try {
            //regsiter new user
            $this->userManagementRepo->registerUser($request);
            return \response()->json(['success' => true, 'message' => 'register success'], 200);
        } catch (\Throwable $th) {
            return \response()->json(['success' => \false, 'message' => 'error'], 200);
        }
    }
    /**
     * change user active status
     */
    public function changeUserActive(Request $request)
    {
        $id = $this->decryptData($request->cbxValue);
        try {
            // change user active
            $this->userManagementRepo->setUserActive($id, $request->acValue);
            return \response()->json(['success' => true, 'message' => 'change activation success'], 200);
        } catch (\Throwable $th) {
            return \response()->json(['success' => false, 'message' => 'error!'], 500);
        }
    }
}
