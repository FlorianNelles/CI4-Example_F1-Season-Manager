<?php

namespace App\Controllers;
use App\Models\User_model;

class Users extends BaseController
{

    public function login(){
        $session = \Config\Services::session();

        $data['isPost'] = $this->request->getMethod()=='post';

        helper(['form', 'url']);
        $input = $this->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $data['validation'] = $this->validator;


        if(!$input){
            echo view('templates/header');
            echo view('users/login', $data);
            echo view('templates/footer');
        }else{

            $user_model = new User_model();

            $username = $this->request->getVar('username');
            $password = md5($this->request->getVar('password'));

            $db = \Config\Database::connect();

            $builder = $db->table('users');

            $query = $builder->select()
                ->where('username', $username)
                ->where('password', $password)
                ->get();

            $numrows = $db->affectedRows();

            if ($numrows == 1){
                $user_id = $query->getRow('id');
            }else{
                $user_id = false;
            }


            if ($user_id){
                $user_data = array(
                    'user_id' => $user_id,
                    'username' => $username,
                    'logged_in' => true
                );

                $session->set($user_data);

                $session->setFlashdata('login', lang('flashdata.login'));
                return redirect()->to('/');
            }else{
                $session->setFlashdata('login_failed', lang('flashdata.login_failed'));
                return redirect()->route('users/login');
            }

        }
    }

    public function logout(){

        $session = \Config\Services::session();
        $session->remove('user_id');
        $session->remove('username');
        $session->remove('logged_in');


        $session->setFlashdata('logout', lang('flashdata.logout'));

        return redirect()->route('users/login');
    }

    public function register(){
        $session = \Config\Services::session();

        $data['isPost'] = $this->request->getMethod()=='post';

        helper(['form', 'url']);
        $input = $this->validate([
            'name' => 'required',
            'username' => 'required|is_unique[users.username]',
            'email' => 'required|is_unique[users.email]',
            'password' => 'required',
            'password2' => 'matches[password]'
        ],[
            'name' => ['required' => lang('vali.user_name')],
            'email' => ['required' => lang('vali.user_email')],
            'username' => ['required' => lang('vali.user_username')],
            'password' => ['required' => lang('vali.user_password')],
            'password2' => ['matches' => lang('vali.user_password2')]
        ]);
        $data['validation'] = $this->validator;

        if (!$input) {
            echo view('templates/header');
            echo view('users/register', $data);
            echo view('templates/footer');
        }else{
            $enc_password = md5($this->request->getVar('password'));
            $user_model = new User_model();

            $user_model->insert(
                [
                    'name' => $this->request->getVar('name'),
                    'username'  => $this->request->getVar('username'),
                    'email' => $this->request->getVar('email'),
                    'password'  => $enc_password
                ]
            );

            $session->setFlashdata('user_registered', lang('flashdata.user_registered'));


            $email = \Config\Services::email();

            $email->setFrom('info@uni-trier.web02.necror.de', 'CI4 StudiProjekt');
            $email->setTo($this->request->getVar('email'));
            $email->setSubject('Erfolgreich registriert');
            $email->setMessage("Hallo,\n\ndu hast dich soeben erfolgreich registriert.\n\nViele Grüße\nDas Studienprojekt Team");

            $email->send();


            return redirect()->to('/');
        }

    }


}