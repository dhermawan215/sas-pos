<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SysUserGroup;
use App\Repositories\UserGroupRepository;
use Illuminate\Support\Facades\Validator;
use App\Traits\CustomEncrypt;

class UserGroupController extends Controller
{
    use CustomEncrypt;
    protected $sysMenu = 'user_group';
    protected $userGroupRepo;

    public function __construct(UserGroupRepository $userGroupRepository)
    {
        $this->userGroupRepo = $userGroupRepository;
    }

    public function index()
    {
        return \view('admin.user-group.index');
    }
    /**
     * store the data from request user
     */
    public function store(Request $request)
    {
        //check user input with validation
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return \response()->json($validator->errors(), 403);
        }

        $data = [
            'name' => $request->name,
            //created by can be modified when authenticated already implements
            // the real value is Auth::user()->name
            'created_by' => \null,
        ];

        try {
            $this->userGroupRepo->saveData($data);
            return \response()->json(['success' => true, 'message' => 'Data saved!'], 200);
        } catch (\Throwable $th) {
            return \response()->json(['success' => true, 'message' => 'Error, please try again!'], 500);
        }
    }
    /**
     * method for datatable
     */
    public function list(Request $request)
    {
        $draw = $request['draw'];
        $offset = $request['start'] ? $request['start'] : 0;
        $limit = $request['length'] ? $request['length'] : 15;
        $globalSearch = $request['search']['value'];

        $query = SysUserGroup::select('*');

        if ($globalSearch) {
            $query->where('name', 'like', '%' . $globalSearch . '%');
        }

        $recordsFiltered = $query->count();

        $resData = $query->skip($offset)
            ->take($limit)
            ->get();

        $recordsTotal = $resData->count();

        $data = [];
        $i = $offset + 1;
        $arr = [];

        foreach ($resData as $key => $value) {
            // $data['cbox'] = '';
            $data['cbox'] = '<input type="checkbox" class="form-check-input data-menu-cbox" value="' . $value->id . '">';
            $data['rnum'] = $i;
            $data['name'] = $value->name;
            $data['action'] = '<button class="btn btn-sm btn-primary btn-edit-user-group rounded-2" data-vx="' . $this->encryptData($value->id) . '" data-bs-toggle="modal" data-bs-target="#modal-edit-user-group"><i class="bi bi-pencil-square"></i></button>';
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
     * method edit data
     */
    public function edit(Request $request)
    {
        $id = $this->decryptData($request->vx);
        try {
            $response = $this->userGroupRepo->getDataforEdit($id);
            $responseData = [
                'name' => $response->name,
                'v' => $request->vx,
            ];
            return \response()->json(['success' => true, 'data' => $responseData, 'message' => 'success'], 200);
        } catch (\Throwable $th) {
            return \response()->json(['success' => true, 'data' => null, 'message' => 'error'], 500);
        }
    }
    /**
     * update data user group
     */
    public function update(Request $request)
    {
        //check user input with validation
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return \response()->json($validator->errors(), 403);
        }
        //contain the data for update process
        $data = [
            'id' => $this->decryptData($request->xValue),
            'name' => $request->name,
        ];
        try {
            $this->userGroupRepo->updateData($data);
            return \response()->json(['success' => true, 'message' => 'success'], 200);
        } catch (\Throwable $th) {
            return \response()->json(['success' => false, 'message' => 'error'], 500);
        }
    }
    /**
     * delete the data user group
     */
    public function delete(Request $request)
    {
        $id = $request->no;
        try {
            $this->userGroupRepo->deleteData($id);
            return \response()->json(['success' => true, 'message' => 'success'], 200);
        } catch (\Throwable $th) {
            return \response()->json(['success' => false, 'message' => 'error'], 500);
        }
    }
}
