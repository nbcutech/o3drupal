/* add a status bar div to the preview window, override imce setPreview to set status bar value and then call previous handler */
imce.hooks.load.push(function() {
  $('#preview-wrapper').prepend('<div id="imce-file-path"><span></span></div>');
  var prevHandler = imce.setPreview;
  imce.setPreview = function(fid) {
    if (fid) {
      $("#imce-file-path span").html(Drupal.t('File URL path: ') + imce.getURL(fid));
    }
    else {
      $("#imce-file-path span").html('');
    }
    prevHandler(fid);
  };
});

imce.hooks.navigate.push(function() {
  $("#imce-file-path span").html('');
});
