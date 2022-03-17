<x-app-layout>
    @extends('menu')
    <div>
        <nav class="bg-gray-800">
            <div class="max-w-6xl mx-auto px-4">
                <div class="flex justify-between">
                    <div class="flex">
                    </div>
                    <div class="md:flex items-center space-x-1">
                        <a href="#" class="py-5 px-3 text-white">
                            <h2> {{ Auth::user()->name }} </h2>
                        </a>
                    </div>
                </div>
        </nav>
    </div>


        
               
                <section class="max-w-4xl p-6 mx-auto bg-gray-800 rounded-md shadow-md dark:bg-gray-800 mt-8">
    <h1 class="text-xl font-bold text-white capitalize dark:text-white text-center mb-14"> <u>Affichage du visiteur </u></h1>
    <form method="post" action="{{ route('visiteurupdate',$visiteur->id) }}" enctype='multipart/form-data'>
            {{ method_field('PUT') }}
            {{ csrf_field() }}

        <div class="grid xl:grid-cols-2 gap-6 mt-4 sm:grid-cols-1">
            <div>
                <label class="text-white dark:text-gray-200" for="cin">CIN</label>
                <input readonly id="cin" name="cin" type="text" value="{{$visiteur->cin}}" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>

            <div>
                <label class="text-white dark:text-gray-200" for="badge">N° badge</label>
                <input readonly id="badge" name="badge" type="text" value="{{$visiteur->badge}}" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>

            <div>
                <label class="text-white dark:text-gray-200" for="Nom">Nom</label>
                <input readonly id="nomvisiteur" name="nomvisiteur" type="text" value="{{$visiteur->nomvisiteur}}" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>

            <div>
                <label class="text-white dark:text-gray-200" for="prenom">prenom</label>
                <input readonly id="prenomvisiteur" name="prenomvisiteur" type="text" value="{{$visiteur->prenomvisiteur}}" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>

            <div>
                <label class="text-white dark:text-gray-200" for="adresse">MAil</label>
                <input readonly id="mailvisiteur" name="mailvisiteur" type="text" value="{{$visiteur->mailvisiteur}}" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>

            <div>
                <label class="text-white dark:text-gray-200" for="passwordConfirmation">Adresse</label>
                <input readonly id="adressevisiteur" name="adressevisiteur" type="text" value="{{$visiteur->adressevisiteur}}" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>

            <div>
                <label class="text-white dark:text-gray-200" for="Telephone">Téléphone</label>
                <input readonly id="telephone" name="telephone" type="text" value="{{$visiteur->telephone}}" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>

        <hr>
        <hr>
    </form>
    
</section>


    </section>
</x-app-layout>