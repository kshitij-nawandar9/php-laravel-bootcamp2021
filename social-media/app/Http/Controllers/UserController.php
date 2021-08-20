<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User\Service;

class UserController extends Controller
{
    private $userService;

    public function __construct()
    {
        $this->userService = new Service();
    }

    public function addUser(Request $request)
    {
        return $this->userService->addUser($request);
    }

    public function getAllUsers()
    {
        return $this->userService->getAllUsers();
    }

    public function getUserById($id)
    {
        return $this->userService->getUserById($id);
    }
}
