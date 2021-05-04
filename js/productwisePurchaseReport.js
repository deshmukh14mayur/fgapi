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
    getproductWisePurchase();
  })

  $('select[name="Product_ID"]').on('change',function(){
    getproductWisePurchase();
  })
  
  callfunction();
});

function callfunction()
{
  stockTable = $('#exampleStock').DataTable({
              "data":'',
              columns: [
                  { title: "Date" },
                  { title: "Vendor" },
                  { title: "Quantity" },
                  { title: "Volume" },
                  { title: "Price" }
                  // { title: "Actions" }
              ],
               dom: 'Bfrtip',
               buttons: [
                    'excel',{
                extend: 'print',
                text: 'Print',
                title:'Product Wise Purchase Report',
                footer:true,
                message:'Date : '+$('input[name="date"]').val()+'\n Product : '+$('select[name="Product_ID"] option:selected').text()+''
              },{
                extend: 'pdfHtml5',
                text: 'PDF',
                footer:true,
                title:'Product Wise Purchase Report',
                message:'Date : '+$('input[name="date"]').val()+'\n Product : '+$('select[name="Product_ID"] option:selected').text()+''
              }
                ],
                drawCallback: function() {
             var api = this.api();
             var total = api.column(3).data().sum();
             var totalpeg = api.column(2).data().sum();
             var totalPrice = api.column(4).data().sum();
             $('#Amt').html("<h4><b>"+total +"&nbsp;&nbsp;ml</b></h4>");
             $('#Peg').html("<h4><b>"+totalpeg +"</b></h4>");
             $('#Price').html("<h4>Rs.&nbsp;&nbsp;<b>"+totalPrice +"</b></h4>");
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

function getproductWisePurchase()
{
  // $("#morris-line-chart").html("<div class='text-center text-danger'><h2>Loading........<h2><div>");
  if($('#stockData').valid() == true)
  {
    var formdata=$("#stockData").serialize();
    $.ajax({
      data:formdata,
      type:'POST',
      datatype:JSON,
      url:base_url+"report/getproductWisePurchase",
      success:function(response)
      {
        // console.log(JSON.parse(response));
        //response = JSON.parse(response);
        stockTable.destroy();
        callfunction();
        stockTable.clear().draw();
        stockTable.rows.add(response['dataset']).draw(); // Add new data
      }
    });
  }  
}