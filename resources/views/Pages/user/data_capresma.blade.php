@extends('layout.user.u_master')
@section('body')
<style>
    table.dataTable tbody th, table.dataTable tbody td {
    padding: 8px 10px !important; /* e.g. change 8x to 4px here */
}
</style>
    <center>
        <div class="container px-16 mt-6">
            {{-- button add --}}
            <a href="/privileged_admin/add_capresma" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mb-5">
                <i class="fas fa-plus"></i>  Tambah Pasangan
            </a>
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No. Urut</th>
                        <th>Pasangan</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bem as $b)
                        <tr>
                            <td class="pb-10 text-center">{{ $b->no_urut }}</td>
                            <td class="pb-10">{{ $b->name }}</td>
                            <td class="pb-10">
                                {{-- button href to detail --}}
                                <a href="/privileged_admin/detail_capresma/{{ $b->id }}" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                  <i class="fas fa-eye"></i>  Detail
                                </a>
                                <a href="/privileged_admin/delete_capresma/{{ $b->id }}" class="mt-3 block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                                    <i class="fas fa-times"></i>  Hapus
                                  </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </center>

    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                fixedColumns:   {
                    heightMatch: 'none'
                }
            });
        });


    </script>


@endsection
