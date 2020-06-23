<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User as UserRequest;
use App\Repositories\Interfaces\AdminInterface;

class UserController extends Controller
{
    private $model;

    public function __construct(AdminInterface $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return view('admin.user.index');
    }

    public function show($user)
    {
        $user = $this->model->userShow($user);
        return view('admin.user.edit', compact('user'));
    }

    public function update(UserRequest $request, $user)
    {
        $this->model->userUpdate($request, $user);
        return view('admin.user.index')->withStatus('Update Success');
    }

    public function destroy($user)
    {
        $this->model->userDelete($user);
    }
}
