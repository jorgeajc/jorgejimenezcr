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
  console.log('gtag_page_view')
  principal_gtag( 'Portfolio', 'Page View', '')
  return true
}

/*
  download CV
*/
function gtag_download_cv_principal_page( ) {
  console.log('gtag_download_cv')
  principal_gtag( 'Portfolio', 'Download CV principal page', '')
  return true
}
function gtag_download_cv_about_me( ) {
  console.log('gtag_download_cv')
  principal_gtag( 'Portfolio', 'Download CV about me', '')
  return true
}

/*
  Whatsapp
*/
function gtag_whatsapp_principal_page( ) {
  console.log('gtag_whatsapp_principal_page')
  principal_gtag( 'Portfolio', 'Whatsapp principal page', '')
  return true
}
function gtag_whatsapp_about_me( ) {
  console.log('gtag_whatsapp_about_me')
  principal_gtag( 'Portfolio', 'Whatsapp about me', '')
  return true
}
function gtag_whatsapp_summary( ) {
  console.log('gtag_whatsapp_summary')
  principal_gtag( 'Portfolio', 'Whatsapp summary', '')
  return true
}
function gtag_whatsapp_contact_me( ) {
  console.log('gtag_whatsapp_contact_me')
  principal_gtag( 'Portfolio', 'Whatsapp contact me', '')
  return true
}


