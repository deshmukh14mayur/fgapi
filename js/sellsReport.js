/*
 * Author: Abdullah A Almsaeed
 * Date: 4 Jan 2014
 * Description:
 *      This is a demo file used only for the main dashboard (index.html)
 **/
$(document).ready(function() {
  // $(".ibox").accordion({ header: "h5", collapsible: true, active: false });
  $.validator.setDefaults({ ignore: ":hidden:not(select)" });
  $('#sellData').validate({});
  "use strict";

  $('.daterange').daterangepicker({
    ranges: {
      'Today': [moment(), moment()],
      'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Last 7 Days': [moment().subtract(6, 'days'), moment()],
      'Last 30 Days': [moment().subtract(29, 'days'), moment()],
      'This Month': [moment().startOf('month'), moment().endOf('month')],
      'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment().subtract(29, 'days'),
    endDate: moment()
  }, function (start, end) {
    // window.alert("You chose: " + start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
  });

  callfunction();
});

function callfunction()
{
  sellTable = $('#exampleSell').DataTable({
                "data":'',
                columns: [
                    { title: "Date" },
                    { title: "Reference" },
                    { title: "Pegs" },
                    { title: "Total Amount" },
                    { title: "Actions" }
                ],
                 dom: 'Bfrtip',
                 buttons: [
                      'excel',{
                  extend: 'print',
                  text: 'Print',
                  title:'Sales Report',
                  footer:true,
                  message:'Date : '+$('input[name="date"]').val()+'\n\t Member : '+$('select[name="Customer_ID"] option:selected').text()+''
                },{
                  extend: 'pdfHtml5',
                  text: 'PDF',
                  footer:true,
                  title:'Sales Report',
                  message:'Date : '+$('input[name="date"]').val()+'\nMember : '+$('select[name="Customer_ID"] option:selected').text()+''
                }
                  ],
                drawCallback: function() {
                    var api = this.api();
                    var total = api.column(3).data().sum();
                    var totalpeg = api.column(2).data().sum();
                    $('#Amt').html("<h4>Rs.&nbsp;&nbsp;<b>"+total +"</b></h4>");
                    $('#Peg').html("<h4><b>"+totalpeg +"</b></h4>");
                },
                responsive: {
                  details: {
                      display: $.fn.dataTable.Responsive.display.modal( {
                          header: function ( row ) {
                              var data = row.data();
                              return 'Details for '+data[0]+' '+data[1];
                          }
                      } ),
                      renderer: function ( api, rowIdx, columns ) {
                          var data = $.map( columns, function ( col, i ) {
                              return '<tr>'+
                                      '<td>'+col.title+':'+'</td> '+
                                      '<td>'+col.data+'</td>'+
                                  '</tr>';
                          } ).join('');
       
                          return $('<table class="table"/>').append( data );
                      }
                  }
              }
            });
}

  function getSale() {
    if($('#sellData').valid() == true)
    {
      $("#revenue-chart").html("<div class='text-center text-danger'><h2>Loading........<h2><div>");
        var formdata=$("#sellData").serialize();
        $.ajax({
          data:formdata,
          type:'POST',
          datatype:JSON,
          url:base_url+"report/getSell",
          success:function(response)
          {
            //response = JSON.parse(response);
            sellTable.destroy();
            callfunction();
            sellTable.clear().draw();
            sellTable.rows.add(response['dataset']).draw();
              
          }
        });
      }
  }



function deletef(id,href)
{
  bootbox.confirm('Are you sure you want to delete?', function(result) {
    if(result == true)
    {
      $('body').prepend('<div id="Login_screen"><img src="'+base_url+'img/loader.gif"></div>');
      $("#Login_screen").fadeIn('fast');
      console.log(id);
      $.ajax({
        url:href,
        method:'POST',
        datatype:'JSON',
        error: function(jqXHR, exception) {
                $("#Login_screen").fadeOut(2000);
                //Remove Loader
                if (jqXHR.status === 0) {
                    alert('Not connect.\n Verify Network.');
                } else if (jqXHR.status == 404) {
                    alert('Requested page not found. [404]');
                } else if (jqXHR.status == 500) {
                    alert('Internal Server Error [500].');
                } else if (exception === 'parsererror') {
                    alert('Requested JSON parse failed.');
                } else if (exception === 'timeout') {
                    alert('Time out error.');
                } else if (exception === 'abort') {
                    alert('Ajax request aborted.');
                } else {
                    alert('Uncaught Error.\n' + jqXHR.responseText);
                }
            },
        success:function(response){
          $("#Login_screen").fadeOut(2000);
          console.log(response);
          response = JSON.parse(response);
          console.log(response);
          if(response === true)
          {
            swal({
              title: 'Done',
              text: 'Successfully Deleted.',
              type: "success"               
              },
              function(){
                getSale();
              }
            );
          }
          else
          {
            swal("Oops...", "Something went wrong!", "error");
          }
        }
      });
    }
  });
}