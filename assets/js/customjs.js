$(document).ready(function(){


      $("#inputfilter").keyup(function(){

      filter = new RegExp($(this).val(),'i');

      $("#filterme tbody tr").filter(function(){

      $(this).each(function(){
      found = false;

      $(this).children().each(function(){
      content = $(this).html();

      if(content.match(filter)){
           found = true;
      }
      });
      if(!found){

        $(this).hide();

        var message = "No matching field found on this table";

        return message;

      }else {
        
        $(this).show();

      }

      });
    });
  });
});

//clock
  window.onload = setInterval(clock,1000);
      function clock(){
          var d = new Date();
                
          var date = d.getDate();
                
          var month = d.getMonth();
          var montharr =["Jan","Feb","Mar","April","May","June","July","Aug","Sep","Oct","Nov","Dec"];
          month=montharr[month];
                
          var year = d.getFullYear();
                
          var day = d.getDay();
          var dayarr =["Sun","Mon","Tues","Wed","Thurs","Fri","Sat"];
          day=dayarr[day];
                
          var hour =d.getHours();
          var min = d.getMinutes();
          var sec = d.getSeconds();
              
          document.getElementById("date").innerHTML=day+" "+date+" "+month+" "+year;
          document.getElementById("time").innerHTML=hour+":"+min+":"+sec;
      }

$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})

// class toggle combox or selection box
$(function(){
     $('#cycle').on('change', function(){
       var val = $(this).val();
       var sub = $('#class');
       $('option', sub).filter(function(){
       
       if ($(this).attr('data-group') === val || $(this).attr('data-group') === 'SHOW' ) {
            $(this).show();
       } else {
         $(this).hide();
       }
      });
      });
      $('#cycle').trigger('change');
});