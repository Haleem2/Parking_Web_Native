$(document).ready(function(){
    console.log('ready');
    
    $('.toggle-tickets').click(function() {
  $tickets = $(this).parent().siblings('.collapse');
 
  if ($tickets.hasClass('in')) {
    $tickets.collapse('hide');
    $(this).html('Show Tickets');
    $(this).closest('.ticket-card').removeClass('active');
    $tickets.removeClass('in');
  } else {
    $tickets.collapse('show');
    $(this).html('Hide Tickets');
    $(this).closest('.ticket-card').addClass('active');
    $tickets.addClass('in');
  }
});
});

  var numArray = [];
  
  $(document).on('click', '.vacant', function() {
var x = document.getElementById("slotId");
     if(!x.value){ if ($(this).hasClass("vacant")) {
        idValue = $(this).attr('id');
        $(this).removeClass("vacant");
        $(this).addClass("selected");
        numArray.push(idValue);
     
     x.value=idValue;}


      }
  });
  
//  $(document).on('click', '.vacant', function() {
   // if ($(this).hasClass("vacant")) {
     // idValue = $(this).attr('id');
      //$(this).removeClass("vacant");
     // $(this).addClass("selected");
      // numArray.push(idValue);

//    }
//});

$(document).on('click', '.selected', function() {
       idValue = $(this).attr('id');
       remove(numArray,idValue);
       $(this).removeClass("selected");
       $(this).addClass("vacant");
       var x = document.getElementById("slotId");
     x.value='';
});

function remove(array, element) {
    const index = array.indexOf(element);
    array.splice(index, 1);
}
    
$('.submit-service-type').click(function(e) {
  var serviceType = $('#servie-type-field').val();

  if (serviceType === 'parking') {
    $('.service-type-contents').show();
  }

  return false;
})


 $('.service-type-parking-time-form').submit(function(e){
  e.preventDefault()
  var x = document.getElementById("slotId");
  x.value='';
  const parking = e.target.dataset.parking;
   const elements = e.target.elements;

  document.getElementById('selected_date_from').value = `${ elements["date_from"].value }`;
   document.getElementById('selected_time_from').value = `${ elements["time_from"].value }`;
   document.getElementById('selected_date_to').value = `${ elements["date_to"].value }`;
   document.getElementById('selected_time_to').value = `${ elements["time_to"].value }`;

   const from = `${ elements["date_from"].value } ${ elements["time_from"].value }`;
   const to = `${ elements["date_to"].value } ${ elements["time_to"].value }`;
  if(this.checkValidity()) {
    if (from >= to) {
      alert('please enter valid date and time')
    } else {
    $('.service-type-parking-contents').show();
    // read product record based on given ID
    const url = "http://localhost:8888/Classified-Ads-Website-Template/Parking_Web_Native/Classified-Ads-Website-Template/rr.php";
    $.getJSON(`${url}?id=${parking}&from=${from}&to=${to}`, function(data){
      // read products button will be here
      $.each(data, function(key, val) { 
        document.getElementById(`S${val.Slot_Id}`).className =  val.Status ? 'selectedd': 'vacant';
       });
    
     });
    }
  }
  return false;
});

