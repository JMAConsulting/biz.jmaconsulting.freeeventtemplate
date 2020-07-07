{literal}
<script type="text/javascript">
CRM.$( function($) {
  var eventType = '{/literal}{$eventTypeID}{literal}';
  var eventId = '{/literal}{$eventID}{literal}';
  if (eventId) {
    CRM.api3('Event', 'get', {
      "id": eventId,
      "return.custom_327": 1,
    }).done(function(result) {
      if (result.values[eventId]['custom_327'] != 1509 || result.values[eventId]['custom_327'] != 1510) {
        hidePriceSet(result.values[eventId]['custom_2']);
      }
    });
  }
   
  $('#event_id').change(function() {
    var eventid = $(this).val();
    if (eventid) {
      CRM.api3('Event', 'get', {
        "id": eventid,
        "return.custom_327": 1,
      }).then(function(result) {
        if (result.values[eventid]['custom_327'] != 1509 || result.values[eventid]['custom_327'] != 1510) {
            hidePriceSet(result.values[eventid]['custom_2']);
        }
      });
    }
  });

  function hidePriceSet(template) {
      CRM.api3('FreeEvent', 'get', {
          "sequential": 1,
          "event_id": template
      }).then(function(result) {
          console.log(result.values);
          if (result.values) {
              $( document ).ajaxComplete(function( event, xhr, settings ) {
                  $('.price-field-amount').html('$ 0.00');
              });
          }
      });
  }
});
</script>
{/literal}
