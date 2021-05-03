<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Mahasiswa List
    </h2>
</x-slot>

<div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
    @if($isOpen)

    @include('mahasiswa.create')

    @endif

    @if($isOpenDelete)

    @include('mahasiswa.delete')

    @endif

    <button wire:click="add()" id="add-modal-btn" type="button"
        class="mb-8 w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm">
        +
    </button>

    @if (session()->has('message'))
    <div id="alert" class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path
                d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
        </svg>
        <p id="hello">
            {{session('message')}}
        </p>
    </div>

    <script>
        const alert = document.getElementById("alert");
        setTimeout(function() {
            alert.style.display = 'none'
            }, 2000);

    </script>

    @endif

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th id="jdlnama" scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    NAMA
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    NIM
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ALAMAT
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    AKSI
                                </th>

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($data_mahasiswa as $data)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-wrap">
                                    <div class="flex items-center">

                                        <div class="text-center text-sm font-medium text-gray-900 md:text-left">
                                            {{$data->nama}}
                                        </div>

                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{$data->nim}}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-wrap">
                                    <div class="text-sm text-gray-900">
                                        {{$data->alamat}}
                                    </div>
                                </td>

                                <td class="px-6 py-4 sm:whitespace-wrap md:whitespace-nowrap text-sm font-medium">
                                    <button wire:click="edit({{$data->id}})" type="button"
                                        class="w-full text-sm inline-flex justify-center mb-2 sm:mb-2 md:mb-0 rounded-md border border-transparent shadow-sm px-4 py-1 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm">
                                        Edit
                                    </button>
                                    <button wire:click="selectItem({{$data->id}}, 'delete')" type="button"
                                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-1 bg-pink-600 text-base font-medium text-white hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500 sm:ml-3 sm:w-auto sm:text-sm">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

            {{ $data_mahasiswa->links() }}

        </div>
    </div>
</div>