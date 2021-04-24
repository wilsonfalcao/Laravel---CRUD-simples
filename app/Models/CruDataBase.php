<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use \Illuminate\Database\QueryException;

class CruDataBase extends Model
{

   //Variáveis Encapsulada
   public function ListData($id = null){
       return $id != null ? $this->listadata__client_ID_($id) : $this->listadata_client_();
   }
   public function InserdataClient($Data){
       return $this->inserdata_client_($Data);
   }
   public function UpdatedataClient($Data){
    return $this->updatedata_client_($Data);
   }
   public function DeleteClient($Data){
       return $this->delete_client_($Data);
   }
   //
   public function ListDataContatos($id = null){
    return $id != null ? $this->listadata__contatos_ID_($id) : $this->listadata_contatos_();
   }
   public function InserdataContatos($Data){
       return $this->inserdata_contatos_($Data);
   }
   public function UpdatedataContatos($Data){
    return $this->updatedata_contatos_($Data);
   }
   public function DeleteContatos($Data){
       return $this->delete_contatos_($Data);
   }

   //Tabela Cliente
   protected function listadata_client_(){
       return DB::table('clientes')->get()->toArray();
   }
   protected function listadata__client_ID_($id){
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
   protected function delete_client_($HTTPBODY){
    try{
        DB::table('clientes')
        ->where("id",$HTTPBODY->id)
        ->delete();
    }catch(QueryException $e){
        return $e->getMessage();
    }
    return 1;
   }

   //Tabela Contato
   protected function listadata_contatos_(){
    return DB::select("select co.id, 
                              co.id_cliente, 
                              co.nome_contato, 
                              co.email_contato, 
                              co.cpf, 
                              co.registro, 
                              cl.nome as 'empresa'
                        from contatos as co,
                             clientes as cl
                        where co.id_cliente=cl.id;");
   }
   protected function listadata__contatos_ID_($id){
        return DB::table('contatos')->find($id)->toArray();
   }
   protected function inserdata_contatos_($HTTPBODY){

        try{
            DB::table('contatos')->insert([
                "nome_contato"=>$HTTPBODY->nome_contato,
                "email_contato"=>$HTTPBODY->email_contato,
                "id_cliente"=>$HTTPBODY->id_cliente,
                "cpf"=>$HTTPBODY->cpf,
            ]);
        }catch(QueryException $e){
            return $e->getMessage();
        }
        return 1;
   }
   protected function updatedata_contatos_($HTTPBODY){
        try{
            DB::table('contatos')
            ->where("id",$HTTPBODY->id)
            ->update([
                "nome_contato"=>$HTTPBODY->nome_contato,
                "email_contato"=>$HTTPBODY->email_contato,
                "id_cliente"=>$HTTPBODY->id_cliente,
                "cpf"=>$HTTPBODY->cpf,
            ]);
        }catch(QueryException $e){
            return $e->getMessage();
        }
        return 1;
   }
   protected function delete_contatos_($HTTPBODY){
    try{
        DB::table('contatos')
        ->where("id",$HTTPBODY->id)
        ->delete();
    }catch(QueryException $e){
        return $e->getMessage();
    }
    return 1;
   }

}
