<script>

$.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
  
    $('.confirm-order').on('click', function(e){
    e.preventDefault();
    
    //GET ORDER NUMBER
    const orderno = $(this).attr('order-no');

    //CONFIRM ALERT
    $.alert({
    title: 'Confirm',
    content: 'Confirm Order ?',
    type: 'blue',
    typeAnimated: true,
    rtl: false,
    closeIcon: true,
    buttons: {
        confirm: {
            text: 'Confirm',
            btnClass: 'btn-success',
            action: function () {
                // MAKE AJAX POST REQUEST
                $.ajax({
              url:"{{ route('admin.confirm.order') }}",
            type: "POST",
            data:{
                "_token": "{{ csrf_token() }}",
                "orderno":orderno
            },
            //RETURN RESPONSE FROM SERVER
            success:function(response){
                if(response.code == 200){
                  Snackbar.show({
                text: 'Order Confirmed',
                pos: 'top-right'
                });
                    window.location.reload();
                }else{
                     console.log(response);
                }
             
              
            },
            
           });
            }
        },
        cancel: {
            text: 'Cancel',
            btnClass: 'btn-blue',
            action: function () {
                $.alert('Action Canceled!');
            }
        }
    }
});
    });

    
</script>