<?php

namespace App\Http\Controllers;

use App\Medicament;
use App\Services\QueryGenerator;
use Illuminate\Http\Request;

class MedicamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medocs = Medicament::orderBy('id', 'desc')->paginate(15);
        return view('application.medicament.list', compact('medocs'));
    }

    /**
     * Search functionnality
     */
    public function findMedoc(Request $request)
    {
        $medocs = Medicament::where('nomMedoc', 'like', "%{$request['findMedoc']}%")->orderBy('id', 'desc')->paginate(15);

        $medocs->appends('searchMedoc', $request['nomMedoc']);

        return view('application.medicament.list', compact('medocs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('application.medicament.create');
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
            ['nomMedoc', $request['nomMedoc']],
            ['famille', $request['familler']],
            ['prixVente', $request['prixVente']]
        ];

        $dataInsert = [
            'nomMedoc' => $request['nomMedoc'],
            'famille' => $request['famille'],
            'prixVente' => $request['prixVente']
        ];

        $doublon = $this->findDuplicate($constraint);

        if($doublon){
            return back()->withError("{$request['nomMedoc']} existe déjà")->withInput();
        }else{
            $insert = Medicament::create($dataInsert);

            if($insert){
                return redirect()->route('medicament.index')->with('success', "{$request['nomMedoc']} ajouté avec succès");
            }else{
                return back()->withError("Une erreur est survenue lors de l'insertion")->withInput();
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
        $data = Medicament::findOrFail($id);
        return view('application.medicament.edit', compact($data));
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
            'nomMedoc' => $request['nomMedoc'],
            'famille' => $request['famille'],
            'prixVente' => $request['prixVente']
        ];

        $update = Medicament::where('id', $id)->update($dataUpdate);

        if($update){
            return redirect()->route('medicament.index')->with('success', 'Médicament modifié avec succès');
        }else{ 
            return back()->withError('Une erreur est survenue lors de la modification');
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
        $delete = Medicament::where('id', $id)->delete();

        if($delete){
            return redirect()->route('medicament.index')->with('success', "{$delete->nomMedoc} a été supprimé avec succès");
        }else{
            return back()->withError('Une erreur est survenue lors de la suppression');
        }
    }

    private function validateInput($request)
    {
        $this->validate($request, [
            'nomMedoc' => 'required|between:2,50',
            'famille' => 'required|between:3,25',
            'prixVente' => 'required|numeric',
        ]);
    }

    public function getData(Request $request)
    {
        $autoComp = [];

        $where = [
            'where' => [
                ['nomMedoc', 'LIKE', "%{$request->get('search')}%"]
            ]
        ];

        $data = QueryGenerator::generator('medicaments', $where)->get();

        if(!empty($data))
        {
            foreach($data as $res){
                $autoComp[] = [
                    'id' => $res->id,
                    'value' => $res->nomMedoc
                ];
            }

            return response()->json($autoComp);
        }
    }
}
