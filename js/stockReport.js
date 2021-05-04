/*
 * Author: Abdullah A Almsaeed
 * Date: 4 Jan 2014
 * Description:
 *      This is a demo file used only for the main dashboard (index.html)
 **/

$(document).ready(function() {
  // $(".ibox").accordion({ header: "h5", collapsible: true, active: false });
var oTable;
var stockTable;
var purchaseTable;
var sellTable;
var returnTable;

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

  $('input[name="date"]').on('change',function(){
    getStock();
  })

  $('select[name="Product_ID"]').on('change',function(){
    getStock();
  })

  callfunction();

});
                  
function callfunction()
{
  stockTable = $('#exampleStock').DataTable({
    data:'',
    columns: [
        { title: "Date" },
        { title: "Product" },
        { title: "Source" },
        { title: "Volume" }
    ],
    dom: 'Bfrtip',
    buttons: [
          'excel',{
                extend: 'print',
                text: 'Print',
                title:'Stock Report',
                footer:true,
                message:'Date : '+$('input[name="date"]').val()+' \n\t Product : '+$('select[name="Product_ID"] option:selected').text()+''
              },{
                extend: 'pdfHtml5',
                text: 'PDF',
                footer:true,
                title:'Stock Report',
                message:'Date : '+$('input[name="date"]').val()+'\nProduct : '+$('select[name="Product_ID"] option:selected').text()+''
              }
    ],
    drawCallback: function() {
       var api = this.api();
       var total = api.column(3).data().sum();
       //var pageTotal = api.column(3, {page:'current'}).data().sum();
       $('#total').html("<h4>&nbsp;&nbsp;"+total+" ml</h4>");
    },
    responsive: {
      details: {
        display: $.fn.dataTable.Responsive.display.modal( {
          header: function ( row ) {
              var data = row.data();
              return 'Details for '+data[0]+' '+data[1];
          }
        }),
        renderer: function ( api, rowIdx, columns ) {
          var data = $.map( columns, function ( col, i ) {
              return '<tr>'+
                      '<td>'+col.title+':'+'</td> '+
                      '<td>'+col.data+'</td>'+
                  '</tr>';
          }).join('');
          return $('<table class="table"/>').append( data );
        }
      }
    }
  });
}


function getStock()
{
  if($('#stockData').valid() == true)
  {
  //$("#morris-line-chart").html("<div class='text-center text-danger'><h2>Loading........<h2><div>");
    var formdata = $("#stockData").serialize();
    $.ajax({
      data:formdata,
      type:'POST',
      datatype:JSON,
      url:base_url+"report/getStock",
      success:function(response)
      {
          //response = JSON.parse(response);
          stockTable.destroy();
          callfunction();
          stockTable.clear().draw();
          stockTable.rows.add(response['dataset']).draw();
      }
    });
  }
}

