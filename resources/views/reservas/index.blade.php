<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Reservas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Fecha</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Turno</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nombre</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Teléfono</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Comensales</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Notas/Alergias</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($reservas as $reserva)
                            <tr>
                                <td class="px-4 py-2">{{ $reserva -> date}}</td>
                                <td class="px-4 py-2">{{ $reserva -> time}}</td>
                                <td class="px-4 py-2">{{ $reserva -> name}}</td>
                                <td class="px-4 py-2">{{ $reserva -> phone}}</td>
                                <td class="px-4 py-2">{{ $reserva -> email}}</td>
                                <td class="px-4 py-2">{{ $reserva -> guests}}</td>
                                <td class="px-4 py-2">{{ $reserva -> notes}}</td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-4 py-4 text-center text-gray-500">Todavía no hay reservas.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>