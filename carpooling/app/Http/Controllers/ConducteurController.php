<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Trajet;
use App\models\Reservation;

class ConducteurController extends Controller
{
    public function acceuil() {
        return view('conducteur.accueil');
    }

    public function index() {

        // Afficher les trajets créés par le conducteur connecté
        $trajets = Trajet::where('conducteur_id', auth()->id())->get();
        return view('conducteur.trajets.index', compact('trajets'));
    }

    public function create() {

        // Retourne la vue du formulaire pour créer un nouveau trajet
        return view('conducteur.trajets.create');
    }
    
       // Enregistrer un nouveau trajet
       public function store(Request $request) {

           $validated = $request->validate([
               'lieu_depart' => 'required|string|max:255',
               'lieu_arrive' => 'required|string|max:255',
               'date' => 'required|date',
               'heure' => 'required',
               'nombre_places' => 'required|integer|min:1',
               'prix' => 'required|numeric|min:0',
           ]);
   
           Trajet::create([
               'conducteur_id' => auth()->id(), // Le conducteur est l'utilisateur connecté
               'lieu_depart' => $validated['lieu_depart'],
               'lieu_arrive' => $validated['lieu_arrive'],
               'date' => $validated['date'],
               'heure' => $validated['heure'],
               'nombre_places' => $validated['nombre_places'],
               'prix' => $validated['prix'],
           ]);
   
           return redirect()->route('conducteur.trajets.index')->with('success', 'Trajet créé avec succès.');
       }


    // Afficher un trajet spécifique
    public function show($id) {

        // Charger le trajet avec les réservations associées
        $trajet = Trajet::where('conducteur_id', auth()->id())
        ->with('reservations.passager') // Charger les réservations et les passagers associés
        ->findOrFail($id);

        return view('conducteur.trajets.show', compact('trajet'));
    }

    // Afficher le formulaire d'édition d'un trajet
    public function edit($id) {
            
        $trajet = Trajet::where('conducteur_id', auth()->id())->findOrFail($id);
        return view('conducteur.trajets.edit', compact('trajet'));
    }

    // Mettre à jour un trajet existant
    public function update(Request $request, $id) {

        $validated = $request->validate([
            'lieu_depart' => 'required|string|max:255',
            'lieu_arrive' => 'required|string|max:255',
            'date' => 'required|date',
            'heure' => 'required',
            'nombre_places' => 'required|integer|min:1',
            'prix' => 'required|numeric|min:0',
        ]);

        $trajet = Trajet::where('conducteur_id', auth()->id())->findOrFail($id);
        $trajet->update($validated);

        return redirect()->route('conducteur.trajets.index')->with('success', 'Trajet mis à jour avec succès.');
    }

    public function updateReservation(Request $request, Reservation $reservation) {

        $request->validate([
            'statut' => 'required|in:en attente,accepté,refusé',
        ]);

        $reservation->statut = $request->statut;
        $reservation->save();

        return redirect()->back()->with('success', 'Statut de la réservation mis à jour avec succès.');
    }

    public function reservations() {

        // Récupérer les trajets du conducteur avec leurs réservations
        $trajets = auth()->user()->trajets()->with('reservations')->get();
    
        return view('conducteur.reservations.index', compact('trajets'));
    }

    public function showReservations (Trajet $trajet) {

        $reservations = $trajet->reservations;

        return view('conducteur.reservations.show', compact('trajet', 'reservations'));
    }


    // Supprimer un trajet
    public function destroy($id) {

        $trajet = Trajet::where('conducteur_id', auth()->id())->findOrFail($id);
        $trajet->delete();

        return redirect()->route('conducteur.trajets.index')->with('success', 'Trajet supprimé avec succès.');
    }
}
