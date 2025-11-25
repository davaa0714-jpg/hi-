$(document).ready(function(){
    const default_mode = 'standard';
    let storedMode = sessionStorage.getItem('standard-item');
    if (!storedMode){
        sessionStorage.setItem('standard-item', default_mode);
        // let_defValue = sessionStorage.getItem('item');
        $('.standard').show()
        $('.project').hide()
        $('.st').addClass('active-filter')
    } else if (storedMode == 'standard'){
        $('.standard').show()
        $('.project').hide()
        $('.st').addClass('active-filter')
    } else {
        $('.standard').hide()
        $('.project').show()
        $('.pj').addClass('active-filter')
    }
    
    $('.filter-item').click(function(){
        const value = $(this).attr('data-filter')
        sessionStorage.setItem('standard-item', value);
        let stored = sessionStorage.getItem('standard-item');
        if(stored == 'standard'){
            $('.standard').show()
            $('.project').hide()
        }
        else{
            $('.standard').hide()
            $('.project').show()
        }
    })
    $('.filter-item').click(function(){
        $(this).addClass('active-filter').siblings().removeClass('active-filter')
    })

})

$('.fa-circle-user').click(function(){
    $('.user-op').toggle();
})

$('#pdf-standard').change(function() {
    var file = $('#pdf-standard')[0].files[0].name;
    $(this).prev('label').text(file);
});

$('#pdf-project').change(function() {
    var file = $('#pdf-project')[0].files[0].name;
    $(this).prev('label').text(file);
})

$(document).ready(function() {
    $('.existing-list .boxes').after('<div id="nav" class="pagination"></div>');
    var rowsShown = 6
    var rowsTotal = $('.existing-list .boxes .list-box').length;
    console.log(rowsTotal)
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


$(document).ready(function() {
    $('.existing-list-pj .project-boxes').after('<div id="nav-pj" class="pagination"></div>');
    var rowsShown = 6
    var rowsTotal = $('.existing-list-pj .project-boxes .list-box').length;
    console.log(rowsTotal)
    var numPages = rowsTotal / rowsShown;
    for (i = 0; i < numPages; i++) {
        var pageNum = i + 1;
        $('#nav-pj').append('<a href="#" class="pag-btn" rel="' + i + '">' + pageNum + '</a> ');
    }
    $('.existing-list-pj .project-boxes .list-box').hide();
    $('.existing-list-pj .project-boxes .list-box').slice(0, rowsShown).show();
    $('#nav-pj a:first').addClass('active');
    $('#nav-pj a').bind('click', function(e) {
        e.preventDefault();
        $('#nav-pj a').removeClass('active');
        $(this).addClass('active');
        var currPage = $(this).attr('rel');
        var startItem = currPage * rowsShown;
        var endItem = startItem + rowsShown;
        $('.existing-list-pj .project-boxes .list-box').css('opacity', '0').hide().slice(startItem, endItem).
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
    if(param.get('idpj')){
        $('#publish-pj').hide();
        $('#update-pj').show();
    } else {
        $('#publish-pj').show();
        $('#update-pj').hide();
    }
});