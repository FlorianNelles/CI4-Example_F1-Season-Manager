<?php

namespace App\Controllers;
use App\Models\Post_model;
use App\Models\User_model;

class Posts extends BaseController
{


    public function index()
    {
        $post_model = new Post_model();
        $user_model = new User_model();





        $data['posts'] = $post_model->orderBy('created_at', 'desc');
        $data['posts'] = $post_model->paginate(3);
        $data['pager'] = $post_model->pager;
        $data['users'] = $user_model->findAll();


        echo view('templates/header');
        echo view('posts/index', $data);
        echo view('templates/footer');
    }

    public function view($id = NUll){
        $post_model = new Post_model();
        $user_model = new User_model();

        $data['post'] = $post_model->find($id);
        if(empty($data['post'])){
            show_404();
        }

        $data['title'] = $data['post']['title'];
        $data['posts'] = $user_model->findAll();
        $data['users'] = $user_model->findAll();

        echo view('templates/header');
        echo view('posts/view', $data);
        echo view('templates/footer');
    }

    public function create(){


        $session = \Config\Services::session();
        if (!$session->get('logged_in')){
            $session->setFlashdata('no_login', lang('flashdata.no_login'));
            return redirect()->route('users/login');
        }
        $data['isPost'] = $this->request->getMethod()=='post';

        helper(['form', 'url']);
        $input = $this->validate([
            'title' => 'required',
            'body' => 'required'
        ],[
            'title' => ['required' => lang('vali.post_title')],
            'body' => ['required' => lang('vali.post_body')]
        ]);
        $data['validation'] = $this->validator;


        if (!$input){
            echo view('templates/header');
            echo view('posts/create', $data);
            echo view('templates/footer');
        } else {


            $post_model = new Post_model();
            $user_model = new User_model();
            $data['posts'] = $post_model->findAll();
            $data['users'] = $user_model->findAll();

            $post_model->insert(
                [
                    'title' => $this->request->getVar('title'),
                    'body'  => $this->request->getVar('body'),
                    'user_id'  => $session->get('user_id')
                ]
            );

            $session->setFlashdata('post_created', lang('flashdata.post_created'));

            return redirect()->route('posts');
        }
    }

    public function delete($id){
        $session = \Config\Services::session();
        $post_model = new Post_model();

        if (!$session->get('logged_in')){
            $session->setFlashdata('no_login', lang('flashdata.no_login'));
            return redirect()->route('users/login');
        }

        if ($session->get('user_id') != $post_model->find($id)['user_id']){
            $session->setFlashdata('false_user', lang('flashdata.false_user'));
            return redirect()->route('posts');
        }


        $post_model->delete($id);

        $session->setFlashdata('post_delete', lang('flashdata.post_delete'));
        return redirect()->route('posts');
    }


    public function edit($id){
        $post_model = new Post_model();
        $data['post'] = $post_model->find($id);
        $session = \Config\Services::session();

        if (!$session->get('logged_in')){
            $session->setFlashdata('no_login', lang('flashdata.no_login'));
            return redirect()->route('users/login');
        }
        if ($session->get('user_id') != $post_model->find($id)['user_id']){
            $session->setFlashdata('false_user', lang('flashdata.false_user'));
            return redirect()->route('posts');
        }

        $data['isPost'] = $this->request->getMethod()=='post';

        helper(['form', 'url']);
        $input = $this->validate([
            'title' => 'required',
            'body' => 'required'
        ],[
            'title' => ['required' => lang('vali.post_title')],
            'body' => ['required' => lang('vali.post_body')]
        ]);
        $data['validation'] = $this->validator;


        if (!$input){
            echo view('templates/header');
            echo view('posts/edit', $data);
            echo view('templates/footer');
        } else {

            $updatedata = [
                'title' => $this->request->getVar('title'),
                'body'  => $this->request->getVar('body'),
                'user_id'  => $session->get('user_id')
            ];
            $post_model->update($id, $updatedata);

            $session->setFlashdata('post_edit', lang('flashdata.post_edit'));
            return redirect()->route('posts');
        }
    }


}