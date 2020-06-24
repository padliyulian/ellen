<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User as UserRequest;
use App\Services\UserService;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view('admin.user.index');
    }

    public function show($user)
    {
        $user = $this->userService->userShow($user);
        return view('admin.user.edit', compact('user'));
    }

    public function update(UserRequest $request, $user)
    {
        $this->userService->userUpdate($request, $user);
        return view('admin.user.index')->withStatus('Update Success');
    }

    public function destroy($user)
    {
        return $this->userService->userDelete($user);
    }
}
