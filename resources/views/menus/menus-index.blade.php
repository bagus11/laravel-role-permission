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

    {{-- Add SubMenus --}}
    
    <div class="relative z-auto overflow-y-auto hidden ease-out duration-400" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="addMenusModal">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative w-full max-w-xl h-full md:h-auto overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4  border-b border-gray-300">
                        <div class="sm:flex sm:items-start">
                            <h4>Form Add Menus</h4>
                        </div>
                       
                    </div>
                    <div class="mt-4 px-8 border-b border-gray-300"id="other_address">
                        <div class="text-white-700 mt-4" style="justify-content: left;max-width:830px" >
                            <div class="mt-3 sm:mt-0 sm:ml-4 sm:text-left">
                                <div class="container px-6">
                                    <div class="grid grid-cols-4">
                                        <div class="col-span-1 mt-2">
                                            <label  for="">Name</label>
                                        </div>
                                        <div class="col-span-3">
                                            <input type="text" class="w-full" name="menus_name" id="menus_name">
                                            <span  style="color:red;" class="message_error text-red block menus_name_error"></span>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="grid grid-cols-4">
                                        <div class="col-span-1 mt-2">
                                            <label for="">Type</label>
                                        </div>
                                        <div class="col-span-3">
                                            <select name="menus_type_option" class="select2" id="menus_type_option" style="width: 100%">
                                                <option value="">Pilih tipe</option>
                                                <option value="1">Menus</option>
                                                <option value="2">Sub Menus</option>
                                            </select>
                                            <input type="text" class="w-full" name="type_menus" id="type_menus">
                                            <span  style="color:red;" class="message_error text-red block type_menus_error"></span>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="grid grid-cols-4">
                                        <div class="col-span-1 mt-2">
                                            <label for="">Link</label>
                                        </div>
                                        <div class="col-span-3">
                                            <input type="text" class="w-full" name="menus_link" id="menus_link">
                                            <span  style="color:red;" class="message_error text-red block menus_link_error"></span>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="grid grid-cols-4 mb-4">
                                        <div class="col-span-1 mt-2">
                                            <label for="">Description</label>
                                        </div>
                                        <div class="col-span-3">
                                            <textarea class="shadow appearance-none border rounded w-full py-2  text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description_submenus"name="description_submenus"></textarea>
                                            <span  style="color:red;" class="message_error text-red block description_submenus_error"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-2 sm:flex sm:flex-row-reverse sm:px-6">
                        <button Phone="button" class="inline-flex w-full justify-center rounded-md border border-transparent bg-green-400 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-green-500 fg sm:ml-3 sm:w-auto sm:text-sm" id="save_add_menus">Save</button>
                        <button Phone="button" class="inline-flex w-full justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 fg sm:ml-3 sm:w-auto sm:text-sm" id="close_add_menus">  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--End Add Menus --}}
</x-app-layout>
<script>
    // Call Function
    get_data_menus()
    // End Call Function
    // Operation
    $('#add_menus').on('click', function(){
        $('#addMenusModal').show();
    })
    $('#close_add_menus').on('click',function(){
        $('#addMenusModal').hide();
    })
    $('#menus_type_option').on('change', function(){
        var menus_type_option = $('#menus_type_option').val()
        $('#type_menus').val(menus_type_option)
    })
    // End Operation
    // Function
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
    // End Funciton
</script>
