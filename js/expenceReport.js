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

  /* Morris.js Charts */
  // Sales chart
$.ajax({
        // data:formdata,
        type:'POST',
        datatype:JSON,
        url:base_url+"report/getExpCat",
        success:function(response)
        {
          $("#line-chart1").html("");
          console.log(response);
           var area = new Morris.Area({
            element: 'line-chart1',
            // resize: true,
            data: response['map'],
            xkey: 'y',
            ykeys: ['item1'],
            labels: ['Transactions'],
            lineColors: ['#a0d0e0', '#3c8dbc'],
            hideHover: 'auto'
          });

           // datatable
          oTable = $('#example').DataTable({
              "data":response['dataset'],
              columns: [
                  { title: "Transaction Type" },
                  { title: "Date" },
                  { title: "Total Amount" },
                  { title: "Payment Mode" },
                  { title: "Account No." },
                  { title: "Detail" }
              ],
               dom: 'Bfrtip',
               buttons: [
                    'print'
                ],
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
      });


  //Fix for charts under tabs
  $('.box ul.nav a').on('shown.bs.tab', function () {
    area.redraw();
    donut.redraw();
    line.redraw();
  });

   $("#getExpCat").on("click",function (){
      $("#line-chart1").html("<div class='text-center text-danger'><h2>Loading........<h2><div>");
      var formdata=$("#expsCatData").serialize();
      $.ajax({
        data:formdata,
        type:'POST',
        datatype:JSON,
        url:base_url+"report/getExpCat",
        success:function(response)
        {
          $("#tabl").html("");
          $("#line-chart1").html("");
          console.log(response);
            var area = new Morris.Area({
            element: 'line-chart1',
            // resize: true,
            data: response['map'],
            xkey: 'y',
            ykeys: ['item1'],
            labels: ['Transactions'],
            lineColors: ['#a0d0e0', '#3c8dbc'],
            hideHover: 'auto'
          });
          oTable.clear().draw();
          oTable.rows.add(response['dataset']).draw(); // Add new data
          // oTable.columns.adjust().draw();
        // oTable.clear();
        // oTable.row.add(response['dataset']);
         // oTable.ajax.reload();
        }
      });
    });
});

