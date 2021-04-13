<script>

    $('.remove-cart').on('click', function(e){
    e.preventDefault();
    const id = $(this).attr('data-id');
    $.alert({
    title: 'Confirm',
    content: 'Remove Product ?',
    type: 'red',
    typeAnimated: true,
    rtl: false,
    closeIcon: true,
    buttons: {
        confirm: {
            text: 'Remove',
            btnClass: 'btn-danger',
            action: function () {
    $.ajax({
    type: "DELETE",
    url: '{{ url('cart/remove') }}' + '/' + id,
    data: {
    'id': id,
    },
    success: function(data) {
        window.location = '{{ route('cart') }}'
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