imce.hooks.load.push(function() {
  imce.opAdd({
    name : 'search',
    title : 'Search',
    content : $('#imce-search-form')
  });
  $('#imce-search-form').submit(function() {
    $('#imce-search-results div').html('Searching ' + ((imce.conf.dir == '.') ? 'all ' : imce.conf.dir + ' and sub') +'directories for ' + $('#edit-imce-search-term').val());
    $('#imce-search-results div').addClass('loading');
    var case_insensitive = 0;
    $('#edit-imce-search-case:checked').each(function() { case_insensitive = 1; });
    $.ajax({
      url: '/imce_search_callback/' + case_insensitive + '/' + encodeURI(imce.conf.dir + '/' + $('#edit-imce-search-term').val()),
      type: 'text',
      success: function(serverdata, status, xmlhttp) {
        data = eval('(' + serverdata + ')');
        var filelist = $.map(data.files, function(fullpath, index) {
          var li = document.createElement('li');
          /*$(li).click(function () { 
            file = fullpath.substr(fullpath.lastIndexOf('/') + 1);
            dir = fullpath.substr(0, fullpath.lastIndexOf('/'));
            imce.dirActivate(dir);
            imce.highlight(file);
          });*/
          if (index > 10) {
            $(li).addClass('toggle');
          }
          $(li).html(fullpath);
          return li;
        });
        $('#imce-search-results ul').hide();
        $('#imce-search-results ul').empty().append(filelist);
        $('#imce-search-results ul li[class="toggle"]').hide();
        $('#imce-search-results ul').show();
        $('#imce-search-results div').html(data.search + '. ' + data.files.length + ' results found. ');
        if (data.files.length > 10) {
          var toggle =  document.createElement('a');
          $(toggle).append('Show all');
          $(toggle).toggle(function () {
              $(this).html('Short list');
              $('#imce-search-results ul li[class*="toggle"]').show();
            },
            function () {
              $(this).html('Show all');
              $('#imce-search-results ul li[class*="toggle"]').hide();
            }
          );
          $('#imce-search-results div').append(toggle);
        }
        $('#imce-search-results div').removeClass('loading');
      }
    });
    return false;
  });
});
