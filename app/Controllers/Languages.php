<?php

namespace App\Controllers;

class Languages extends BaseController
{

    public function english(){
        $session = \Config\Services::session();
        $session->remove('language');
        $session->set('language' , 'en');


        return redirect()->to($_SERVER['HTTP_REFERER']);
    }

    public function german(){
        $session = \Config\Services::session();
        $session->remove('language');
        $session->set('language' , 'ger');


        return redirect()->to($_SERVER['HTTP_REFERER']);
    }


}