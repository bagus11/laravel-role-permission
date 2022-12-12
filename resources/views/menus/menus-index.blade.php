<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Menus') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="block grid grid-cols-1 gap-6 px-6 py-6 m-auto md:grid-cols-2">
            <div class="max-w-xl py-2 rounded-lg shadow-lg bg-white">
                <div class="px-6 border-b border-gray-300">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="py-3">
                            <h3 style="margin-top:5px">List Menus</h3>
                        </div>
                        <div class="py-3">
                                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"id="add_menus" style="float:right">
                                    <i class="fas fa-plus"></i>
                                </button>
                        </div>
                    </div>
                </div>
             
                <div class="py-3 px-6 border-t border-gray-300 text-gray-600">
                    <div class="container">
                        <table class="table-auto w-full bg-blue-500 supplier-datatable" id="menus_table">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Link</th>
                                    <th class="px-4 py-2">Status</th>
                                    <th class="px-4 py-2">Action</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Sub Menus --}}
            <div class="max-w-xl py-2 rounded-lg shadow-lg bg-white">
                <div class="px-6 border-b border-gray-300">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="py-3">
                            <h3 style="margin-top:5px">List Sub Menus</h3>
                        </div>
                        <div class="py-3">
                            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" id="add_submenus" style="float:right">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
             
                <div class="py-3 px-6 border-t border-gray-300 text-gray-600">
                    <div class="container">
                        <table class="table-auto w-full bg-blue-500 supplier-datatable" id="submenus_table">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Link</th>
                                    <th class="px-4 py-2">Status</th>
                                    <th class="px-4 py-2">Action</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
</x-app-layout>
<script>
    get_data_menus()
   function get_data_menus(){
    $('#menus_table').DataTable().clear();
        $('#menus_table').DataTable().destroy();
    $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('get_data_menus')}}",
            type: "get",
            dataType: 'json',
            async: true,
            beforeSend: function() {
                SwalLoading('Please wait ...');
            },
            success: function(response) {
                swal.close(); 
                mapping_menus(response)
            },
            error: function(xhr, status, error) {
                swal.close();
                toastr['error']('Failed to get data, please contact ICT Developer');
            }
        });
   }
   function mapping_menus(response){
    for(i = 0; i < response.data.length; i++ )
    {
        var data =''
        data += `<tr style="text-align: center;">
            <td style="text-align: left;">${response.data[i]['name']==null?'':response.data[i]['name']}</td>
            <td style="text-align: left;">${response.data[i]['description']==null?'':response.data[i]['description']}</td>
            <td style="text-align: left;">${response.data[i]['status']==null?'':response.data[i]['status']}</td>
                </tr>
                `;
    }
        $('#menus_table > tbody:first').html(data);
            $(document).ready(function() 
            {
                $('#menus_table').DataTable( {
                    "destroy": true,
                    "scrollX": true,
                    "autoWidth" : false,
                    "searching": true,
                    "aaSorting" : false
            });


    } );
   }
</script>
