<x-template>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-frostblue overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>Bienvenue ! {{Auth::user()->name}}</p>
                </div>
            </div>
        </div>
    </div>

    @if(isset($commandesSurPlaceServeur))
    <div class="bg-frostblue p-4">
        <h2 class="text-lg font-medium mb-4">Liste de commandes</h2>

        <ul class="divide-y divide-gray-200">
        @foreach ($commandesSurPlaceServeur as $commande)
            <li class="py-2 flex items-center justify-between">
            <div class="flex items-center">
                <span class="font-medium">Numéro commande : C{{$commande->ID_COMMANDE}} - {{$commande->PRIX_COMMANDE}}€</span>
            </div>
            <div class="flex items-center">
                <form method="POST" action="/confirmation_commande">
                    @csrf
                    <input type="hidden" name="id_commande" value="{{$commande->ID_COMMANDE}}">
                    <input type="hidden" name="type" value="sur_place">
                    <button class="bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-4 rounded mr-2">Valider</button>
                </form>
                <form method="POST" action="/suppression_commande">
                    @csrf
                    <input type="hidden" name="type" value="sur_place">
                    <input type="hidden" name="id_commande" value="{{$commande->ID_COMMANDE}}">
                    <button class="bg-red-500 hover:bg-red-600 text-white font-medium py-2 px-4 rounded">Supprimer</button>
                </form>
            </div>
            </li>
        @endforeach
        </ul>
    </div>
    @endif
    <br></br>
    @if(isset($commandesEmporterServeur))
    <div class="bg-frostblue p-4">
        <h2 class="text-lg font-medium mb-4">Liste de commandes</h2>

        <ul class="divide-y divide-gray-200">
        @foreach ($commandesEmporterServeur as $commande)
            <li class="py-2 flex items-center justify-between">
            <div class="flex items-center">
                <span class="font-medium">Client {{ $commande->ID }} - {{$commande->PRIX_COMMANDE}}€</span>
            </div>
            <div class="flex items-center">
                <form method="POST" action="/validation_commande">
                    @csrf
                    <input type="hidden" name="id_commande" value="{{$commande->ID_COMMANDE}}">
                    <input type="hidden" name="type" value="a_emporter">
                    <button class="bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-4 rounded mr-2">Valider</button>
                </form>
                <form method="POST" action="/suppression_commande">
                    @csrf
                    <input type="hidden" name="type" value="a_emporter">
                    <input type="hidden" name="id_commande" value="{{$commande->ID_COMMANDE}}">
                    <button class="bg-red-500 hover:bg-red-600 text-white font-medium py-2 px-4 rounded">Supprimer</button>
                </form>
            </div>
            </li>
        @endforeach
        </ul>
    </div>
    <br></br>
    <div class="flex items-center">
        <a href="/dashboard/commande_sur_place"><button class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded mr-2">Prise de commande</button></a>
    </div>
    @endif
    @if(isset($commandesSurplace))
        <div class="bg-frostblue shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-lg font-bold mb-4">Liste des commandes sur place</h2>
            <ul class="list-disc ml-4">
                @foreach ($commandesSurplace as $commande)
                    <li class="mb-2">
                        <p>{{ $commande->NOM_RESTAURANT }} - Serveur {{$commande->ID}} - {{$commande->PRIX_COMMANDE }}€</p>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(isset($commandesEmporter))
        <div class="bg-frostblue shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-lg font-bold mb-4">Liste des commandes à emporter</h2>
            <ul class="list-disc ml-4">
                @foreach ($commandesEmporter as $commande)
                    <li class="mb-2">
                        <p>{{$commande->NOM_RESTAURANT}} - {{ $commande->DESCRIPTION_COMMANDE }} - {{ $commande->PRIX_COMMANDE }}€</p>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <br></br>
    <br></br>
</x-template>
