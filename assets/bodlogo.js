// pos


$(document).ready(function(){
    const default_mode = 'bodlogo22';
    let storedMode = sessionStorage.getItem('bodlogo');
    if (!storedMode){
        sessionStorage.setItem('bodlogo', default_mode);
        // let_defValue = sessionStorage.getItem('item');
        $('.bodlogo22').show()
        $('.bodlogo21').hide()
        $('.bodlogo20').hide()
        $('.2022').addClass('active-filter')
    } else if (storedMode == 'bodlogo22'){
        $('.bodlogo22').show()
        $('.bodlogo21').hide()
        $('.bodlogo20').hide()
        $('.2022').addClass('active-filter')
    } else if (storedMode == 'bodlogo21'){
        $('.bodlogo22').hide()
        $('.bodlogo21').show()
        $('.bodlogo20').hide()
        $('.2021').addClass('active-filter')
    } else {
        $('.bodlogo22').hide()
        $('.bodlogo21').hide()
        $('.bodlogo20').show()
        $('.2020').addClass('active-filter')
    }
    
    $('.filter-item').click(function(){
        const value = $(this).attr('data-filter')
        sessionStorage.setItem('bodlogo', value);
        let stored = sessionStorage.getItem('bodlogo');
        if(stored == 'bodlogo22'){
            $('.bodlogo22').show()
            $('.bodlogo21').hide()
            $('.bodlogo20').hide()
        }
        else if(stored == 'bodlogo21'){
            $('.bodlogo22').hide()
            $('.bodlogo21').show()
            $('.bodlogo20').hide()
        } else {
            $('.bodlogo22').hide()
            $('.bodlogo21').hide()
            $('.bodlogo20').show()
        }
    })
    $('.filter-item').click(function(){
        $(this).addClass('active-filter').siblings().removeClass('active-filter')
    })

})
