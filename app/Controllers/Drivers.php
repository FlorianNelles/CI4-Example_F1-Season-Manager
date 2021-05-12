<?php

namespace App\Controllers;
use App\Models\Driver_model;
use App\Models\Team_model;

class Drivers extends BaseController
{



    public function index()
    {
        $data['title'] = 'Fahrerliste';

        $driver_model = new Driver_model();
        $team_model = new Team_model();

        $data['drivers'] = $driver_model->orderBy('points', 'desc')->findAll();
        $data['teams'] = $team_model->findAll();

        echo view('templates/header');
        echo view('drivers/driverlist', $data);
        echo view('templates/footer');
    }

    public function view($id = NUll){
        $driver_model = new Driver_model();
        $team_model = new Team_model();

        $data['driver'] = $driver_model->find($id);
        if(empty($data['driver'])){
            show_404();
        }

        $data['id'] = $data['driver']['id'];
        $data['teams'] = $team_model->findAll();


        echo view('templates/header');
        echo view('drivers/driverpage', $data);
        echo view('templates/footer');
    }

    public function create(){
        $language = \Config\Services::language();
        $session = \Config\Services::session();



        $session = \Config\Services::session();
        if (!$session->get('logged_in')){
            $session->setFlashdata('no_login', lang('flashdata.no_login'));
            return redirect()->route('users/login');
        }

        $driver_model = new Driver_model();
        $team_model = new Team_model();
        $data['drivers'] = $driver_model->findAll();
        $data['teams'] = $team_model->findAll();

        $data['isPost'] = $this->request->getMethod()=='post';

        helper(['form', 'url']);
        $input = $this->validate([
            'name' => 'required',
            'startnr' => 'required|max_length[2]|numeric',
            'team' => 'required',
            'points' => 'numeric',
            'userfile' => 'max_size[userfile,4096]|is_image[userfile]|max_dims[userfile,1024,1024]'
        ],[
            'name' => ['required' => lang('vali.driver_name')],
            'startnr' => ['required' => lang('vali.driver_startnr')]
        ]);
        $data['validation'] = $this->validator;

        if (!$input){
            echo view('templates/header');
            echo view('drivers/create', $data);
            echo view('templates/footer');
        } else {

            //file uploud driver image
            $file = $this->request->getFile('userfile');
            $imagename = $file->getName();


            if (!$imagename || $imagename == NULL){

                $imagename = 'noimage.jpg';

            }else{
                $file->move('./upload/driverimages/' ,  $this->request->getVar('name').$imagename);
                $imagename = $this->request->getVar('name').$imagename;

            }


            $driver_model = new Driver_model();

            $driver_model->insert(
                [
                    'name' => $this->request->getVar('name'),
                    'startnr'  => $this->request->getVar('startnr'),
                    'team_id' => $this->request->getVar('team'),
                    'points'  => $this->request->getVar('points'),
                    'drivers_image'  => $imagename,
                    'user_id'  => $session->get('user_id')
                ]
            );

            $session->setFlashdata('driver_created', lang('flashdata.driver_created'));

            return redirect()->route('drivers');
        }
    }

    public function delete($id){
        $session = \Config\Services::session();
        $driver_model = new Driver_model();

        if (!$session->get('logged_in')){
            $session->setFlashdata('no_login', lang('flashdata.no_login'));
            return redirect()->route('users/login');
        }


        if ($session->get('user_id') != $driver_model->find($id)['user_id']){
            $session->setFlashdata('false_user', lang('flashdata.false_user'));
            return redirect()->route('drivers');
        }


        $driver_model->delete($id);

        $session->setFlashdata('driver_delete', lang('flashdata.driver_delete'));
        return redirect()->route('drivers');
    }

    public function edit($id)
    {
        $session = \Config\Services::session();
        $driver_model = new Driver_model();

        if (!$session->get('logged_in')){
            $session->setFlashdata('no_login', lang('flashdata.no_login'));
            return redirect()->route('users/login');
        }

        if ($session->get('user_id')  != $driver_model->find($id)['user_id']){
            $session->setFlashdata('false_user', lang('flashdata.false_user'));
            return redirect()->route('drivers');
        }


        $driver_model = new Driver_model();
        $team_model = new Team_model();
        $data['driver'] = $driver_model->find($id);
        $data['teams'] = $team_model->findAll();

        $data['isPost'] = $this->request->getMethod()=='post';
        helper(['form', 'url']);

        $input = $this->validate([
            'name' => 'required',
            'startnr' => 'required|max_length[2]|numeric',
            'team' => 'required',
            'points' => 'numeric',
            'userfile' => 'max_size[userfile,4096]|is_image[userfile]|max_dims[userfile,1024,1024]'
        ],[
            'name' => ['required' => lang('vali.driver_name')],
            'startnr' => ['required' => lang('vali.driver_startnr')]
        ]);
        $data['validation'] = $this->validator;

        if (!$input) {
            echo view('templates/header');
            echo view('drivers/edit', $data);
            echo view('templates/footer');
        } else {

            //file upload
            //validation
            $file = $this->request->getFile('userfile');
            $imagename = $file->getName();

            if (!$imagename){
                $imagename = $data['driver']['drivers_image'];
            }else{
                $file->move('./upload/driverimages/' , $data['driver']['name'].$imagename);
                $imagename = $data['driver']['name'].$imagename;
            }

            $updatedata = [
                'name' => $this->request->getVar('name'),
                'startnr' => $this->request->getVar('startnr'),
                'team_id' => $this->request->getVar('team'),
                'points' => $this->request->getVar('points'),
                'drivers_image' => $imagename,
                'user_id' => $session->get('user_id')
            ];
            $driver_model->update($id, $updatedata);

            $session->setFlashdata('driver_update', lang('flashdata.driver_update'));
            return redirect()->route('drivers');

        }
    }
}