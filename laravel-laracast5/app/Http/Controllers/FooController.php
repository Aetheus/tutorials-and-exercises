<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\FooRepository;

class FooController extends Controller
{
    //
    public $repository;

    //Constructor Injection via Service Container:
    //note we didn't have to actually pass in an instance of FooRepository
    //the service container automagically built it for us
    public function __construct(FooRepository $repository){
        $this->repository = $repository;
    }

    public function foo(){
        //$repository = new \App\Repositories\FooRepository();

        return $this->repository->get();
    }

    //Method injection; same as before, but this time, just for a specific method
    public function alt(FooRepository $repository){
        return $repository->get();
    }
}
