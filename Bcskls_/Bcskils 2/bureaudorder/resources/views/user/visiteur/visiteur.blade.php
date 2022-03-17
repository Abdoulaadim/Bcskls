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
        <div class="text-center text-3xl ">Visiteur</div>
        <div class="col-sm-12">

            @if(session()->get('success'))
            <div class="bg-green-500 border border-blue-200 text-white px-4 py-3  text-center rounded relative" role="alert">
                <strong class="font-bold">{{ session()->get('success') }}!</strong>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Close</title>
                        <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
            </div>
            @endif
        </div>
        <div>
            <div class="min-h-screen py-8 justify-center">
                <div class='overflow-x-auto  mx-auto max-w-sm float-left'>

                    <div class="relative text-gray-600">
                        <input type="search" name="search" id="search" placeholder="Search" class="bg-white h-10 px-5 pr-10 rounded-full text-sm focus:outline-none">
                        <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
                            <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                                <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div>
                    <a href="/ajoutervisiteur">
                        <div class=" float-right  my-4 ">
                            <span>Ajouter</span>
                            <img src="{{ asset('img/ajouter.png')}}" class="w-12" />
                        </div>
                    </a>
                    <div>
                        <table class=' w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                            <thead class="bg-gray-900">
                                <tr class="text-white text-left">
                                    <th class="font-semibold text-sm uppercase px-6 py-4"> cin </th>
                                    <th class="font-semibold text-sm uppercase px-6 py-4"> N° badge </th>
                                    <th class="font-semibold text-sm uppercase px-6 py-4"> Nom </th>
                                    <th class="font-semibold text-sm uppercase px-6 py-4"> Prenom </th>
                                    <th class="font-semibold text-sm uppercase px-6 py-4"> Adresse </th>
                                    <th class="font-semibold text-sm uppercase px-6 py-4"> Mail </th>
                                    <th class="font-semibold text-sm uppercase px-6 py-4"> Téléphone </th>
                                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> </th>
                                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> </th>
                                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> </th>
                                </tr>
                            </thead>

                            <tbody class=" divide-gray-200">
                                @foreach($visiteur as $data)
                                <tr>
                                    <td class="px-6 py-4 ">
                                        {{$data->cin}}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{$data->badge}}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{$data->nomvisiteur}}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{$data->prenomvisiteur}}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{$data->adressevisiteur}}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{$data->mailvisiteur}}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{$data->telephone}}
                                    </td>


                                    <td class="px-6 py-4 flex justify-center">

                                        <a href="modifiervisiteur/{{$data->id}}">
                                            <img class="w-8 h-8 " src="{{ asset('img/update.png')}}" class="w-12" />
                                        </a>

                                    </td>
                                    <td class="px-6 py-4  justify-center">
                                        @if( Auth::user()->role == "Admin" )
                                        <form method="POST" action="{{ route('visiteur.delete', $data->id) }}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>
                                                <img class="w-8 h-8 " src="{{ asset('img/delete.png')}}" class="w-12" />
                                            </button>
                                        </form>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 flex justify-center">

                                        <a href="searchse/{{$data->id}}">
                                            <img class="w-8 h-8 " src="{{ asset('img/afficher.png')}}" class="w-12" />
                                        </a>

                                    </td>
                                </tr>
                                @endforeach


                            </tbody>

                        </table>
                    </div>
                </div>
            </div>


    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `suppression`,
                    text: "Voulez vous vraiment le supprimer ?",
                    icon: "error",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
        $('#search').on('keyup', function() {
            $value = $(this).val();
            $.ajaxSetup({
                headers: {
                    'csrftoken': '{{ csrf_token() }}'
                }
            });
            $.ajax({
                type: 'get',
                url: "{{route('searchvisiteur')}}",
                data: {
                    'search': $value
                },
                success: function(data) {
                    $('tbody').html(data);
                }
            });
        })
    </script>

</x-app-layout>