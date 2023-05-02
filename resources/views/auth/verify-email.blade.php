<x-template>
    <br></br>
    <br></br>
    <br></br>
    <div class="flex justify-center items-center h-screen">
        <div class="text-center w-1/2 bg-frostblue p-8 rounded-lg">
            <div class="mb-4 text-sm text-gray-600">
                <p>Merci de vous être enregistrer. Par soucis de sécurité et de vérification, un mail vous a été envoyé sur l'adresse email indiqué. Vous pouvez la valider en cliquant sur le lien présent dans l'envoi.</p>
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600">
                    <p>'Un nouvel email a été envoyé.'</p>
                </div>
            @endif

            <div class="mt-4 flex items-center justify-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <x-primary-button>
                            <p>Renvoyé un email</p>
                        </x-primary-button>
                    </div>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <p>('Déconnexion')</p>
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-template>
