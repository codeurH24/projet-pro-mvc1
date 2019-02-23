$(function(){
  $.notify.addStyle('happyblue', {
  html: "<div><p><i class=\"fas fa-2x fa-exclamation-triangle\"></i><br /><span data-notify-text/></p></div>",
  classes: {
    base: {
      "background-color": "#ff9a44",
      "font-family": '"Nunito Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"',
      "z-index": "500",
      "padding": "30px",
      'width': "300px",
      'box-shadow': "0 0 10px black",
      'color': "white",
      'font-weight': "bold",
      'text-align': "left",
      'font-size': '1.1rem'
    }
  }
});


  //notifyjs-bootstrap-warn
  $.notify('Attention:  '+window.notifier, {
    className: 'warn',
    style: 'happyblue',
    autoHideDelay: 8000

  });
});
