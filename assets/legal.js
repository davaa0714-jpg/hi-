// tushaal


$(document).ready(function(){
    const default_mode = 'juram-filter';
    let storedMode = sessionStorage.getItem('juram');
    if (!storedMode){
        sessionStorage.setItem('juram', default_mode);
        // let_defValue = sessionStorage.getItem('item');
        $('#juram').show()
        $('#law').hide()
        $('.juram').addClass('active-filter')
    } else if (storedMode == 'juram-filter'){
        $('#juram').show()
        $('#law').hide()
        $('.juram').addClass('active-filter')
    } else {
        $('#juram').hide()
        $('#law').show()
        $('.law').addClass('active-filter')
    }
    
    $('.filter-item').click(function(){
        const value = $(this).attr('data-filter')
        sessionStorage.setItem('juram', value);
        let stored = sessionStorage.getItem('juram');
        if(stored == 'juram-filter'){
            $('#juram').show()
            $('#law').hide()
        }
        else{
            $('#juram').hide()
            $('#law').show()
        }
    })
    $('.filter-item').click(function(){
        $(this).addClass('active-filter').siblings().removeClass('active-filter')
    })

})
