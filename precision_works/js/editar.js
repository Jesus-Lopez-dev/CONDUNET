$("#login").modal({
  modal: true,
  buttons: {
    Ok: function() {
      $( this ).modal( "close" );
    }
  }
});