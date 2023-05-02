<x-template>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <h1 class="text-center text-4xl font-extrabold" >Prise de commande</h1>
    <br></br>
    <br></br>
    <div>
    @foreach ($recettes->groupBy('LIBELLE_CATEGORIE') as $categorie => $recettesParCategorie)
    <br></br>
    <br></br>
        <h2 class="text-3xl font-extrabold text-gray-800 mb-4 text-center">______________________________________________</h2>
            <h2 class="text-3xl font-extrabold text-gray-800 mb-4 text-center">{{ $categorie }}</h2>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($recettesParCategorie as $key => $recette)
                @if ($key == 0 || $recette->NOM_RECETTE != $recettesParCategorie[$key-1]->NOM_RECETTE)
                <form method="POST" action="/ajout_produit">
                @csrf
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
                        <input type="hidden" name="produit" value="{{$recette->ID_RECETTE}}">
                    </div>
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
                    @if ($zeroStock == false)
                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-4 rounded mr-2">Rajouter</button>
                    @else
                    <h2 class="text-3xl font-extrabold text-gray-800 mb-4 text-center">HORS STOCK</h2>
                    @endif
                </div>
                </form>
                @endif
            @endforeach
            </div>
        @endforeach
    </div>
    <br></br>
    <br></br>
    @if (session()->has('produits') && !empty(session()->get('produits')))
    <div class="mx-auto">
    <table class="min-w-full divide-y divide-gray-200 border">
        <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Recette</th>
                <th class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Prix</th>
                <th class="px-6 py-3 bg-gray-50"></th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < count(session()->get('produits')); $i++)
                @foreach ($recettes_commande as $recette)
                    @if ($recette->ID_RECETTE == session()->get('produits')[$i])
                        <tr>
                            <form method="POST" action="/supprimer_produit">
                                @csrf
                                <input type="hidden" name="produit" value="{{$i}}">
                                <td class="px-6 py-4 whitespace-nowrap">{{ $recette->NOM_RECETTE }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">{{ $recette->PRIXHT }}€</td>
                                <td><button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-medium py-2 px-4 rounded">Enlever</button></td>
                            </form>
                        </tr>
                    @endif
                @endforeach
            @endfor
        </tbody>
    </table>
    <form method="POST" action="/validationCommande">
        @csrf
        <button class="bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-4 rounded mr-2"  type="submit">Valider Commande</button>
    </form>
    @endif
</div>

</x-template>