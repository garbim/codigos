<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Services\API\Users\UserService;

class RegisterController extends BaseController
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        try {
            $success = $this->userService->create($request->all());

            return $this->sendResponse($success, 'User register successfully.');
        } catch (\Throwable $th) {
            return $this->sendError($th->getMessage(), 'User register error.');
        }
    }


    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        try {
            $success = $this->userService->login($request->all());
            return $this->sendResponse($success, 'User login successfully.');
        } catch (\Throwable $th) {
            return $this->sendError($th->getMessage(), 'User register error.');
        }
    }
}
