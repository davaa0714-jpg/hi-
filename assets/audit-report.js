// pos


$(document).ready(function(){
    const default_mode = 'audit23';
    let storedMode = sessionStorage.getItem('audit');
    // console.log(storedMode)
    if (!storedMode){
        sessionStorage.setItem('audit', default_mode);
        // let_defValue = sessionStorage.getItem('item');
        console.log("ddd")
        $('.audit23').show()
        $('.audit22').hide()
        $('.audit21').hide()
        $('.audit20').hide()
        $('.audit19').hide()
        $('.2023').addClass('active-filter')
    } else if (storedMode == 'audit22'){
        $('.audit23').hide()
        $('.audit22').show()
        $('.audit21').hide()
        $('.audit20').hide()
        $('.audit19').hide()
        $('.2022').addClass('active-filter')
    } else if (storedMode == 'audit21'){
        $('.audit23').hide()
        $('.audit22').hide()
        $('.audit21').show()
        $('.audit20').hide()
        $('.audit19').hide()
        $('.2021').addClass('active-filter')
    } else if (storedMode == 'audit20'){
        $('.audit23').hide()
        $('.audit22').hide()
        $('.audit21').hide()
        $('.audit20').show()
        $('.audit19').hide()
        $('.2020').addClass('active-filter')
    } else {
        $('.audit23').hide()
        $('.audit22').hide()
        $('.audit21').hide()
        $('.audit20').hide()
        $('.audit19').show()
        $('.2019').addClass('active-filter')
    }
    
    $('.filter-item').click(function(){
        const value = $(this).attr('data-filter')
        sessionStorage.setItem('audit', value);
        let stored = sessionStorage.getItem('audit');
        if(stored == 'audit23'){
            $('.audit23').show() 
            $('.audit22').hide() 
            $('.audit21').hide() 
            $('.audit20').hide() 
            $('.audit19').hide() 
        }
        else if(stored == 'audit22'){ 
            $('.audit23').hide()
            $('.audit22').show()
            $('.audit21').hide()
            $('.audit20').hide()
            $('.audit19').hide()
        } 
        else if(stored == 'audit21'){
            $('.audit23').hide()
            $('.audit22').hide()
            $('.audit21').show()
            $('.audit20').hide()
            $('.audit19').hide()
        } 
        else if(stored == 'audit20'){
            $('.audit23').hide()
            $('.audit22').hide()
            $('.audit21').hide()
            $('.audit20').show()
            $('.audit19').hide()
        } else {
            $('.audit23').hide()
            $('.audit22').hide()
            $('.audit21').hide()
            $('.audit20').hide()
            $('.audit19').show()
        }
    })
    $('.filter-item').click(function(){
        $(this).addClass('active-filter').siblings().removeClass('active-filter')
    })

})
