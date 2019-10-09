<?php


namespace App\Http\Services;


interface CustomerService
{
public function getAll();
public function findById($id);
public function create($request);
public function destroy($id);
public function update($request,$id);
}
