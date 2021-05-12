<?php

namespace App\Controllers;
use App\Models\Driver_model;
use App\Models\Team_model;

class Teams extends BaseController
{


    public function index()
    {
        $data['title'] = 'Teamliste';

        $team_model = new Team_model();


        $data['teams'] = $team_model->findAll();

        echo view('templates/header');
        echo view('teams/teamlist', $data);
        echo view('templates/footer');
    }

    public function view($id = NUll){
        $driver_model = new Driver_model();
        $team_model = new Team_model();

        $data['team'] = $team_model->find($id);
        if(empty($data['team'])){
            show_404();
        }

        $data['name'] = $data['team']['name'];
        $data['drivers'] = $driver_model->findAll();


        echo view('templates/header');
        echo view('teams/teampage', $data);
        echo view('templates/footer');
    }

    public function create(){
        $session = \Config\Services::session();
        if ($session->get('user_id') != 1){
            $session->setFlashdata('not_admin', lang('flashdata.not_admin'));
            return redirect()->route('teams');
        }

        $team_model = new Team_model();

        $data['isPost'] = $this->request->getMethod()=='post';
        helper(['form', 'url']);
        $input = $this->validate([
            'name' => 'required',
            'teamchef' => 'required',
            'motor' => 'required',
            'sitz' => 'required'
        ],[
            'name' => ['required' => lang('vali.team_name')],
            'teamchef' => ['required' => lang('vali.team_teamchef')],
            'motor' => ['required' => lang('vali.team_motor')],
            'sitz' => ['required' => lang('vali.team_sitz')]
        ]);
        $data['validation'] = $this->validator;

        if (!$input){
            echo view('templates/header');
            echo view('teams/create', $data);
            echo view('templates/footer');
        } else {

            $team_model->insert(
                [
                    'name' => $this->request->getVar('name'),
                    'teamchef'  => $this->request->getVar('teamchef'),
                    'motor' => $this->request->getVar('motor'),
                    'sitz'  => $this->request->getVar('sitz')
                ]
            );

            $session->setFlashdata('team_created', lang('flashdata.team_created'));
            return redirect()->route('teams');
        }
    }

    public function delete($id){

        $session = \Config\Services::session();
        if ($session->get('user_id') != 1){
            $session->setFlashdata('not_admin', lang('flashdata.not_admin'));
            return redirect()->route('teams');
        }

        $team_model = new Team_model();
        $team_model->delete($id);

        $session->setFlashdata('team_delete', lang('flashdata.team_delete'));
        return redirect()->route('teams');
    }

    public function edit($id){
        $session = \Config\Services::session();
        if ($session->get('user_id') != 1){
            $session->setFlashdata('not_admin', lang('flashdata.not_admin'));
            return redirect()->route('teams');
        }

        $team_model = new Team_model();
        $data['team'] = $team_model->find($id);

        $data['isPost'] = $this->request->getMethod()=='post';
        helper(['form', 'url']);
        $input = $this->validate([
            'name' => 'required',
            'teamchef' => 'required',
            'motor' => 'required',
            'sitz' => 'required'
        ],[
            'name' => ['required' => lang('vali.team_name')],
            'teamchef' => ['required' => lang('vali.team_teamchef')],
            'motor' => ['required' => lang('vali.team_motor')],
            'sitz' => ['required' => lang('vali.team_sitz')]
        ]);
        $data['validation'] = $this->validator;

        if (!$input) {
            echo view('templates/header');
            echo view('teams/edit', $data);
            echo view('templates/footer');
        } else {

            $updatedata = [
                'name' => $this->request->getVar('name'),
                'teamchef' => $this->request->getVar('teamchef'),
                'motor' => $this->request->getVar('motor'),
                'sitz' => $this->request->getVar('sitz')
            ];
            $team_model->update($id, $updatedata);


            $session->setFlashdata('team_edit', lang('flashdata.team_edit'));
            return redirect()->route('teams');
        }
    }

}