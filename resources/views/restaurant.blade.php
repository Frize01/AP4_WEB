<x-template>
    <br></br>
    <br></br>
    <br></br>
    <h2 class="text-center text-2xl ml-4 font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-5xl">Liste de nos restaurants partenaires !</h2>
    <br></br>
    <input type="text" class="item-center" placeholder="Choississez selon vos préférences" size="52">
    <div class="w-full justify-center">
        <div class="flex flex-wrap justify-center items-center space-y-5">
        @foreach($restaurants as $restaurant)
        <a href="/restaurant/{{$restaurant->ID_RESTAURANT}}" class="flex flex-col flex-rap items-end-2 ml-6 w-1/2 flex-end items-center bg-white border rounded-lg shadow-md md:flex-row md:max-w-xl hover:bg-gray-100">
            <img class="object-cover  w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{$restaurant->LOGO_RESTAURANT}}" alt="">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{$restaurant->NOM_RESTAURANT}}</h5>
                <p class="mb-3 font-normal text-gray-700">{{$restaurant->ADRESSE_RESTAURANT}}</p>
            </div>
        </a>
        <br></br>
        @endforeach
        </div>
    <div>
    <br></br>
</x-template>