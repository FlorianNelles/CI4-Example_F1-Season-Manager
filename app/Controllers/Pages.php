<?php

namespace App\Controllers;

class Pages extends BaseController {




    public function view($page = 'home') {

        $parser = \Config\Services::parser();


        $language = \Config\Services::language();
        $session = \Config\Services::session();

        if ($session->get('language') == 'en'):
         $language->setLocale('en');?>
        <?php endif; ?>

        <?php if ($session->get('language') == 'ger'): ?>
            <?php $language->setLocale('ger');?>
        <?php endif;


        $data = [
            'home_title'   => lang('home.home_title'),
            'home_message' => lang('home.welcome_message'),
            'about_title' => lang('home.about_title'),
            'about_message' => lang('home.about_message')
        ];



        $data['title'] = ucfirst($page);

        echo view('templates/header');

        echo $parser->setData($data)->render('pages/'.$page);
        //echo view('pages/'.$page, $data);
        echo view('templates/footer');
    }

}