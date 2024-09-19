@extends('layouts.main')

@section('content')
<div class="absolute top-4 left-4 flex items-center">
    <a href="{{ route('conducteur.reservations.index') }}" class="flex items-center text-gray-600 hover:text-gray-800">
        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
    </a>
</div>
<div class="container px-4 py-6">
    <h2 class="text-2xl text-center font-bold text-primary700 mb-6">Réservations pour le trajet: {{ $trajet->lieu_depart }} → {{ $trajet->lieu_arrive }}</h2>

    @if($reservations->isEmpty())
        <p>Aucune réservation pour ce trajet.</p>
    @else
    <div class="overflow-x-auto">
        <table class="min-w-full table-fixed divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="w-1/3 px-3 py-3 text-left text-xs font-medium text-text-primary uppercase tracking-wider">Passager</th>
                    <th scope="col" class="w-1/3 px-3 mr-2 py-3 text-left text-xs font-medium text-text-primary uppercase tracking-wider">Date de réservation</th>
                    <th scope="col" class="w-1/3 py-3 text-left text-xs font-medium text-text-primary uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($trajet->reservations as $reservation)
                    <tr>
                        <td class="px-3 py-4 whitespace-nowrap text-sm font-medium text-text-secondary truncate">{{ $reservation->passager->name }}</td>
                        <td class="px-3 py-4 mr-2 whitespace-nowrap text-sm text-text-secondary">{{ $reservation->created_at->format('d/m/Y H:i') }}</td>
                        <td class="py-4 whitespace-nowrap text-sm">
                            <form action="{{ route('conducteur.reservations.update', $reservation->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="statut" class="border text-xs rounded px-2 py-1 w-full max-w-xl" onchange="this.form.submit()">
                                    <option value="en attente" {{ $reservation->statut == 'en attente' ? 'selected' : '' }}>En attente</option>
                                    <option value="accepté" {{ $reservation->statut == 'accepté' ? 'selected' : '' }}>Accepté</option>
                                    <option value="refusé" {{ $reservation->statut == 'refusé' ? 'selected' : '' }}>Refusé</option>
                                </select>
                            </form>                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    @endif
</div>
@endsection
