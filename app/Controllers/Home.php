<?php

namespace App\Controllers;

use App\Models\User;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Files\File;
use CodeIgniter\HTTP\Request;

class Home extends BaseController
{

    protected $helpers = ['form'];


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

        $validationRule = [
            'image' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[image]',
                    'is_image[image]',
                    'mime_in[image,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[image,200]',
                    'max_dims[image,1024,768]',
                ],
            ],
        ];
        if (! $this->validateData([], $validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];

            
        }

        $img = $this->request->getFile('image');


        if (! $img->hasMoved()) {
            $filepath = WRITEPATH . $img->store('image/');

            $data = ['uploaded_fileinfo' => new File($filepath)];
            dd($filepath);
            // return view('upload_success', $data);
        }

        $data = ['errors' => 'The file has already been moved.'];

        // $data = $this->request->getPost();
        // $userModel = model(User::class);
        // $userModel->add_user($data);

        return redirect()->route('/');
    }
}
