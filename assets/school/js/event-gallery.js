$('[data-toggle="image"]').on('click',function(event) {
    var data_target = $(this).attr('data-target');
    $('.gallery').hide();
    $(data_target).show();
})

$('.gallery img').on('click', function() {
    var img = $('<img />',{src:this.src,'class':'full-img'});
    $('.full').html(img).css('display','flex');
    console.log('done!');
});

$('.full , .full-img').on('click',function(event) {
    $('.full').html('').css('display','none');
})