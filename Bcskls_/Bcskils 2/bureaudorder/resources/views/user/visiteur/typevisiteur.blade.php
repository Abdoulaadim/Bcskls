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
        <h1 class="text-xl font-bold text-white capitalize dark:text-white text-center mb-14"> <u>Type visiteur </u></h1>
        <div id="myDIV" class=" text-center">
            <p class="h2 text-white mb-24">choisir le type de visiteur </p>

            <a href="svisiteur">
                <button class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                    Visiteur simple
                </button>
            </a>
            <a href="rvisiteur">
                <button class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                    visiteur reclamation
                </button>
            </a>
            <a href="ivisiteur">
                <button class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                    visiteur information
                </button>
            </a>
        </div>

    </section>


    </section>
</x-app-layout>