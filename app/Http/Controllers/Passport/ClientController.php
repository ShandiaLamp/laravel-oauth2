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

    public function create()
    {
        return view('admin.client.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'redirect' => ['required', 'url'],
        ], [
            'name.required'     => '请输入名称',
            'name.max'          => '名称最大长度为255个字符',
            'redirect.required' => '请输入重定向地址',
            'redirect.url'      => '重定向地址不是正确的地址格式',
        ]);

        if ( $this->clients->create(
            $request->user()->getKey(), $request->name, $request->redirect
        )->makeVisible('secret') ) {
            return redirect("/");
        }
    }
}
