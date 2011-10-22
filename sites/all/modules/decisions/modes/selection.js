$(document).ready(function(){  
  $("a.decisions_selection_vote").click(function() {
    var link = this;
    var path = $(this).attr('href');
    var votingDiv = $(link).parents("div.decisions_selection_voting");
    var resultsDiv =  $(link).parents(".decisions_selection_voting").siblings(".decisions_selection_results");
    $.ajax({
      type: "GET",
      global: false,
      data: 'ajax=true',
      dataType: 'string',
      url: path,
      beforeSend:function() {
        $(votingDiv).queue(function() {
          $(votingDiv).fadeOut('slow').dequeue();
        });
      },
      success: function(response) {
        $(resultsDiv).html(response);
        //If the page is a WSOD with an HTTP 200 response, that's not successful. This check could be expanded if necessary.
        if (response == '') {
          decisionsErrorText(votingDiv);
        }
        else {
          $(votingDiv).queue(function(){
            resultsDiv.fadeIn('slow');
            $(votingDiv).dequeue();
          });
        }
      },
      error: function() {
        decisionsErrorText(votingDiv);
      }
    });
    return false;
  });
  function decisionsErrorText(votingDiv) {
    $(votingDiv).queue(function(){
      $(votingDiv).children(".decisions_selection_error").html('<span class="error">' + Drupal.t('An error occured. Please try voting again.') + '</span>');
      votingDiv.fadeIn('slow');
      $(votingDiv).dequeue();
    });
  }
});