<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use GuzzleHttp\Client;


class HomeController extends Controller
{

    public function index()
    {

        $user = session('user');

        return view('home', compact('user'));
    }
}