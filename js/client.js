$(document).on('click','#manageapp',function(e){
    e.preventDefault();
    refreshTabs($('.list-group-item'));
    $(this).addClass('active');
    $.ajax({
        url: 'manageappointments.php', // path to your partial template
        method: 'GET',
        success: function(data) {
           // load the data into the div
          $('.content-window').html(data);
        },
        error: function(err) {
          // handle any errors here
          console.log(err);
        }
      });
});

$(document).on('click','#deletedapps',function(e){
    e.preventDefault();
    refreshTabs($('.list-group-item'));
    $(this).addClass('active');
    $.ajax({
        url: 'deletedappointments.php', // path to your partial template
        method: 'GET',
        success: function(data) {
           // load the data into the div
          $('.content-window').html(data);
        },
        error: function(err) {
          // handle any errors here
          console.log(err);
        }
      });
});

$(document).on('click','#grouping',function(e){
    e.preventDefault();
    refreshTabs($('.list-group-item'));
    $(this).addClass('active');
    $.ajax({
        url: 'patientsfromcities.php', // path to your partial template
        method: 'GET',
        success: function(data) {
           // load the data into the div
          $('.content-window').html(data);
        },
        error: function(err) {
          // handle any errors here
          console.log(err);
        }
      });
});

$(document).on('click','#editbutton',function(e){
    e.preventDefault();
    let id = $(this).closest('.app-row').find('.app-id').text();
    
    $.ajax({
        url: 'editappointments.php?id='+id, // path to your partial template
        method: 'GET',
        success: function(data) {
           // load the data into the div
          $('.content-window').html(data);
        },
        error: function(err) {
          // handle any errors here
          console.log(err);
        }
      });
});

function refreshTabs(tabs) {
    tabs.each(function() {
        $(this).removeClass('active');
    });
}
