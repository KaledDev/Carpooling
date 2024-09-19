<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trajet;
use App\Models\Reservation;
use Auth;
class PassagerController extends Controller
{
    public function accueil() {

        return view('passager.accueil');
    }

    public function index() {

        // Récupérer tous les trajets disponibles
        $trajets = Trajet::all();
        
        // Passer les trajets à la vue
        return view('passager.trajets.index', compact('trajets'));
    }

    public function detail($id) {
        $trajet = Trajet::findOrFail($id);
        return view('passager.trajets.details', compact('trajet'));
    }

    public function reserver(Request $request, $id) {

        $request->validate([
            'nombre_places' => 'required|integer|min:1',
        ]);
    
        $trajet = Trajet::findOrFail($id);
    
        // Vérifier si l'utilisateur a déjà une réservation pour ce trajet
        $reservationExistante = Reservation::where('passager_id', Auth::id())
            ->where('trajet_id', $id)
            ->exists();
    
        if ($reservationExistante) {
            return redirect()->route('passager.accueil')->with('error', 'Vous avez déjà une réservation pour ce trajet.');
        }
    
        // Vérifier si des places sont disponibles
        if ($trajet->nombre_places < $request->nombre_places) {
            return redirect()->route('passager.accueil')->with('error', 'Pas assez de places disponibles.');
        }
    
        // Créer la réservation
        Reservation::create([
            'passager_id' => Auth::id(),
            'trajet_id' => $trajet->id,
            'statut' => 'en attente',
            'nombre_places' => $request->nombre_places,
        ]);
    
        // Mettre à jour le nombre de places disponibles
        $trajet->nombre_places -= $request->nombre_places;
    
        // Vérifier si le nombre de places restantes est 0 et mettre à jour le statut
        if ($trajet->nombre_places == 0) {
            $trajet->status = 'complet';  // Met à jour le statut à "complet"
        }
    
        $trajet->save();
    
        return redirect()->route('passager.trajets.index')->with('success', 'Réservation réussie.');
    }
    
    public function reservations() {

        // Récupérer les réservations de l'utilisateur connecté
        $reservations = Reservation::where('passager_id', Auth::id())->get();

        // Passer les réservations à la vue
        return view('passager.reservations.index', compact('reservations'));
    }

    
}
