const currency = 'USD'
function principal_gtag( category, action, label = '') {
    try {
        gtag(
            /* t  */'event',
            /* ea */action,  // event: donate, page view, Select Plan, etc
            {
            /* ec */event_category : category,// naturaly Donation
            /* el */event_label : label, // examples of analytics legacy: other ways, custom, simple donation, $10, $36, monthly donation, $72, monthly, accept, simple donation - christmas campaign
            // /* ev */value : amount, // amount to process
            }
        )
    } catch(e) {
        console.error('gtag_' + action , e)
        return false
    }
    return true
}
gtag_page_view( )
function gtag_page_view( ) {
    console.log('asd')
    principal_gtag( 'Portfolio', 'Page View', '')
    return true
}

/**
 * @param {*} donation json
 * @returns
 */
function gtag_process_donate( donation = null ) {
    if( !donation ) return
    /* if( donation.campaign_id ){
        gtag_with_custom_amount( amount, 'With-Custom-Amount' )
        return true
    } */
    var label = donation.plan_id ? 'Monthly Donation' : 'Simple Donation'
    let amount = donation.amount
    gtag_donate( amount, label )
    return true
}

function gtag_donate( amount = 0, label = '' ) {
    if(amount == 0) return false
    principal_gtag( 'Donation', 'Donate', label, amount )
    return true
}


function gtag_with_custom_amount( amount = 0, label = '' ) {
    if(amount == 0) return false
    principal_gtag( 'Donation', 'Next Step', label, amount )
    return true
}

function gtag_select_plan( amount = 0, label = '' ) {
    if(amount == 0) return false
    principal_gtag( 'Donation', 'Select Plan', label, amount )
    return true
}

function gtag_other_ways( amount = 0 ) {
    if(amount == 0) return false
    principal_gtag( 'Donation', 'Other Ways', '', amount )
    return true
}

function gtag_type_donation( amount = 0 ) {
    if(amount == 0) return false
    principal_gtag( 'Donation', 'Type of Donation', '', amount )
    return true
}

function gtag_terms_conditions( amount = 0 ) {
    if(amount == 0) return false
    principal_gtag( 'Donation', 'Terms Conditions', '', amount )
    return true
}
