// pos


$(document).ready(function(){
    const default_mode = 'annual24';
    let storedMode = sessionStorage.getItem('annual');
    if (!storedMode){
        sessionStorage.setItem('annual', default_mode);
        // let_defValue = sessionStorage.getItem('item');
        $('.annual24').show()
        $('.annual23').hide()
        $('.annual22').hide()
        $('.annual21').hide()
        $('.annual20').hide()
        $('.2024').addClass('active-filter')
    } else if (storedMode == 'annual23'){
        $('.annual24').hide()
        $('.annual23').show()
        $('.annual22').hide()
        $('.annual21').hide()
        $('.annual20').hide()
        $('.2023').addClass('active-filter')
    }
     else if (storedMode == 'annual22'){
        $('.annual24').hide()
        $('.annual23').hide()
        $('.annual22').show()
        $('.annual21').hide()
        $('.annual20').hide()
        $('.2022').addClass('active-filter')
    } else if (storedMode == 'annual21'){
        $('.annual24').hide()
        $('.annual23').hide()
        $('.annual22').hide()
        $('.annual21').show()
        $('.annual20').hide()
        $('.2021').addClass('active-filter')
    } else {
        $('.annual24').hide()
        $('.annual23').hide()
        $('.annual22').hide()
        $('.annual21').hide()
        $('.annual20').show()
        $('.2020').addClass('active-filter')
    }
    
    $('.filter-item').click(function(){
        const value = $(this).attr('data-filter')
        sessionStorage.setItem('annual', value);
        let stored = sessionStorage.getItem('annual');
        if(stored == 'annual24'){
            $('.annual24').show()
            $('.annual23').hide()
            $('.annual22').hide()
            $('.annual21').hide()
            $('.annual20').hide()
        }
        else if(stored == 'annual23'){
            $('.annual24').hide()
            $('.annual23').show()
            $('.annual22').hide()
            $('.annual21').hide()
            $('.annual20').hide()
        }
        else if(stored == 'annual22'){
            $('.annual24').hide()
            $('.annual23').hide()
            $('.annual22').show()
            $('.annual21').hide()
            $('.annual20').hide()
        }
        else if(stored == 'annual21'){
            $('.annual24').hide()
            $('.annual23').hide()
            $('.annual22').hide()
            $('.annual21').show()
            $('.annual20').hide()
        } else {
            $('.annual24').hide()
            $('.annual23').hide()
            $('.annual22').hide()
            $('.annual21').hide()
            $('.annual20').show()
        }
    })
    $('.filter-item').click(function(){
        $(this).addClass('active-filter').siblings().removeClass('active-filter')
    })

})
