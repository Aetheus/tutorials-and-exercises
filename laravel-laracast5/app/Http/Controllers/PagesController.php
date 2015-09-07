<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class PagesController extends Controller {

    public function index() {
        return "hello!";
    }

    public function contact(){
        return view("pages.contact");
    }

}

?>
