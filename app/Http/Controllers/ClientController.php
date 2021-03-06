<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\ClientRequest;
use App\Services\DoublonService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::orderBy('id', 'desc')->paginate(15);
        return view('application.client.list', compact('clients'));
    }
    /**
     * Search fonctionnality client
     * @return \Illuminate\Http\Response
     */
    public function searchClient(Request $request)
    {
        $clients = Client::where('nomClient', 'like', "%{$request['findClient']}%")
                            ->orderBy('id', 'desc')
                            ->paginate(15);

        $clients->appends(['searchClient' => $request['findClient']]);

        return view('application.client.list', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('application.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        $dataFind = [
            ['nomClient', $request['nomClient']],
            ['contact', $request['contact']],
            ['adresse', $request['adresse']]
        ];

        // $findData = $this->findDuplicate($dataFind);
        $findData = DoublonService::findDuplicate('clients', $dataFind);

        if($findData){
            return back()->withError('le client existe déjà');
        }else{
            $insert = Client::create([
                'nomClient' => $request['nomClient'],
                'contact' => $request['contact'],
                'email' => $request['email'],
                'adresse' => $request['adresse']
            ]);

            if($insert){
                return redirect()->route('client.index')->with('success', 'Client ajouter avec succès');
            }else{
                return back()->withError('Erreur ajout client')->withInput();
            }
        }
    }

    /**
     * Find duplicate name Client
     * @param \Illuminate\Http\Request $request
     */
    public function findDuplicate($params = [])
    {
        $dataFind = Client::where($params)->first();
        return $dataFind;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('application.client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validateInput($request);

        $data = [
            'nomClient' => $request['nomClient'],
            'contact' => $request['contact'],
            'email' => $request['email'],
            'adresse' => $request['adresse']
        ];

        $client = Client::where('id', $id)->update($data);

        if($client){
            return redirect()->route('client.index')->with('success', 'Client modifier avec succès');
        }else{
            return back()->withError('Erreur lors de la modification');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);

        if($client){
            $client->delete();
            return redirect()->route('client.index')->with('success', "{$client['nomClient']} supprimer avec succès");
        }else{
            return back()->withError('Une erreur est survenu lors de la suppression');
        }
    }

    public function findClient()
    {
        echo "lol";die;
        // $search = $request->input('searchClient');
        // $clients = Client::where('nomClient', 'LIKE', "% {$request['findClient']} %")->paginate(15);

        // return view('application.client.list', compact('clients'));
    }

    private function validateInput($request){
        $this->validate($request, [
            'nomClient' => 'required|between:5,100',
            'contact' => 'required|numeric',
            'email' => 'email',
            'adresse' => 'required'
        ]);
    }
}
