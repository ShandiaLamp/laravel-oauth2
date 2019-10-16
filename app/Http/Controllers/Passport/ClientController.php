<?php

namespace App\Http\Controllers\Passport;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Passport\Client;
use Laravel\Passport\ClientRepository;

class ClientController extends Controller
{
    protected $clients;

    public function __construct(
        ClientRepository $clients
    )
    {
        $this->clients = $clients;
    }

    public function index()
    {
        return view('admin.client.index', [
            'data'  => Client::paginate(10),
        ]);
    }
}
