<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h5>
                        Ramais Disponíveis:
                    </h5>
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Ramal</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Setor</th>
                            <th scope="col">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($dados as $dado)
                          <tr>
                            <th>{{ $dado->name }}</th>
                            <th>{{ $dado->callerid }}</th>
                            <th>{{ $dado->context }}</th>
                            <th>
                                @if(!empty($dado->ipaddr))
                                    Online
                                @else  
                                    Offline
                                @endif
                            </th>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
