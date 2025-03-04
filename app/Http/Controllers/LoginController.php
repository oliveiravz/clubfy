<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use GuzzleHttp\Client;


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
                'data' => $data
            ]);
            
            $response = json_decode($responseApi->getBody(), true);

            return response()->json([
                'data' => $response,
                'status_code' => $responseApi->getStatusCode()
            ]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}