<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $liste_categorie=categorie::all();/** récuperer tous les donnees de categories de la base de doonnees
     */
        return view(('categories'),compact('liste_categorie'));
    }

    public function create()
    {
        return view('create_categorie');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nom' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg',
        ]);
    
        $image = $request->file('image');
        $profileImage =  $image->getClientOriginalName();
        $image->move(public_path('img'), $profileImage);
    
        $validateData['image'] = $profileImage;
    
        Categorie::create($validateData);
    
        return redirect('/categories');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        $categories = categorie::find($id);
        
        return view('edit_category',['categorie'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'nom' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png,gif,svg',
        ]);
    
        $image = $request->file('image');
        
        if ($image) {
            $profileImage = $image->getClientOriginalName();
            $image->move(public_path('img'), $profileImage);
            $validateData['image'] = $profileImage;
        }
        
        $data = categorie::find($id);
        $data->nom = $request->nom;
        $data->image = $validateData['image'];
        $data->save();
        
        return redirect('/categories');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories=categorie::find($id);
        
        if($categories!=null)
        {   echo('delete');
            $categories->delete();
            return redirect('/categories');
        }
    }
}
