<?php

namespace App\Controllers;


use App\Models\UserModel;

class Users extends BaseController
{
    public function __construct()
    {
        $this->user_model = model(UserModel::class);
    }

    public function index(): string
    {
        $data = [
            'users' => $this->user_model->get_users(),
            'title' => 'Users'
        ];

        return view('users', $data);
    }

    public function add()
    {
        helper('form');

        $data = [
            'title' => 'Add user'
        ];

        if ($this->request->is('post')) {
            $form_data = [
                'name' => $this->request->getPost('name', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'email' => $this->request->getPost('email', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'password' => $this->request->getPost('password', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'money' => $this->request->getPost('money', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            ];
            $this->user_model->insert($form_data);
            return redirect()->to('users');
        }

        return view('user', $data);
    }

    public function edit($id)
    {
        helper('form');

        $data = [
            'title' => 'Edit user',
            'user' => $this->user_model->find($id),
        ];

        if ($this->request->is('post')) {
            $form_data = [
                'name' => $this->request->getPost('name', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'email' => $this->request->getPost('email', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'password' => $this->request->getPost('password', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'money' => $this->request->getPost('money', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            ];
            $this->user_model->update($id, $form_data);
            return redirect()->to('users');
        }

        return view('user', $data);
    }

    public function delete($id)
    {
        if (is_numeric($id)) {
            $this->user_model->delete($id);
        }

        return redirect()->to('users');
    }
}
