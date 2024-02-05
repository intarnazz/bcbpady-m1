<?php


namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Users\User;

class GetUsers extends Controller
{
  public function GetAll()
  {
    $users = User::all(['user_id', 'name', 'password']);
    $res = [];
    foreach ($users as $value) {
      $res[$value["user_id"]] = [
        "name" => $value["name"],
        "password" => $value["password"],
        "descr" => $value["descr"],
      ];
    }
    return response()->json($res);
  }
}