<?php

namespace App\Controllers;


class Tests extends BaseController
{

    public function index(){


        $encrypter = \Config\Services::encrypter();
        $table = new \CodeIgniter\View\Table();

        helper(['form', 'url']);


        $message = $this->request->getVar('message');
        if (!$message ){
            $encrypt_message = '';
            $decrypt_message = '';
        }else{
            $encrypt_message = $encrypter->encrypt($message);
            $decrypt_message = $encrypter->decrypt($encrypt_message);
        }

        $data['encrypt_message'] = $encrypt_message;
        $data['decrypt_message'] = $decrypt_message;

        $table->setHeading('ID', 'Name' , 'Username', 'Created at' );
        $template = array(
            'table_open'            => '<table class="table" border="2" cellpadding="10" cellspacing="2">',

            'thead_open'            => '<thead class="thead-dark">',
            'thead_close'           => '</thead>',
            'heading_row_start'     => '<tr>',
            'heading_row_end'       => '</tr>',
            'heading_cell_start'    => '<th>',
            'heading_cell_end'      => '</th>',
            'tbody_open'            => '<tbody>',
            'tbody_close'           => '</tbody>',
            'row_start'             => '<tr>',
            'row_end'               => '</tr>',
            'cell_start'            => '<td>',
            'cell_end'              => '</td>',
            'row_alt_start'         => '<tr>',
            'row_alt_end'           => '</tr>',
            'cell_alt_start'        => '<td>',
            'cell_alt_end'          => '</td>',
            'table_close'           => '</table>'
        );
        $table->setTemplate($template);

        $db = \Config\Database::connect();
        $query = $db->query('SELECT id,name,username,register_date FROM Users');

        $data['table'] = $table->generate($query);

        echo view('templates/header');
        echo view('tests/index', $data);
        echo view('templates/footer');

    }


}