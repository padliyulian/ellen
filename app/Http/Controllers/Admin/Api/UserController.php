<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\Datatables;

class UserController extends Controller
{
    public function index()
    {
        $user = User::query();

        return DataTables::of($user)
        ->addColumn('action', function ($user) {
            return view('admin.user.action', [
                'user' => $user,
                'url_edit' => route('user-admin.show', $user->id),
                'url_destroy' => route('user-admin.destroy', $user->id)
            ]);
        })
        ->addIndexColumn()
        ->rawColumns(['action'])
        ->make(true);
    }
}
