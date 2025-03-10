<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    protected $client;

    public function __construct(Client $client)
    {
        $this->client = new Client([
            'base_uri' => env('API_URL')
        ]);
    }

    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {

        try {

            $data = $request->all();
            
            $responseApi = $this->client->request('POST', '/api-clubfy/login', [
                'json' => $data,
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json'
                ]
            ]);
            
            $response = json_decode($responseApi->getBody(), true);

            if (isset($response['status_code']) && $response['status_code'] == 200) {
                
                Session::put('user', $response['user']);

                return response()->json($response);

            } else {
                
                return redirect()->back()->withErrors(['error' => 'Credenciais inválidas']);
            }

        } catch (\Exception $e) {

            return response()->json($e->getMessage());
        }
    }
}