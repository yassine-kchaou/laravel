<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\produit;
use Illuminate\Http\Request;
use DB;
class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $liste_produit=produit::all();/** récuperer tous les donnees de categories de la base de doonnees
     */
        return view(('produits'),compact('liste_produit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   $categories=categorie::all();
        return view('create_produit',compact('categories'));/** alech mch return view('/create',compact('categories'));*/
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nom' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg',
            'quantite' =>'required',
            'prix'=>'required', 
            'categorie_id'=>'required'
        ]);
            $image = $request->file('image');
            $profileImage =  $image->getClientOriginalName();
            $image->move(public_path('img'), $profileImage);
        
            $validateData['image'] = $profileImage;
        
            produit::create($validateData);
        
            return redirect('/produits');
    }

    /**
     * Display the specified resource.
     */
    
        public function show($id)
        {   
            $categories=categorie::all();
            $produits_m_categ=DB::table('categories')->Join("produits",'categories.id','=','produits.categorie_id')->select("produits.*","categories.nom")->get();
            $produits=DB::table('produits')->Join("categories",'categories.id','=','produits.categorie_id')->where('produits.id',$id)->select("produits.*","categories.nom")->get();
            
            return view('affich_art',compact('produits','produits_m_categ','categories'));
        }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produits = produit::find($id);
        
        return view('edit_produit',['produit'=>$produits]);
    }
   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    { 
        $validateData = $request->validate([
            'nom' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png,gif,svg',
            
            'quantite' =>'required',
            
            'prix'=>'required',
            
        ]);
       
        $image = $request->file('image');
        
        
            $profileImage = $image->getClientOriginalName();
            $image->move(public_path('img'), $profileImage);
            $validateData['image'] = $profileImage;
        
       
        $data = produit::find($id);
        $data->nom = $request->nom;
        $data->quantite = $request->quantite;
        $data->prix = $request->prix;
        $data->image = $validateData['image'];
        $data->save();
        
        return redirect('/produits');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produits=produit::find($id);
        
        if($produits!=null)
        {   echo('delete');
            $produits->delete();
            return redirect('/produits');
        }
    }
}
