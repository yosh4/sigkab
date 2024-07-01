<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {   
        $data =[
            'judul'=>'Dashbord',
            'page'=>'../Views/Dashbord'
        ];
        return view('Dashbord',$data);

    }
    public function kecamatan(): string
    {
        $data =[
            'judul'=>'kecamatan',
            'page'=>'../Views/kecamatan/tampil'
        ];
        return view('tampil',$data);
    }
    public function desa(): string
    {
        $data =[
            'judul'=>'desa',
            'page'=>'v_desa'
        ];
        return view('v_desa',$data);
    }
}
