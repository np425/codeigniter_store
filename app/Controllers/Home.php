<?php

namespace App\Controllers;


use App\Models\UserModel;

// TODO: Copy stuff from prekyba

class Home extends BaseController
{
    public function __construct()
    {
        $this->users_model = model(UserModel::class);
    }

    public function index(): string
    {
        $data = [
            'users' => $this->users_model->findAll()
        ];
        return view('welcome_message', $data);
    }
}
