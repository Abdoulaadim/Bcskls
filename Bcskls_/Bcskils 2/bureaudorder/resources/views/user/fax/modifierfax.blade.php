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
        <h1 class="text-xl font-bold text-white capitalize dark:text-white text-center mb-14"> <u>Ajouter Fax </u></h1>
        <form method="post" action="{{ route('faxupdate',$fax->id) }}">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="grid xl:grid-cols-2 gap-6 mt-4 sm:grid-cols-1">


                <div>
                    <label class="text-white dark:text-gray-200" for="passwordConfirmation">N° fax</label>
                    <input id="numfax" name="numfax" value="{{$fax->numfax}}" type="text"  class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>
                <div>
                    <label class="text-white dark:text-gray-200" for="passwordConfirmation">telefax</label>
                    <input id="telefax" name="telefax" value="{{$fax->telefax}}" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>
                <div>
                    <label class="text-white dark:text-gray-200" for="passwordConfirmation">Telephone</label>
                    <input id="telephone" name="telephone" value="{{$fax->telephone}}" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>

                <div>
                    <label class="text-white dark:text-gray-200" for="passwordConfirmation"> Nom Emetteur</label>
                    <input id="emetteur" name="emetteur" value="{{$fax->emetteur}}" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>
                <div>
                    <label class="text-white dark:text-gray-200" for="passwordConfirmation">Nom Recepteur</label>
                    <input id="recepteur" name="recepteur" value="{{$fax->recepteur}}" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>

                <div>
                    <label class="text-white dark:text-gray-200" for="passwordConfirmation">Date fax</label>
                    <input id="datefax" name="datefax" value="{{$fax->datefax}}" type="date" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>

                <div>
                    <label class="text-white dark:text-gray-200" for="passwordConfirmation">Objet</label>
                    <input id="objet" name="objet" value="{{$fax->objet}}" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>
                <div>
                    <label class="text-white dark:text-gray-200" for="passwordConfirmation">Description</label>
                    <input id="description" name="description" value="{{$fax->description}}" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>

              



            </div>

            <div class="flex justify-end mt-6">
                <button type="submit" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-green-500 rounded-md hover:bg-green-700 focus:outline-none focus:bg-gray-600">Enregistrer</button>
            </div>
        </form>

    </section>

    </section>
</x-app-layout>