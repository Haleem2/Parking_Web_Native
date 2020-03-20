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
       var x = document.getElementById("slotId")
     x.value='';
});

function remove(array, element) {
    const index = array.indexOf(element);
    array.splice(index, 1);
}
    
$('.submit-service-type').click(function() {
  var serviceType = $('#servie-type-field').val();

  if (serviceType === 'parking') {
    $('.service-type-contents').show();
  }

  return false;
})

$('.service-type-parking-time-form').submit(function(){
  if(this.checkValidity()) {
    $('.service-type-parking-contents').show();
  }

  return false;
});