$(document).ready(function() {
    $('.existing-list .boxes').after('<div id="nav" class="pagination"></div>');
    var rowsShown = 6
    var rowsTotal = $('.existing-list .boxes .list-box').length;
    // console.log(rowsTotal)
    var numPages = rowsTotal / rowsShown;
    for (i = 0; i < numPages; i++) {
        var pageNum = i + 1;
        $('#nav').append('<a href="#" class="pag-btn" rel="' + i + '">' + pageNum + '</a> ');
    }
    $('.existing-list .boxes .list-box').hide();
    $('.existing-list .boxes .list-box').slice(0, rowsShown).show();
    $('#nav a:first').addClass('active');
    $('#nav a').bind('click', function(e) {
        e.preventDefault();
        $('#nav a').removeClass('active');
        $(this).addClass('active');
        var currPage = $(this).attr('rel');
        var startItem = currPage * rowsShown;
        var endItem = startItem + rowsShown;
        $('.existing-list .boxes .list-box').css('opacity', '0').hide().slice(startItem, endItem).
        css('display', 'flex').animate({
        opacity: 1
        }, 300);
    });
});


$('#featured').change(function() {
    var file = $('#featured')[0].files[0].name;
    $(this).prev('label').text(file);
});

$('#additional').change(function() {
    var add = document.getElementById('additional')
    for (var i = 0; i < add.files.length; ++i){
        if(i === 0){
            var name = add.files[i].name;
        } else {
            name = name.concat(", ", add.files[i].name);
        }
    }
    $(this).prev('label').text(name);
})

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