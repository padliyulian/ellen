<?php

namespace App\Services;

use App\Repositories\Interfaces\AdminInterface;

class UserService
{
    private $admin;

    public function __construct(AdminInterface $admin)
    {
        $this->admin = $admin;
    }

    public function userList()
    {
        return $this->admin->userList();
    }

    public function userShow($user)
    {
        return $this->admin->userShow($user);
    }

    public function userUpdate($request, $user)
    {
        return $this->admin->userUpdate($request, $user);
    }

    public function userDelete($user)
    {
        return $this->admin->userDelete($user);
    }
}    