jQuery( document ).ready(function( $ ) {
  
  
  $( '.tab-navigation .tabset' ).click( function() {
    
    if ( $( this ).not( '.current' ) ) {
    
      $( '.tab-panel .panel.current' ).removeClass( 'current ');
      $( '#' + $(this).data('tab-content') ).addClass( 'current' );
      
      $( '.tab-navigation .tabset.current' ).removeClass( 'current ');
      $( this ).addClass( 'current' );
      
      $.cookie( '404page_current_tab', $( '.tab-navigation .tabset.current' ).attr('id') );
    
    }
    
  });
  
  
  var current_tab = jQuery.cookie( '404page_current_tab' );
  if ( current_tab === undefined ) {
    current_tab = $( '.tab-navigation .tabset:first' ).attr('id');
    $.removeCookie( '404page_current_tab' );
  }
  $( '#' + current_tab ).trigger( 'click' );
  
  
});