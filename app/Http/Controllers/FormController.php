<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CruDataBase;

class FormController extends Controller
{
    public function index($id = null){
        $ModelData = new CruDataBase();
        return view("test",["data"=>$ModelData->ListData($id)]);
    }

    public function clientformsend(Request $data){

        if($this->validHTTP_POST($data)){
            $ModelData = new CruDataBase();
            $status = $ModelData->InserdataClient($data);

            if(
                $status ==1
            ){
                return response('Cadastrado!!!', 200)
                  ->header('Content-Type', 'text/plain');
            }else{

                return response($status, 400)
                  ->header('Content-Type', 'text/plain');

            }
        }
        return response('Error HTTP POST', 400)
                  ->header('Content-Type', 'text/plain');
    }
    public function clientformupdate(Request $data){

        if($this->validHTTP_POST($data)){
            $ModelData = new CruDataBase();
            $status = $ModelData->UpdatedataClient($data);

            if(
                $status ==1
            ){
                return response('Cadastrado!!!', 200)
                  ->header('Content-Type', 'text/plain');
            }else{

                return response($status, 400)
                  ->header('Content-Type', 'text/plain');

            }
        }
        return response('Error HTTP POST', 400)
                  ->header('Content-Type', 'text/plain');
    }

    public function contatoformsend(Request $data){
        return response('Cadastrado!!!', 200)
                  ->header('Content-Type', 'text/plain');
    }

    protected function validHTTP_POST($HTTPBODY){

        if(!isset($HTTPBODY)){
            return false;
        }

        return true;
    }
}
