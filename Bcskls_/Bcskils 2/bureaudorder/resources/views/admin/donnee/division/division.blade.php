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
                <div class='overflow-x-auto  mx-auto max-w-4xl'>
                    <a href="/ajouterdivision">
                        <div class=" float-right  my-4 ">
                            <span>Ajouter</span>
                            <img src="{{ asset('img/ajouter.png')}}" class="w-12" />
                        </div>
                    </a>
                    <table class=' w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                        <thead class="bg-gray-900">
                            <tr class="text-white text-left">
                                <th class="font-semibold text-sm uppercase px-6 py-4"> division </th>
                                <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> </th>
                                <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> </th>
                            </tr>
                        </thead>

                        <tbody class=" divide-gray-200">
                            @foreach($division as $data)
                            <tr>
                                <td class="px-6 py-4 ">
                                    {{$data->nomdivision}}
                                </td>


                                <td class="px-6 py-4 flex justify-center">
                                    <a href="modifierdivision/{{$data->id}}">
                                        <img class="w-8 h-8 " src="{{ asset('img/update.png')}}" class="w-12" />
                                    </a>
                                </td>
                                <td class="px-6 py-4  justify-center">
                                    <form method="POST" action="{{ route('division.delete', $data->id) }}">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>
                                            <img class="w-8 h-8 " src="{{ asset('img/delete.png')}}" class="w-12" />
                                        </button>
                                    </form>
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
    </script>

</x-app-layout>