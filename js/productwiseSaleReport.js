
  stockTable ='';

$(document).ready(function() {

  $.validator.setDefaults({ ignore: ":hidden:not(select)" });
  $('#stockData').validate({});
  var oTable;
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
    getproductWiseSale();
  })

  $('select[name="Product_ID"]').on('change',function(){
    getproductWiseSale();
  })
  
  callfunction();
});

function callfunction()
{
  stockTable = $('#exampleStock').DataTable({
    data:'',
    columns: [
        { title: "Sales Type"},
        { title: "Date"},
        { title: "Reference"},
        { title: "Total Pegs"},
        { title: "Total Consumption (in ml)"},
        { title: "Per Peg Price"},
        { title: "Total Consumed Price"}
    ],
    dom: 'Bfrtip',
    buttons: [
          'excel',{
                extend: 'print',
                text: 'Print',
                title:'Product Wise Sales Report',
                footer:true,
                message:'Date : '+$('input[name="date"]').val()+' \n\t Product : '+$('select[name="Product_ID"] option:selected').text()+''
              },{
                extend: 'pdfHtml5',
                text: 'PDF',
                footer:true,
                title:'Product Wise Sales Report',
                message:'Date : '+$('input[name="date"]').val()+'\nProduct : '+$('select[name="Product_ID"] option:selected').text()+''
              }
    ],
    drawCallback: function() {
       var api = this.api();
       var total_peg = api.column(3).data().sum();
       var total_ml = api.column(4).data().sum();
       var total_price = api.column(6).data().sum();
       //var pageTotal = api.column(3, {page:'current'}).data().sum();
       $('#total_peg').html("<h4>&nbsp;&nbsp;"+total_peg+"</h4>");
       $('#total_ml').html("<h4>&nbsp;&nbsp;"+total_ml+" ml</h4>");
       $('#total_price').html("<h4>Rs.&nbsp;&nbsp;"+total_price+"</h4>");
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


function getproductWiseSale()
{
  // $("#morris-line-chart").html("<div class='text-center text-danger'><h2>Loading........<h2><div>");
  //alert($('#stockData').valid());
  if($('#stockData').valid() == true)
  {
    var formdata=$("#stockData").serialize();
    $.ajax({
      data:formdata,
      type:'POST',
      datatype:JSON,
      url:base_url+"report/getproductWiseSale",
      success:function(response)
      {
        console.log(JSON.parse(response));
        stockTable.destroy();
        callfunction();
        stockTable.clear().draw();
        stockTable.rows.add(JSON.parse(response)).draw();
      }
    });
  }
}