<?php

namespace App\Http\Controllers;
use App\Post;


class PagesController extends Controller {
    
    public function getIndex() {
        return view('pages.welcome');
    }

    public function getAbout() {

        $first='Jenniline';
        $last = 'Ebai';

        $fullname = $first . " " . $last ;
        $email = 'jennilineebai@gmail.com';
        $data = [];
        $data['fullname'] = $fullname;
        $data['email'] = $email;

        return view ('pages.about')->withData($data);

    }

    public function getContact(){
        return view ('pages.contact');
    }
  

}


?>