<script>
$('.sendreceipt').on('click',function(e) {
    e.preventDefault();
    $.ajax({
       type:'POST',
       url: $(this).attr('href'),
       data:{quantity:1},
       dataType: "json",
       success:function(data){
        $('.checkout_items').html(data.cartCount);
        mdtoast('Product added to cart successfully', { type: mdtoast.SUCCESS, interaction: false, interactionTimeout: 3000 });
        // console.log(data.cartCount)
       }
    });

});
</script>