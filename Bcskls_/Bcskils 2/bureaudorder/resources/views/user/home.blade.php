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
    <section class="home-section bg-white">

        <div class="grid place-items-center h-screen">

            <div class="text-center   text-5xl ">

            Bienvenu dans l'application de bureau d'order

            </div>
        </div>




    </section>



</x-app-layout>