<?php

namespace App\Controllers;

use App\Models\Image;
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
        $images = [];
        if($page == 'about') {
            $images = model(Image::class)->getImageData();
        }

        return view('pages/' . $page, ['page' => $page, 'images' => $images]);
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
        if (!$this->validateData([], $validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];
        }

        $images = $this->request->getFiles();
        // $img = $this->request->getFile('image');

        foreach ($images['image'] as $key => $img) {
            $data['type'] = $this->request->getPost('name');
            // $data['type'] = $img->getClientExtension();
            
            if ($img->isValid() && !$img->hasMoved()) {
                // Define the public path
                $publicPath = FCPATH . 'uploads/image/';
                
                // Ensure the directory exists
                if (!is_dir($publicPath)) {
                    mkdir($publicPath, 0777, true);
                }
                
                // Move the file to the public path
                $newName = $img->getRandomName();
                $data['name'] = $newName;
                $img->move($publicPath, $newName);
        
                $filepath = $publicPath . $newName;
        
                if (file_exists($filepath)) {
                    $data['path'] = 'uploads/image/' . $newName;
                    $data['uploaded_fileinfo'] = new File($filepath);
        
                    // $filepath = WRITEPATH . $img->store('image/');
                    // $data = ['uploaded_fileinfo' => new File($filepath)];

                    // Assuming Image is a model responsible for storing image data
                    $ImageModel = new Image();
                    $ImageModel->storeImagePath($data);
                } else {
                    echo 'File move failed: file does not exist at the expected location.';
                }
            }
        }


        // foreach ($imges['image'] as $key => $img) {

        //     $data['name'] = $this->request->getPost('name');
        //     $data['type'] = $img->getClientExtension();

        //     if ($img->isValid() && !$img->hasMoved()) {
        //         $filepath = FCPATH . 'uploads/image/' . $img->getName();
                

        //         if (file_exists($filepath)) {
        //             $data = ['uploaded_fileinfo' => new File($filepath)];

        //             $data['path'] = '/uploads/image/' . $img->getName();
        //             $ImageModel = new Image();
        //             $ImageModel->storeImagePath($data);

        //         } else {
        //             echo 'File move failed: file does not exist at the expected location.';
        //         }
                
        //     }


        //         $filepath = WRITEPATH . $img->store('image/');
        //         $data = ['uploaded_fileinfo' => new File($filepath)];
        // }



        $data = ['errors' => 'The file has already been moved.'];

        // $data = $this->request->getPost();
        // $userModel = model(User::class);
        // $userModel->add_user($data);

        return redirect()->to('/page/about/');
    }
}
