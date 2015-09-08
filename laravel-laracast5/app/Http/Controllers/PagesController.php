<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    //

    function about(){
        $name = "Adrian Heng";
        $softwareName = "Personal Inventory & Storage System";
        $yearOfCreation = 2015;

        return view("pages.about", compact("name", "softwareName", "yearOfCreation") );
        /* top is equivalent to:
        return view("pages.about", [
            "name" => $name,
            "softwareName" => $softwareName,
            "yearOfCreation" => $yearOfCreation
        ]);
        */

        //alternative way
        /*
            $data = [];
            $data["name"] = "Adrian Heng";
            $data["softwareName"] = "Personal Inventory & Storage System"
            return view("pages.about", $data);
        */
    }

    function contact(){
        $phoneNums = ["111111111", "222222222"];
        return view("pages.contact", compact("phoneNums") );
    }
}
