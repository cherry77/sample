<?php
namespace App\Http\Controllers;

class UserController extends Controller
{
    public function info($id){
        return 'user-info-'.$id;
    }

    public function upload(){
        return 'upload';
    }
}