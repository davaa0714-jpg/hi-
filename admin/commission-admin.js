$(document).ready(function(){
    const default_mode = 'barilga';
    let storedMode = sessionStorage.getItem('commission');
    if (!storedMode){
        sessionStorage.setItem('commission', default_mode);
        // let_defValue = sessionStorage.getItem('item');
        $('.barilga').show()
        $('.zasvar').hide()
        $('.bb').addClass('active-filter')
    } else if (storedMode == 'barilga'){
        $('.barilga').show()
        $('.zasvar').hide()
        $('.bb').addClass('active-filter')
    } else {
        $('.barilga').hide()
        $('.zasvar').show()
        $('.zs').addClass('active-filter')
    }
    
    $('.filter-item').click(function(){
        const value = $(this).attr('data-filter')
        sessionStorage.setItem('commission', value);
        let stored = sessionStorage.getItem('commission');
        if(stored == 'barilga'){
            $('.barilga').show()
            $('.zasvar').hide()
        }
        else{
            $('.barilga').hide()
            $('.zasvar').show()
        }
    })
    $('.filter-item').click(function(){
        $(this).addClass('active-filter').siblings().removeClass('active-filter')
    })

})


$('.fa-circle-user').click(function(){
    $('.user-op').toggle();
})


$('#pdf-barilga').change(function() {
    var file = $('#pdf-barilga')[0].files[0].name;
    $(this).prev('label').text(file);
});

$('#pdf-zasvar').change(function() {
    var file = $('#pdf-zasvar')[0].files[0].name;
    $(this).prev('label').text(file);
})

$(document).ready(function() {
    $('.existing-list .boxes').after('<div id="nav" class="pagination"></div>');
    var rowsShown = 10
    var rowsTotal = $('.existing-list .boxes .list-box1').length;
    console.log(rowsTotal)
    var numPages = rowsTotal / rowsShown;
    for (i = 0; i < numPages; i++) {
        var pageNum = i + 1;
        $('#nav').append('<a href="#" class="pag-btn" rel="' + i + '">' + pageNum + '</a> ');
    }
    $('.existing-list .boxes .list-box1').hide();
    $('.existing-list .boxes .list-box1').slice(0, rowsShown).show();
    $('#nav a:first').addClass('active');
    $('#nav a').bind('click', function(e) {
        e.preventDefault();
        $('#nav a').removeClass('active');
        $(this).addClass('active');
        var currPage = $(this).attr('rel');
        var startItem = currPage * rowsShown;
        var endItem = startItem + rowsShown;
        $('.existing-list .boxes .list-box1').css('opacity', '0').hide().slice(startItem, endItem).
        css('display', 'flex').animate({
        opacity: 1
        }, 300);
    });
});

$(document).ready(function() {
    $('.existing-list-zs .zasvar-boxes').after('<div id="nav-zs" class="pagination"></div>');
    var rowsShown = 10
    var rowsTotal = $('.existing-list-zs .zasvar-boxes .list-box1').length;
    console.log(rowsTotal)
    var numPages = rowsTotal / rowsShown;
    for (i = 0; i < numPages; i++) {
        var pageNum = i + 1;
        $('#nav-zs').append('<a href="#" class="pag-btn" rel="' + i + '">' + pageNum + '</a> ');
    }
    $('.existing-list-zs .zasvar-boxes .list-box1').hide();
    $('.existing-list-zs .zasvar-boxes .list-box1').slice(0, rowsShown).show();
    $('#nav-zs a:first').addClass('active');
    $('#nav-zs a').bind('click', function(e) {
        e.preventDefault();
        $('#nav-zs a').removeClass('active');
        $(this).addClass('active');
        var currPage = $(this).attr('rel');
        var startItem = currPage * rowsShown;
        var endItem = startItem + rowsShown;
        $('.existing-list-zs .zasvar-boxes .list-box1').css('opacity', '0').hide().slice(startItem, endItem).
        css('display', 'flex').animate({
        opacity: 1
        }, 300);
    });
});

$(document).ready(function() {
    const param = new URLSearchParams(window.location.search);
    if(param.get('id')){
        $('#publish').hide();
        $('#update').show();
    } else {
        $('#publish').show();
        $('#update').hide();
    }
});

$(document).ready(function() {
    const param = new URLSearchParams(window.location.search);
    if(param.get('idzs')){
        $('#publish-zs').hide();
        $('#update-zs').show();
    } else {
        $('#publish-zs').show();
        $('#update-zs').hide();
    }
});