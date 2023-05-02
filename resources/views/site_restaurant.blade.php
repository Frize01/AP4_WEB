<x-template color="{{$restaurant->COULEUR_SITE}}" background="{{$restaurant->BG_RESTAURANT}}">
    <br></br>
    <br></br>
    <br></br>
    <h1 class="text-center text-4xl font-extrabold" >Bienvenue dans le restaurant : {{$restaurant->NOM_RESTAURANT}} </h1>
    <br></br>
    <br></br>
    
    
    <div>
    @foreach ($recettes->groupBy('LIBELLE_CATEGORIE') as $categorie => $recettesParCategorie)
    <br></br>
    <br></br>
    <h2 class="text-3xl font-extrabold text-gray-800 mb-4 text-center">______________________________________________</h2>
        <h2 class="text-3xl font-extrabold text-gray-800 mb-4 text-center">{{ $categorie }}</h2>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 items-center justify-center items-center space-x-5">
        @foreach ($recettesParCategorie as $key => $recette)
            @if ($key == 0 || $recette->NOM_RECETTE != $recettesParCategorie[$key-1]->NOM_RECETTE)
            @php
                $zeroStock = false;
            @endphp
            <div class="bg-[{{$restaurant->BG_RESTAURANT}}] shadow rounded-lg overflow-hidden">
                <div class="relative pb-48 overflow-hidden">
                <img class="absolute inset-0 h-full w-full object-cover"
                    src="{{ $recette->PHOTO_RECETTE }}"
                    alt="{{ $recette->NOM_RECETTE }}">
                </div>
                <div class="px-4 py-3">
                <h3 class="text-lg font-semibold text-gray-800">{{ $recette->NOM_RECETTE }}</h3>
                <p class="text-gray-600 font-semibold">{{ $recette->DESCRIPTION_RECETTE }}</p>
                <div class="mt-2 flex items-center text-sm text-gray-500">
                    <span class="mr-1 font-semibold">Ingrédients (ou contient) :</span>
                    <span>
                    @foreach ($recettes as $ingredient)
                        @if ($ingredient->NOM_RECETTE == $recette->NOM_RECETTE && !empty($ingredient->NOM_INGREDIANT))
                        {{ $ingredient->NOM_INGREDIANT }}@if (!$loop->last), @endif
                        @endif
                    @endforeach
                    </span>
                </div>
                <div class="mt-2 flex items-center text-sm text-gray-500">
                    <p class="mr-1 font-semibold">Allergènes:</p>
                    <span>
                    @foreach ($recettes as $allergene)
                        @if ($allergene->NOM_RECETTE == $recette->NOM_RECETTE && !empty($allergene->LIBELLE_ALLERGENE))
                        {{ $allergene->LIBELLE_ALLERGENE }}@if (!$loop->last), @endif
                        @endif
                    @endforeach
                    </span>
                </div>
                <div class="mt-2 flex items-center text-sm text-gray-500">
                    <span class="text-3xl">{{ $recette->PRIXHT }} €</span>
                </div>
                @foreach ($recettes as $stock)
                            @if ($stock->NOM_RECETTE == $recette->NOM_RECETTE)
                                @if (empty($stock->STOCK_ING))
                                    @php
                                        $zeroStock = true;
                                    @endphp
                                @endif
                            @endif
                @endforeach
                @if ($zeroStock == true)
                    <h2 class="text-3xl font-extrabold text-gray-800 mb-4 text-center">HORS STOCK</h2>
                @endif
                </div>
            </div>
            @endif
        @endforeach
        </div>
    @endforeach
    </div>
    <br></br>
    <br></br>
</x-template>