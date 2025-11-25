// aboutus


$(document).ready(function(){
    const default_mode = 'structure-filter';
    let storedMode = sessionStorage.getItem('item');
    if (!storedMode){
        sessionStorage.setItem('item', default_mode);
        // let_defValue = sessionStorage.getItem('item');
        $('.structure').show()
        $('.timeline-container').hide()
        $('.stru').addClass('active-filter')
    } else if (storedMode == 'structure-filter'){
        $('.structure').show()
        $('.timeline-container').hide()
        $('.stru').addClass('active-filter')
    } else {
        $('.structure').hide()
        $('.timeline-container').show()
        $('.time').addClass('active-filter')
    }
    
    $('.filter-item').click(function(){
        const value = $(this).attr('data-filter')
        sessionStorage.setItem('item', value);
        let stored = sessionStorage.getItem('item');
        if(stored == 'structure-filter'){
            $('.structure').show()
            $('.timeline-container').hide()
        }
        else{
            $('.structure').hide()
            $('.timeline-container').show()
        }
    })
    $('.filter-item').click(function(){
        $(this).addClass('active-filter').siblings().removeClass('active-filter')
    })

})