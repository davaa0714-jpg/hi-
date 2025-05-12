$(document).ready(function(){
    const default_mode = 'barilga';
    let storedMode = sessionStorage.getItem('commission');
    if (!storedMode){
        sessionStorage.setItem('commission', default_mode);
        // let_defValue = sessionStorage.getItem('item');
        $('.bb').show()
        $('.zsh').hide()
        $('.barilga').addClass('active-filter')
    } else if (storedMode == 'barilga'){
        $('.bb').show()
        $('.zsh').hide()
        $('.barilga').addClass('active-filter')
    } else {
        $('.bb').hide()
        $('.zsh').show()
        $('.zasvar').addClass('active-filter')
    }
    
    $('.filter-item').click(function(){
        const value = $(this).attr('data-filter')
        sessionStorage.setItem('commission', value);
        let stored = sessionStorage.getItem('commission');
        if(stored == 'barilga'){
            $('.bb').show()
            $('.zsh').hide()
        }
        else{
            $('.bb').hide()
            $('.zsh').show()
        }
    })
    $('.filter-item').click(function(){
        $(this).addClass('active-filter').siblings().removeClass('active-filter')
    })

})