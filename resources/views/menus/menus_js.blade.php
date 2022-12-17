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
    $('#save_add_menus').on('click', function(){
        save_menus()
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
             <td style="text-align: left;">${response.data[i]['link']==null?'':response.data[i]['link']}</td>
             <td style="text-align: left;">${response.data[i]['flg_aktif']==0?'inactive':'active'}</td>
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
    function save_menus(){
        var menus_name = $('#menus_name').val();
        var type_menus = $('#type_menus').val();
        var menus_link = $('#menus_link').val();
        var description_menus = $('#description_menus').val();

        var data ={
           'menus_name':menus_name, 
           'type_menus':type_menus, 
           'menus_link':menus_link, 
           'description_menus':description_menus, 
        };
        $.ajax({
             headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             url: "{{route('save_menus')}}",
             type: "post",
             data:data,
             dataType: 'json',
             async: true,
             beforeSend: function() {
                 SwalLoading('Please wait ...');
             },
             success: function(response) {
                 swal.close(); 
                 $('.message_error').html('')
                    if(response.status==422)
                    {
                        $.each(response.message, (key, val) => 
                        {
                           $('span.'+key+'_error').text(val[0])
                        });
                        return false;
                    }else{
                        toastr['success'](response.message);
                        window.location = "{{route('menus')}}";
                    }
                
             },
             error: function(xhr, status, error) {
                 swal.close();
                 toastr['error']('Failed to get data, please contact ICT Developer');
             }
         });
        
    }
    // End Funciton
</script>
