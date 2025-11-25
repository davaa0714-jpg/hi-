// pos


$(document).ready(function(){
    const default_mode = 'hrreport24';
    let storedMode = sessionStorage.getItem('hr');
    if (!storedMode){
        sessionStorage.setItem('hr', default_mode);
        // let_defValue = sessionStorage.getItem('item');
        $('.hrreport24').show()
        $('.hrreport23').hide()
        $('.hrreport22').hide()
        $('.hrreport21').hide()
        $('.hrreport20').hide()
        $('.2024').addClass('active-filter')
    } else if (storedMode == 'hrreport23'){
        $('.hrreport24').hide()
        $('.hrreport23').show()
        $('.hrreport22').hide()
        $('.hrreport21').hide()
        $('.hrreport20').hide()
        $('.2023').addClass('active-filter')
    } else if (storedMode == 'hrreport22'){
        $('.hrreport24').hide()
        $('.hrreport23').hide()
        $('.hrreport22').show()
        $('.hrreport21').hide()
        $('.hrreport20').hide()
        $('.2022').addClass('active-filter')
    } else if (storedMode == 'hrreport21'){
        $('.hrreport24').hide()
        $('.hrreport23').hide()
        $('.hrreport22').hide()
        $('.hrreport21').show()
        $('.hrreport20').hide()
        $('.2021').addClass('active-filter')
    } 
    else {
        $('.hrreport24').hide()
        $('.hrreport23').hide()
        $('.hrreport22').hide()
        $('.hrreport21').hide()
        $('.hrreport20').show()
        $('.2020').addClass('active-filter')
    }
    
    $('.filter-item').click(function(){
        const value = $(this).attr('data-filter')
        sessionStorage.setItem('hr', value);
        let stored = sessionStorage.getItem('hr');
        if(stored == 'hrreport24'){
            $('.hrreport24').show()
            $('.hrreport23').hide()
            $('.hrreport22').hide()
            $('.hrreport21').hide()
            $('.hrreport20').hide()
        }
        else if(stored == 'hrreport23'){
            $('.hrreport24').hide()
            $('.hrreport23').show()
            $('.hrreport22').hide()
            $('.hrreport21').hide()
            $('.hrreport20').hide()
        }
        else if(stored == 'hrreport22'){
            $('.hrreport24').hide()
            $('.hrreport23').hide()
            $('.hrreport22').show()
            $('.hrreport21').hide()
            $('.hrreport20').hide()
        }
        else if(stored == 'hrreport21'){
            $('.hrreport24').hide()
            $('.hrreport23').hide()
            $('.hrreport22').hide()
            $('.hrreport21').show()
            $('.hrreport20').hide()
        } else {
            $('.hrreport24').hide()
            $('.hrreport23').hide()
            $('.hrreport22').hide()
            $('.hrreport21').hide()
            $('.hrreport20').show()
        }
    })
    $('.filter-item').click(function(){
        $(this).addClass('active-filter').siblings().removeClass('active-filter')
    })

})
