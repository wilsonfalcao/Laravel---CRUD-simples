<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use \Illuminate\Database\QueryException;

class CruDataBase extends Model
{
   public function ListData($id = null){
       return $id != null ? $this->listadata_ID_($id) : $this->listadata_();
   }
   public function InserdataClient($Data){
       return $this->inserdata_client_($Data);
   }
   public function UpdatedataClient($Data){
    return $this->updatedata_client_($Data);
   }

   protected function listadata_(){
       return DB::table('clientes')->get()->toArray();
   }
   protected function listadata_ID_($id){
       return DB::table('clientes')->find($id)->toArray();
   }
   protected function inserdata_client_($HTTPBODY){

        try{
            DB::table('clientes')->insert([
                "nome"=>$HTTPBODY->nome,
                "cnpj"=>$HTTPBODY->cnpj,
                "status"=>$HTTPBODY->status,
            ]);
        }catch(QueryException $e){
            return $e->getMessage();
        }
        return 1;
   }
   protected function updatedata_client_($HTTPBODY){

    try{
        DB::table('clientes')
        ->where("id",$HTTPBODY->id)
        ->update([
            "nome"=>$HTTPBODY->nome,
            "cnpj"=>$HTTPBODY->cnpj,
            "status"=>$HTTPBODY->status,
        ]);
    }catch(QueryException $e){
        return $e->getMessage();
    }
    return 1;
}

}
