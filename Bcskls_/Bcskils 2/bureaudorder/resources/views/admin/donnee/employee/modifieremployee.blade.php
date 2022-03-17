<x-app-layout>
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
        <h1 class="text-xl font-bold text-white capitalize dark:text-white text-center mb-14"> <u>Modifier Employée </u></h1>
        <form method="post" action="{{ route('employeeupdate',$employee->id) }}">
            {{ method_field('PUT') }}
            {{ csrf_field() }}

            <div class="grid xl:grid-cols-2 gap-6 mt-4 sm:grid-cols-1">

                <div>
                    <label class="text-white dark:text-gray-200" for="passwordConfirmation">Service</label>
                    <select class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" name="id_service">
                        @foreach ($service as $data)
                        <option value="{{ $data->id }}">{{ $data->nomservice }}</option>
                        @endforeach

                    </select>
                </div>
                <div>
                    <label class="text-white dark:text-gray-200" for="nom">Nom : </label>
                    <input id="nomemployee" name="nomemployee" type="text" value="{{$employee->nomemployee}} " class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>
                <div>
                    <label class="text-white dark:text-gray-200" for="prenom">Prenom : </label>
                    <input id="prenomemployee" name="prenomemployee" type="text" value="{{$employee->prenomemployee}} " class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>


            </div>

            <div class="flex justify-end mt-6">
                <button type="submit" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-green-500 rounded-md hover:bg-green-700 focus:outline-none focus:bg-gray-600">Enregistrer</button>
            </div>
        </form>
    </section>

</x-app-layout>