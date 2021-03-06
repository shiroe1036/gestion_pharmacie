<?php

namespace App\Http\Controllers;

use App\Fournisseur;
use Illuminate\Http\Request;
use App\Services\DoublonService;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $frns = Fournisseur::orderBy('id', 'desc')->paginate(15);

        return view('application.fournisseur.list', compact('frns'));
    }

    /**
     * search functionnality
     * @return \Illuminate\Http\Response
     */
    public function findFrns(Request $request)
    {
        $frns = Fournisseur::where('nomFournisseur', 'like', "%{$request['findFrns']}%")->orderBy('id', 'desc')->paginate(15);
        
        $frns->appends('searchFrns', $request['findFrns']);

        return view('application.fournisseur.list', compact('frns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('application.fournisseur.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateInput($request);

        $constraint = [
            ['nomFournisseur', $request['nomFournisseur']],
            ['contact', $request['contact']],
            ['email', $request['email']],
            ['adresse', $request['adresse']]
        ];

        $dataInsert = [
            'nomFournisseur' => $request['nomFournisseur'],
            'contact' => $request['contact'],
            'email' => $request['email'],
            'adresse' => $request['adresse']
        ];
        
        // $doublont = $this->findDuplicate($constraint);
        $doublont = DoublonService::findDuplicate('fournisseurs', $constraint);
        
        if($doublont){
            return back()->withError('Ce fournisseur existe déjà dans la base de données')->withInput();
        }else{
            $insert = Fournisseur::create($dataInsert);

            if($insert){
                return redirect()->route('fournisseur.index')->with('success', "{$request['nomFournisseur']} ajouter avec succès");
            }else{
                return back()->withError('Une erreur est survenue lors de l\'insertion')->withInput();
            }
        }
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
        $data = Fournisseur::findOrFail($id);
        return view('application.fournisseur.edit', compact('data'));
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

        $dataUpdate = [
            'nomFournisseur' => $request['nomFournisseur'],
            'contact' => $request['contact'],
            'email' => $request['email'],
            'adresse' => $request['adresse']
        ];

        $update = Fournisseur::where('id', $id)->update($dataUpdate);

        if($update){
            return redirect()->route('fournisseur.index')->with('success', 'Fournisseur modifier avec succès');
        }else{
            return back()->withError('Une erreur est survenue lors de la modification du fournisseur');
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
        $frns = Fournisseur::firstOrFail($id);

        if($frns){
            $deleted = $frns->delete();

            if($deleted) {
                return back()->with('success', "{$frns->nomFournisseur} a été modifié avec succès");
            }else{
                return back()->withError('Une erreur est survenue lors de la suppression');
            }
        }else{
            return back()->withError('Fournisseur introuvable');
        }
    }

    // validation input
    private function validateInput($request)
    {
        $this->validate($request, [
            'nomFournisseur' => 'required|between:2,75',
            'contact' => 'required|numeric',
            'email' => 'email',
            'adresse' => 'required'
        ]);
    }
}
