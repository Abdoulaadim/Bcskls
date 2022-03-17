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


    <section class="container px-6 py-4 mx-auto mt-24">
        <div>
            <div class="min-h-screen py-8 justify-center">
                <div class='overflow-x-auto  mx-auto max-h-full'>
                
                    <table class=' w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                        <thead class="bg-gray-900">
                            <tr class="text-white text-left">
                                <th class="font-semibold text-sm uppercase px-6 py-4"> Name </th>
                                <th class="font-semibold text-sm uppercase px-6 py-4"> Cin </th>
                                <th class="font-semibold text-sm uppercase px-6 py-4"> Email </th>
                                <th class="font-semibold text-sm uppercase px-6 py-4">Role </th>
                            </tr>
                        </thead>

                        <tbody class=" divide-gray-200">
                        @foreach($users as $data)
                            <tr>
                                <td class="px-6 py-4 ">
                                {{$data->name}}
                                </td>
                                <td class="px-6 py-4 ">
                                {{$data->cin}}
                                </td>
                                <td class="px-6 py-4 ">
                                {{$data->email}}
                                </td>
                                <td class="px-6 py-4 ">
                                {{$data->role}}
                                </td>

                              
                            </tr>
                            @endforeach


                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>