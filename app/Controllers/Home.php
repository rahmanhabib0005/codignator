<?php

namespace App\Controllers;

use App\Models\User;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\Request;

class Home extends BaseController
{
    public function index(): string
    {
        helper(['version_helper']);
        // return ci_version();
        $data['users'] = model(User::class)->getUsersData();
        $data['title'] = 'Home';
        return view('welcome', $data);
    }

    public function view(string $page = 'home')
    {
        if (!is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            throw new PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        // return view('templates/header', $data)
        //     . view('pages/' . $page)
        //     . view('templates/footer');

        return view('pages/' . $page, ['page' => $page]);
    }

    public function store()
    {
        $data = $this->request->getPost();
        $userModel = model(User::class);
        $userModel->add_user($data);

        return redirect()->route('/');
    }
}
