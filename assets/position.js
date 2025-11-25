// pos


$(document).ready(function(){
    const default_mode = 'position24';
    let storedMode = sessionStorage.getItem('position');
    if (!storedMode){
        sessionStorage.setItem('position', default_mode);
        // let_defValue = sessionStorage.getItem('item');
        $('.position24').show()
        $('.position23').hide()
        $('.position22').hide()
        $('.2024').addClass('active-filter')
    } else if (storedMode == 'position24'){
        $('.position24').show()
        $('.position23').hide()
        $('.position22').hide()
        $('.2024').addClass('active-filter')
    } else if (storedMode == 'position23'){
        $('.position24').hide()
        $('.position23').show()
        $('.position22').hide()
        $('.2023').addClass('active-filter')
    } else {
        $('.position24').hide()
        $('.position23').hide()
        $('.position22').show()
        $('.2022').addClass('active-filter')
    }
    
    $('.filter-item').click(function(){
        const value = $(this).attr('data-filter')
        sessionStorage.setItem('position', value);
        let stored = sessionStorage.getItem('position');
        if(stored == 'position24'){
            $('.position24').show()
            $('.position23').hide()
            $('.position22').hide()
        }
        else if(stored == 'position23'){
            $('.position24').hide()
            $('.position23').show()
            $('.position22').hide()
        } else {
            $('.position24').hide()
            $('.position23').hide()
            $('.position22').show()
        }
    })
    $('.filter-item').click(function(){
        $(this).addClass('active-filter').siblings().removeClass('active-filter')
    })

})
