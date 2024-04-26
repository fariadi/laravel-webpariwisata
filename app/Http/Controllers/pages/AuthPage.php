<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthPage extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-login-basic');
  }

  public function loginGoogle()
  {
    return view('content.authentications.auth-login-google');
  }
}
