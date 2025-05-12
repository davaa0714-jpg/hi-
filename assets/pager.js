

$(document).ready(function() {
    $("#mytable").fancyTable({
        pagination: true,
        perPage:11,
        // globalSearch:true
        searchable: false,
    });		
});

$(document).ready(function() {
    $("#mytable_projects").fancyTable({
        pagination: true,
        perPage:11,
        // globalSearch:true
        searchable: false,
    });		
});

$(document).ready(function() {
    $("#mytable2").fancyTable({
        sortColumn:0,
        pagination: true,
        perPage:10,
        // globalSearch:true
        searchable: false,
    });		
});

$(document).ready(function() {
    $("#mytable-att").fancyTable({
        pagination: true,
        perPage:14,
        // globalSearch:true
        searchable: false,
    });		
});


$(document).ready(function() {
    $("#table3").fancyTable({
        sortColumn:0,
        pagination: true,
        perPage:15,
        // globalSearch:true
        searchable: false,
    });		
});

$(document).ready(function() {
    $("#table4").fancyTable({
        sortColumn:0,
        pagination: true,
        perPage:14,
        // globalSearch:true
        searchable: false,
    });		
});

$(document).ready(function() {
    $("#table5").fancyTable({
        sortColumn:0,
        pagination: true,
        perPage:10,
        // globalSearch:true
        searchable: false,
    });		
});

function tableSearch(){
    let input, filter, table, tr, td, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("mytable");
    tr = table.getElementsByTagName("tr");
    console.log("fuck")

    for(let i = 0; i < tr.length; i++){
        td = tr[i].getElementsByTagName("td")[0];
        if(td) {
            txtValue = td.textContent || td.innerText;
            if(txtValue.toUpperCase().indexOf(filter) > -1){
                tr[i].style.display = "";
            }
            else{
                tr[i].style.display = "none";
            }
        }
    }
}

var $selects = $('.com-container select');
$selects.on('change', getValues).first().trigger("change");
function getValues() {
    var vals = $selects.map(function() {
        return this.value;
    }).get();
    console.log(vals)
    if (vals.join('') === "bb2022") {
        $(".data").not("." + vals.join('.')).hide();
        $("." + vals.join('.')).fadeIn(900);
    }else if(vals.join('') === "zsh2022") {
        $(".data").not("." + vals.join('.')).hide();
        $("." + vals.join('.')).fadeIn(900);
    }else if(vals.join('') === "bb2021") {
        $(".data").not("." + vals.join('.')).hide();
        $("." + vals.join('.')).fadeIn(900);
    }else if(vals.join('') === "bb2020") {
        $(".data").not("." + vals.join('.')).hide();
        $("." + vals.join('.')).fadeIn(900);
    }else{
        $(".data").hide();
    }
}


$(document).ready(function(){
    $('.branch-row .zhs').show();
    $('.branch-row').not("." + 'zhs').hide();
    $('.row-content').click(function(){
        const rel = $(this).attr('data-filter')
        $('.branch-row').not("." + rel).hide();
        $('.branch-row').filter("." + rel).show();
    })
    $('.sec-row').click(function(){
        $(this).addClass('row-active').siblings().removeClass('row-active')
    })
})

// tender pag
$(document).ready(function() {
    $('.tender').after('<div id="nav" class="pagination"></div>');
    var rowsShown = 9
    var rowsTotal = $('.tender .tender-box').length;
    console.log(rowsTotal)
    var numPages = rowsTotal / rowsShown;
    for (i = 0; i < numPages; i++) {
        var pageNum = i + 1;
        $('#nav').append('<a href="#" class="pag-btn" rel="' + i + '">' + pageNum + '</a> ');
    }
    $('.tender .tender-box').hide();
    $('.tender .tender-box').slice(0, rowsShown).show();
    $('#nav a:first').addClass('active');
    $('#nav a').bind('click', function(e) {
        e.preventDefault();
        $('#nav a').removeClass('active');
        $(this).addClass('active');
        var currPage = $(this).attr('rel');
        var startItem = currPage * rowsShown;
        var endItem = startItem + rowsShown;
        $('.tender .tender-box').css('opacity', '0').hide().slice(startItem, endItem).
        css('display', 'flex').animate({
        opacity: 1
        }, 300);
    });
});