@extends('layout.user.u_master')
@section('body')
<style>
    table.dataTable tbody th, table.dataTable tbody td {
    padding: 8px 10px !important; /* e.g. change 8x to 4px here */
}
</style>
    <center>
        <div class="container px-36 mt-6">
            {{-- form detail --}}
            <form action="{{ route("privileged_admin/post_dlm/") }}" method="POST" class="flex flex-col gap-3" enctype="multipart/form-data">
                @csrf
                @method('POST')
                {{-- show value from $bem --}}
                <div class="flex flex-col gap-3">
                    <label for="" class="text-left">Foto Calon</label>
                    <input type="file" class="w-full rounded-md" name="image">
                </div>
                <div class="flex flex-col gap-3">
                    <label for="" class="text-left">No. Urut</label>
                    <input type="text" class="w-full rounded-md" name="no_urut">
                </div>

                <div class="flex flex-col gap-3">
                    <label for="" class="text-left">Nama Calon</label>
                    <input type="text" class="w-full rounded-md" name="name">
                </div>
                <div class="flex flex-col gap-3">
                    <label for="" class="text-left">Program Studi</label>
                    <input type="text" class="w-full rounded-md" name="study_program">
                </div>
                <div class="flex flex-col gap-3">
                    <label for="" class="text-left">Visi</label>
                    <textarea name="visi" class="rounded-md"></textarea>
                </div>
                <div class="flex flex-col gap-3">
                    <label for="" class="text-left">Misi</label>
                    <textarea name="misi" class="rounded-md"></textarea>
                </div>
                {{-- save button --}}
                <div class="flex flex-col gap-3">
                    <button type="submit" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                         Submit <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </form>
            {{-- show data only from bem --}}


        </div>
    </center>
        <script type="text/javascript">
            tinymce.init({
                selector: 'textarea#tiny'
            });
        </script>


@endsection
