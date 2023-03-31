<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends BaseController
{
    public function getUser()
    {
        try {
            $user = Auth::user();
            if (!$user)
                return $this->sendError('User Details Not Found');

            $success['user'] = $user->only(['name', 'email']);

        } catch (\Throwable $th) {
            return $this->sendError('Something Went Wrong', $th, 500);
        }
        return $this->sendResponse($success, 'User Details.');

    }

}