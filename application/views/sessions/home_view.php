<style type="text/css">
  .info-box {
    display: block;
    min-height: 90px;
    background: #fff;
    width: 100%;
    box-shadow: 1px 1px 1px rgb(0 0 0);
    border-radius: 2px;
    margin-bottom: 15px;
}

.bg-aqua, .callout.callout-info, .alert-info, .label-info, .modal-info .modal-body {
    background-color: #00c0ef !important;
}

.bg-yellow, .callout.callout-warning, .alert-warning, .label-warning, .modal-warning .modal-body {
    background-color: #f39c12 !important;
}

.bg-green, .callout.callout-success, .alert-success, .label-success, .modal-success .modal-body {
    background-color: #00a65a !important;
}

.bg-red, .callout.callout-danger, .alert-danger, .alert-error, .label-danger, .modal-danger .modal-body {
    background-color: #dd4b39 !important;
}

.info-box-content {
    padding: 5px 10px;
    margin-left: 90px;
}

.info-box-icon {
    border-top-left-radius: 2px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 2px;
    display: block;
    float: left;
    height: 90px;
    width: 90px;
    text-align: center;
    font-size: 45px;
    line-height: 90px;
    background: rgba(0,0,0,0.2);
}

.info-box-number {
    display: block;
    font-weight: bold;
    font-size: 18px;
}

.yellowbg {
   background: #ffff00a8 !important;
}
</style>

<div class="page-content">
  <div class="wrap">

    <div class="ibox">
      <div class="ibox-content">
        <div class="row">
          
        </div>
      </div>
    </div>

                

  </div>
</div>

<!-- <div class="row dashboard-bottom">
  <div class="col-sm-6">
    <div class="widget blue-bg no-padding">
          <div class="p-m">
              <h3 class="font-bold no-margins">
                  Get Stock <i class="fa fa-list-alt"></i>
              </h3>
              <small><br></small>
              <div class="row">
                <div class="col-sm-12">
                    <span class="col-sm-4 h5 font-bold text-right">Product : </span>
                    <div class="col-sm-8">
                    <div id="product1">
                      <span class="fa fa-spinner fa-spin"></span>
                    </div>  
                      <select data-placeholder="Select Product or model" id="product" class="form-control chosen-select hidden" name="product_model_ID[]" onChange = "get_product_details3()">    
                          <option value="">Please Select</option>
                          
                                   
                        </select>
                    </div>
                </div>
              </div>
              <div class="row">
                <div id="model3" class="col-sm-12"></div>
             </div>
             <div class="row">
                <div id="model3" class="col-sm-12"></div>
             </div>
          </div>
        </div>
      </div>

  
</div>
 -->


<!-- Data Tables -->
<script src="<?php echo base_url("js/plugins/dataTables/jquery.dataTables.js"); ?>"></script>
<script src="<?php echo base_url("js/plugins/dataTables/dataTables.bootstrap.js"); ?>"></script>
<script src="<?php //echo base_url("js/plugins/dataTables/dataTables.responsive.js"); ?>"></script>
<script src="<?php echo base_url("js/plugins/dataTables/dataTables.tableTools.min.js"); ?>"></script>
<script src="<?php echo base_url("js/plugins/datapicker/bootstrap-datepicker.js"); ?>"></script>
<script src="<?php echo base_url("js/plugins/fullcalendar/moment.min.js"); ?>"></script>
<script src="<?php echo base_url("js/plugins/daterangepicker/daterangepicker.js"); ?>"></script>
<!-- Datatable -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/buttons.dataTables.min.css'); ?>">
<script type="text/javascript" language="javascript" src="<?php echo base_url('js/dataTables.buttons.min.js'); ?>">
</script>
<script type="text/javascript" language="javascript" src="<?php echo base_url('js/buttons.flash.min.js'); ?>">
</script>
<script type="text/javascript" language="javascript" src="<?php echo base_url('js/jszip.min.js'); ?>">
</script>
<!-- <script type="text/javascript" language="javascript" src="<?php echo base_url('js/pdfmake.min.js'); ?>">
</script> -->
<script type="text/javascript" language="javascript" src="<?php echo base_url('js/vfs_fonts.js'); ?>">
</script>
<script type="text/javascript" language="javascript" src="<?php echo base_url('js/buttons.html5.min.js'); ?>">
</script>
<script type="text/javascript" language="javascript" src="<?php echo base_url('js/buttons.print.min.js'); ?>">
</script>
<script type="text/javascript" language="javascript" src="<?php echo base_url('js/dataTables.responsive.min.js'); ?>">
</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <!-- Chosen -->
<!-- <script src="<?php //echo base_url("js/plugins/chosen/chosen.jquery.js"); ?>"></script> -->
<!-- Sweet alert -->
<script src="<?php echo base_url('js/plugins/sweetalert/sweetalert.min.js'); ?>"></script>

<script type="text/javascript">

   var dumpdata = {};
   var option1 = {};
   var option2 = {};
   var option3 = {};
   var option4 = {};
   var opt1 = 0; 
   var opt2 = 0; 
   var opt3 = 0; 
   var opt4 = 0; 
   var totaldaysarr = {};

   var rolelist = [];
  var rolelist2 = [];
  var reportingtodata = [];

  var loginas = '<?php echo @$Login['Login_as']; ?>';
  var EmpCode = '<?php echo @$Login['Emp_Code']; ?>';

$('body').prepend('<div id="Login_screen"><img src="'+base_url+'img/loader.gif"></div>');
      $("#Login_screen").fadeIn('fast');

      var prevmonth = moment().subtract(1, 'months').format('MM-YYYY');
      var marr = prevmonth.split('-');
      var CRef_month = marr[0];
      var CRef_Year = marr[1];

      var obj = {};
      obj.op = 'list';
      obj.DSN = 100102;
      // if (loginas == 1000 || loginas == 1007) 
      // {
      //   obj.payload = JSON.stringify({"Reporting_User":"ALL","RoleID":loginas});
      // }
      // else
      // {
      //   obj.payload = JSON.stringify({"Reporting_User":EmpCode,"RoleID":loginas});
      // }
      if (loginas == 1000 || loginas == 1007) 
      {
        obj.payload = JSON.stringify({"Reporting_User":"ALL","Ref_month":CRef_month,"Ref_Year":CRef_Year,"RoleID":loginas});
      }
      else
      {
        obj.payload = JSON.stringify({"Reporting_User":EmpCode,"Ref_month":CRef_month,"Ref_Year":CRef_Year,"RoleID":loginas});
      }
      // $("#Login_screen").fadeOut(2000);
      $.ajax({
        type:'get',
        data: obj,
        datatype:'json',
        url: 'http://dtapi.wotr.org.in/dtapi/Dtoperations/wDT/',
        // url: 'http://localhost/dtapi/Dtoperations/wDT/'+estr,
         headers: {
                        'Access-Control-Allow-Origin': '*'
                            },
        success:function(response)
        {
          var ires = JSON.parse(response);
          importdata = JSON.parse(ires);
          console.log('importdata');
          console.log(importdata);
          if (importdata.statusCode == 200) 
          {
            if (importdata.payLoad.length > 0) 
            {
              dumpdata = importdata.payLoad;

              var yearmonth = dumpdata[0].Ref_Year+'-'+dumpdata[0].Ref_month;
              console.log('yearmonth');
              console.log(yearmonth);
              var nodays = moment(yearmonth, "YYYY-MM").daysInMonth();

              console.log('nodays');
              console.log(nodays);
              for (var i = 1; i <= nodays; i++) 
              {
                  totaldaysarr[i] = {};
                  totaldaysarr[i].vals = i;
              }
              console.log(importdata.payLoad.length);
              console.log('loginas');
              console.log(loginas);
              // console.log(loginas == 1006);
              var reportingtodata = [];
              for (var j = 0; j < importdata.payLoad.length; j++) 
              {
                
                if (loginas == 1000) 
                {
                  if (dumpdata[j].Admin_Remark == "Increase Days" || dumpdata[j].ED_Remark == "Increase Days" || dumpdata[j].Program_manager_Remark == "Increase Days" || dumpdata[j].RRC_Incharge_Remark == "Increase Days" || dumpdata[j].Project_manager_Remark == "Increase Days") 
                  {
                    option1[opt1] = {};
                    option1[opt1] = dumpdata[j];
                    opt1++;
                  }
                  if (dumpdata[j].Admin_Remark == "Decrease Days" || dumpdata[j].ED_Remark == "Decrease Days" || dumpdata[j].Program_manager_Remark == "Decrease Days" || dumpdata[j].RRC_Incharge_Remark == "Decrease Days" || dumpdata[j].Project_manager_Remark == "Decrease Days") 
                  {
                    option2[opt2] = {};
                    option2[opt2] = dumpdata[j];
                    opt2++;
                  }
                  if (dumpdata[j].Admin_Remark == "All Ok" || dumpdata[j].ED_Remark == "All Ok" || dumpdata[j].Program_manager_Remark == "All Ok" || dumpdata[j].RRC_Incharge_Remark == "All Ok" || dumpdata[j].Project_manager_Remark == "All Ok") 
                  {
                    option3[opt3] = {};
                    option3[opt3] = dumpdata[j];
                    opt3++;
                  }
                  if (dumpdata[j].Admin_Remark == "No Changes" || dumpdata[j].ED_Remark == "No Changes" || dumpdata[j].Program_manager_Remark == "No Changes" || dumpdata[j].RRC_Incharge_Remark == "No Changes" || dumpdata[j].Project_manager_Remark == "No Changes") 
                  {
                    option4[opt4] = {};
                    option4[opt4] = dumpdata[j];
                    opt4++;
                  }

                }
                else if (loginas == 1004) 
                {
                  if (dumpdata[j].Project_manager_Remark == "Increase Days") 
                  {
                    option1[opt1] = {};
                    option1[opt1] = dumpdata[j];
                    opt1++;
                  }
                  if (dumpdata[j].Project_manager_Remark == "Decrease Days") 
                  {
                    option2[opt2] = {};
                    option2[opt2] = dumpdata[j];
                    opt2++;
                  }
                  if (dumpdata[j].Project_manager_Remark == "All Ok") 
                  {
                    option3[opt3] = {};
                    option3[opt3] = dumpdata[j];
                    opt3++;
                  }
                  if (dumpdata[j].Project_manager_Remark == "No Changes") 
                  {
                    option4[opt4] = {};
                    option4[opt4] = dumpdata[j];
                    opt4++;
                  }

                }
                else if (loginas == 1005) 
                {
                  if (dumpdata[j].RRC_Incharge_Remark == "Increase Days" || dumpdata[j].Project_manager_Remark == "Increase Days") 
                  {
                    option1[opt1] = {};
                    option1[opt1] = dumpdata[j];
                    opt1++;
                  }
                  if (dumpdata[j].RRC_Incharge_Remark == "Decrease Days" || dumpdata[j].Project_manager_Remark == "Decrease Days") 
                  {
                    option2[opt2] = {};
                    option2[opt2] = dumpdata[j];
                    opt2++;
                  }
                  if (dumpdata[j].RRC_Incharge_Remark == "All Ok" || dumpdata[j].Project_manager_Remark == "All Ok") 
                  {
                    option3[opt3] = {};
                    option3[opt3] = dumpdata[j];
                    opt3++;
                  }
                  if (dumpdata[j].RRC_Incharge_Remark == "No Changes" || dumpdata[j].Project_manager_Remark == "No Changes") 
                  {
                    option4[opt4] = {};
                    option4[opt4] = dumpdata[j];
                    opt4++;
                  }

                }
                else if (loginas == 1006) 
                {
                  console.log('if');
                  if (dumpdata[j].Program_manager_Remark == "Increase Days" || dumpdata[j].RRC_Incharge_Remark == "Increase Days" || dumpdata[j].Project_manager_Remark == "Increase Days") 
                  {
                    option1[opt1] = {};
                    option1[opt1] = dumpdata[j];
                    opt1++;
                  }
                  if (dumpdata[j].Program_manager_Remark == "Decrease Days" || dumpdata[j].RRC_Incharge_Remark == "Decrease Days" || dumpdata[j].Project_manager_Remark == "Decrease Days") 
                  {
                    option2[opt2] = {};
                    option2[opt2] = dumpdata[j];
                    opt2++;
                  }
                  if (dumpdata[j].Program_manager_Remark == "All Ok" || dumpdata[j].RRC_Incharge_Remark == "All Ok" || dumpdata[j].Project_manager_Remark == "All Ok") 
                  {
                    option3[opt3] = {};
                    option3[opt3] = dumpdata[j];
                    opt3++;
                  }
                  if (dumpdata[j].Program_manager_Remark == "No Changes" || dumpdata[j].RRC_Incharge_Remark == "No Changes" || dumpdata[j].Project_manager_Remark == "No Changes") 
                  {
                    option4[opt4] = {};
                    option4[opt4] = dumpdata[j];
                    opt4++;
                  }

                }
                else if (loginas == 1007) 
                {
                  if (dumpdata[j].ED_Remark == "Increase Days" || dumpdata[j].Program_manager_Remark == "Increase Days" || dumpdata[j].RRC_Incharge_Remark == "Increase Days" || dumpdata[j].Project_manager_Remark == "Increase Days") 
                  {
                    option1[opt1] = {};
                    option1[opt1] = dumpdata[j];
                    opt1++;
                  }
                  if (dumpdata[j].ED_Remark == "Decrease Days" || dumpdata[j].Program_manager_Remark == "Decrease Days" || dumpdata[j].RRC_Incharge_Remark == "Decrease Days" || dumpdata[j].Project_manager_Remark == "Decrease Days") 
                  {
                    option2[opt2] = {};
                    option2[opt2] = dumpdata[j];
                    opt2++;
                  }
                  if (dumpdata[j].ED_Remark == "All Ok" || dumpdata[j].Program_manager_Remark == "All Ok" || dumpdata[j].RRC_Incharge_Remark == "All Ok" || dumpdata[j].Project_manager_Remark == "All Ok") 
                  {
                    option3[opt3] = {};
                    option3[opt3] = dumpdata[j];
                    opt3++;
                  }
                  if (dumpdata[j].ED_Remark == "No Changes" || dumpdata[j].Program_manager_Remark == "No Changes" || dumpdata[j].RRC_Incharge_Remark == "No Changes" || dumpdata[j].Project_manager_Remark == "No Changes") 
                  {
                    option4[opt4] = {};
                    option4[opt4] = dumpdata[j];
                    opt4++;
                  }

                }
              }
              $("#Login_screen").fadeOut(2000);
              // drawtabledata();
              // draworgchartdata();
            }
            $("#Login_screen").fadeOut(2000);
          }
        },
        error:function(err){

        }
      });
      
function draworgchartdata()
{
  var obju = {};
      obju.op = 'list';
      obju.DSN = 100101;
      obju.payload = JSON.stringify({});

      $.ajax({
        type:'get',
        data: obju,
        datatype:'json',
        url: 'http://dtapi.wotr.org.in/dtapi/Dtoperations/wDT/',
        // url: 'http://localhost/dtapi/Dtoperations/wDT/',
         headers: {
                        'Access-Control-Allow-Origin': '*'
                            },
        success:function(response)
        {
          var ujres = JSON.parse(response);
          var ufinalres = JSON.parse(ujres);
          if (ufinalres.statusCode == 200) 
          {
            console.log('ufinalres');
            console.log(ufinalres);
            var roledata = ufinalres.payLoad;

            
            for (var r = 0; r < roledata.length; r++) 
            {
              if (roledata[r].ReportingTo_EmployeeCode in reportingtodata) 
              {
                reportingtodata[roledata[r].ReportingTo_EmployeeCode].push(roledata[r]);
              }
              else
              {
                reportingtodata[roledata[r].ReportingTo_EmployeeCode] = [];
                reportingtodata[roledata[r].ReportingTo_EmployeeCode].push(roledata[r]);
              }
              var isarr = false;
              if (roledata[r].RoleName == 'Admin') 
              {
                var arrct = 0;
                isarr = true;
              }
              else if (roledata[r].RoleName == 'ED') 
              {
                var arrct = 1;
                isarr = true;
              }
              else if (roledata[r].RoleName == 'Program Manager') 
              {
                var arrct = 2;
                isarr = true;
              }
              else if (roledata[r].RoleName == 'RRC Incharge') 
              {
                var arrct = 3;
                isarr = true;
              }
              else if (roledata[r].RoleName == 'Project Manager') 
              {
                var arrct = 4;
                isarr = true;
              }

              if (isarr) 
              {
                if (arrct in rolelist2) 
                {
                  if (arrct != 0) 
                  {
                    rolelist2[arrct].push(roledata[r]);
                  }
                  
                }
                else
                {
                  rolelist2[arrct] = [];
                  rolelist2[arrct].push(roledata[r]);
                }
              }
                if (roledata[r].RoleName in rolelist) 
                {
                  rolelist[roledata[r].RoleName].push(roledata[r]);
                }
                else
                {
                  rolelist[roledata[r].RoleName] = [];
                  rolelist[roledata[r].RoleName].push(roledata[r]);
                }
            }

            setTimeout(function(){
              // console.log(rolelist2.length);
              for (var i = 0; i < rolelist2.length; i++) 
              {
                // console.log(rolelist2[i].length);
                for (var ij = 0; ij < rolelist2[i].length; ij++) 
                {
                  if (rolelist2[i][ij].Employee_Code in reportingtodata) 
                  {
                    rolelist2[i][ij].rolearr = reportingtodata[rolelist2[i][ij].Employee_Code];
                    
                  }
                }
              }
              console.log('rolelist');
              console.log(rolelist);
              console.log('rolelist2');
              console.log(rolelist2);
              console.log('reportingtodata');
              console.log(reportingtodata);

              var roleorgarr = [];
              // roleorgarr.push([{v:'Admin', f:'<div style="font-size:12px;"><b>Admin</b></div>'},'', '']);
              // roleorgarr.push([{v:''+rolelist['ED'][0].Employee_Code, f:'<div style="font-size:12px;"><b>ED</b></div>'},'Admin', '']);

              for (var r2 = 0; r2 < rolelist2.length; r2++) 
              {
                if (r2 == 0) 
                {
                  var edsht = rolelist2[r2][0].Employee_Name.split(' ');
                  var edsht2 = edsht[0];
                  roleorgarr.push([{v:''+rolelist2[r2][0].Employee_Code, f:''+edsht2+'<div style="color:red; font-style:italic">'+rolelist2[r2][0].RoleName+'</div>'},'', ''+rolelist2[r2][0].Employee_Name]);
                }
                else if (r2 == 1)
                {
                  var edsht = rolelist2[r2][0].Employee_Name.split(' ');
                  var edsht2 = edsht[0];
                  roleorgarr.push([{v:''+rolelist2[r2][0].Employee_Code, f:''+edsht2+'<div style="color:red; font-style:italic">'+rolelist2[r2][0].RoleName+'</div>'},''+rolelist2[0][0].Employee_Code, ''+rolelist2[r2][0].Employee_Name]);
                }
                else
                {
                  for (var r3 = 0; r3 < rolelist2[r2].length; r3++) 
                  {
                    var edsht = rolelist2[r2][r3].Employee_Name.split(' ');
                    var edsht2 = edsht[0];
                    roleorgarr.push([{v:''+rolelist2[r2][r3].Employee_Code, f:''+edsht2+'<div style="color:red; font-style:italic">'+rolelist2[r2][r3].RoleName+'</div>'},''+rolelist2[r2][r3].ReportingTo_EmployeeCode, ''+rolelist2[r2][r3].Employee_Name]);
                  }
                }
                    
              }
              console.log(rolelist['ED'][0].rolearr.length);
              // for (var ei = 0; ei < rolelist['ED'][0].rolearr.length; ei++) 
              // {
                
              //   var edsht = rolelist['ED'][0].rolearr[ei].Employee_Name.split(' ');
              //   var edsht2 = edsht[0];
              //   roleorgarr.push([{v:''+rolelist['ED'][0].rolearr[ei].Employee_Code, f:''+edsht2+'<div style="color:red; font-style:italic">'+rolelist['ED'][0].rolearr[ei].RoleName+'</div>'},''+rolelist['ED'][0].Employee_Code, ''+rolelist['ED'][0].rolearr[ei].Employee_Name]);
              //   console.log(rolelist['ED'][0].rolearr[ei].rolearr);
              //   if (rolelist['ED'][0].rolearr[ei].rolearr != undefined && rolelist['ED'][0].rolearr[ei].rolearr != null && rolelist['ED'][0].rolearr[ei].rolearr != '') 
              //   {
              //     for (var pi = 0; pi < rolelist['ED'][0].rolearr[ei].rolearr.length; pi++) 
              //     {
              //       var pmsht = rolelist['ED'][0].rolearr[ei].rolearr[pi].Employee_Name.split(' ');
              //       var pmsht2 = pmsht[0];
              //       roleorgarr.push([{v:''+rolelist['ED'][0].rolearr[ei].rolearr[pi].Employee_Code, f:''+pmsht2+'<div style="color:red; font-style:italic">'+rolelist['ED'][0].rolearr[ei].rolearr[pi].RoleName+'</div>'},''+rolelist['ED'][0].rolearr[ei].Employee_Code, ''+rolelist['ED'][0].rolearr[ei].rolearr[pi].Employee_Name]);

              //       if (rolelist['ED'][0].rolearr[ei].rolearr[pi].rolearr != undefined && rolelist['ED'][0].rolearr[ei].rolearr[pi].rolearr != null && rolelist['ED'][0].rolearr[ei].rolearr[pi].rolearr != '') 
              //       {
              //         for (var ri = 0; ri < rolelist['ED'][0].rolearr[ei].rolearr[pi].rolearr.length; ri++) 
              //         {
              //           var rcsht = rolelist['ED'][0].rolearr[ei].rolearr[pi].Employee_Name.split(' ');
              //           var rcsht2 = rcsht[0];
              //           roleorgarr.push([{v:''+rolelist['ED'][0].rolearr[ei].rolearr[pi].rolearr[ri].Employee_Code, f:''+rcsht2+'<div style="color:red; font-style:italic">'+rolelist['ED'][0].rolearr[ei].rolearr[pi].rolearr[ri].RoleName+'</div>'},''+rolelist['ED'][0].rolearr[ei].rolearr[pi].Employee_Code, ''+rolelist['ED'][0].rolearr[ei].rolearr[pi].rolearr[ri].Employee_Name]);
              //         }
              //       }

              //     }
              //   }
                  
              // }

              google.charts.load('current', {packages:["orgchart"]});
              google.charts.setOnLoadCallback(drawChart);

              function drawChart() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Name');
                data.addColumn('string', 'Manager');
                data.addColumn('string', 'ToolTip');

                // For each orgchart box, provide the name, manager, and tooltip to show.
                data.addRows(roleorgarr);

                // Create the chart.
                var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
                // Draw the chart, setting the allowHtml option to true for the tooltips.
                chart.draw(data, {'allowHtml':true});

                $('.google-visualization-orgchart-node').css('border','0px solid');
              }


              // $scope.visiblearr.push([{v:'Visible', f:'<div style="font-size:12px;"><b>Root</b></div>'},'', '']);

            },2000);

            
          }
          else
          {
            // $("#Login_screen").fadeOut(2000);
            // swal("Oops...", "Something went wrong!\n "+finalres.status, "error");
          }
        },
        error : function(err){
          // $("#Login_screen").fadeOut(2000);
          // swal("Oops...", "Something went wrong!\n ", "error");
        }
      });
}
      
function drawtabledata()
{

  // console.log('option1');
  // console.log(option1);
  // console.log('option2');
  // console.log(option2);
  // console.log('option3');
  // console.log(option3);


  Object.size = function(obj) {
                  var size = 0,
                    key;
                  for (key in obj) {
                    if (obj.hasOwnProperty(key)) size++;
                  }
                  return size;
                };
  var size = Object.size(dumpdata);
  var size11 = Object.size(option1);
  var size12 = Object.size(option2);
  var size13 = Object.size(option3);
  var size14 = Object.size(option4);
  var size2 = Object.size(totaldaysarr);

  $('#opt1cnt').html(size11);
  $('#opt2cnt').html(size12);
  $('#opt3cnt').html(size13);
  // $('#opt4cnt').html(size14);
  var tdata = '';
  var ifdata = '';
  var strdata = '<th>Employee Name</th><th>Employee No</th><th>Designation </th><th>Location</th>'
  $.each(totaldaysarr, function(trkey, trval){
      strdata += '<th>'+trval.vals+'</th>';
  });
  if (loginas == 1000)
  {
      strdata += '<th>Present</th><th>Leave</th><th>Holiday</th><th>Absent</th><th>Off Day</th><th>Rest Day</th><th>On duty</th><th>Error</th><th>Status unknown</th><th>Total</th><th>Project Manager</th><th>Project Manager Comment</th><th>Project Manager Remark</th><th>RRC Incharge</th><th>RRC Incharge Comment</th><th>RRC Incharge Remark</th><th>Program Manager</th><th>Program Manager Comment</th><th>Program Manager Remark</th><th>ED</th><th>ED Comment</th><th>ED Remark</th><th>Admin</th><th>Admin Comment</th><th>Admin Remark</th>';
  }
  else if (loginas == 1004)
  {
      strdata += '<th>Present</th><th>Leave</th><th>Holiday</th><th>Absent</th><th>Off Day</th><th>Rest Day</th><th>On duty</th><th>Error</th><th>Status unknown</th><th>Total</th><th>Project Manager</th><th>Project Manager Comment</th><th>Project Manager Remark</th>';
  }
  else if (loginas == 1005)
  {
      strdata += '<th>Present</th><th>Leave</th><th>Holiday</th><th>Absent</th><th>Off Day</th><th>Rest Day</th><th>On duty</th><th>Error</th><th>Status unknown</th><th>Total</th><th>Project Manager</th><th>Project Manager Comment</th><th>Project Manager Remark</th><th>RRC Incharge</th><th>RRC Incharge Comment</th><th>RRC Incharge Remark</th>';
  }
  else if (loginas == 1006)
  {
      strdata += '<th>Present</th><th>Leave</th><th>Holiday</th><th>Absent</th><th>Off Day</th><th>Rest Day</th><th>On duty</th><th>Error</th><th>Status unknown</th><th>Total</th><th>Project Manager</th><th>Project Manager Comment</th><th>Project Manager Remark</th><th>RRC Incharge</th><th>RRC Incharge Comment</th><th>RRC Incharge Remark</th><th>Program Manager</th><th>Program Manager Comment</th><th>Program Manager Remark</th>';
  }
  else if (loginas == 1007)
  {
      strdata += '<th>Present</th><th>Leave</th><th>Holiday</th><th>Absent</th><th>Off Day</th><th>Rest Day</th><th>On duty</th><th>Error</th><th>Status unknown</th><th>Total</th><th>Project Manager</th><th>Project Manager Comment</th><th>Project Manager Remark</th><th>RRC Incharge</th><th>RRC Incharge Comment</th><th>RRC Incharge Remark</th><th>Program Manager</th><th>Program Manager Comment</th><th>Program Manager Remark</th><th>ED</th><th>ED Comment</th><th>ED Remark</th>';
  }
  else
  {
      strdata += '<th>Present</th><th>Leave</th><th>Holiday</th><th>Absent</th><th>Off Day</th><th>Rest Day</th><th>On duty</th><th>Error</th><th>Status unknown</th><th>Total</th>';
  }
  
  for (var i = 0; i < size11; i++) 
  {
      if (option1[i].Present == option1[i].Admin_Count) 
      {
          var admin_bg_class = '';
      }
      else
      {
          var admin_bg_class = 'yellowbg';
      }
      if (option1[i].Present == option1[i].Project_Manager_Count) 
      {
          var proj_bg_class = '';
      }
      else
      {
          var proj_bg_class = 'yellowbg';
      }
      if (option1[i].Present == option1[i].RRC_Incharge_Count) 
      {
          var rrc_bg_class = '';
      }
      else
      {
          var rrc_bg_class = 'yellowbg';
      }
      if (option1[i].Present == option1[i].Program_manager_Count) 
      {
          var prog_bg_class = '';
      }
      else
      {
          var prog_bg_class = 'yellowbg';
      }
      if (option1[i].Present == option1[i].ED_Count) 
      {
          var ed_bg_class = '';
      }
      else
      {
          var ed_bg_class = 'yellowbg';
      }
      if (loginas == 1000) 
      {
          
          ifdata = '<td class="'+proj_bg_class+'">'+option1[i].Project_Manager_Count+'</td><td>'+option1[i].Project_Manager_Comment+'</td><td>'+option1[i].Project_manager_Remark+'</td><td class="'+rrc_bg_class+'">'+option1[i].RRC_Incharge_Count+'</td><td>'+option1[i].RRC_Incharge_Comment+'</td><td>'+option1[i].RRC_Incharge_Remark+'</td><td class="'+prog_bg_class+'">'+option1[i].Program_manager_Count+'</td><td>'+option1[i].Program_manager_Comment+'</td><td>'+option1[i].Program_manager_Remark+'</td><td class="'+ed_bg_class+'">'+option1[i].ED_Count+'</td><td>'+option1[i].ED_Comment+'</td><td>'+option1[i].ED_Remark+'</td><td class="'+admin_bg_class+'">'+option1[i].Admin_Count+'</td><td>'+option1[i].Admin_Comment+'</td><td>'+option1[i].Admin_Remark+'</td></tr>';
      }
      else if (loginas == 1004)
      {
          ifdata = '<td class="'+proj_bg_class+'">'+option1[i].Project_Manager_Count+'</td><td'+option1[i].Project_Manager_Comment+'</td><td>'+option1[i].Project_manager_Remark+'</td></tr>';
      }
      else if (loginas == 1005)
      {
          
          ifdata = '<td class="'+proj_bg_class+'">'+option1[i].Project_Manager_Count+'</td><td>'+option1[i].Project_Manager_Comment+'</td><td>'+option1[i].Project_manager_Remark+'</td><td class="'+rrc_bg_class+'">'+option1[i].RRC_Incharge_Count+'</td><td>'+option1[i].RRC_Incharge_Comment+'</td><td>'+option1[i].RRC_Incharge_Remark+'</td></tr>';
      }
      else if (loginas == 1006)
      {
          
          ifdata = '<td class="'+proj_bg_class+'">'+option1[i].Project_Manager_Count+'</td><td>'+option1[i].Project_Manager_Comment+'</td><td>'+option1[i].Project_manager_Remark+'</td><td class="'+rrc_bg_class+'">'+option1[i].RRC_Incharge_Count+'</td><td>'+option1[i].RRC_Incharge_Comment+'</td><td>'+option1[i].RRC_Incharge_Remark+'</td><td class="'+prog_bg_class+'">'+option1[i].Program_manager_Count+'</td><td>'+option1[i].Program_manager_Comment+'</td><td>'+option1[i].Program_manager_Remark+'</td></tr>';
      }
      else if (loginas == 1007)
      {
          
          ifdata = '<td class="'+proj_bg_class+'">'+option1[i].Project_Manager_Count+'</td><td>'+option1[i].Project_Manager_Comment+'</td><td>'+option1[i].Project_manager_Remark+'</td><td class="'+rrc_bg_class+'">'+option1[i].RRC_Incharge_Count+'</td><td>'+option1[i].RRC_Incharge_Comment+'</td><td>'+option1[i].RRC_Incharge_Remark+'</td><td class="'+prog_bg_class+'">'+option1[i].Program_manager_Count+'</td><td>'+option1[i].Program_manager_Comment+'</td><td>'+option1[i].Program_manager_Remark+'</td><td class="'+ed_bg_class+'">'+option1[i].ED_Count+'</td><td>'+option1[i].ED_Comment+'</td><td>'+option1[i].ED_Remark+'</td></tr>';
      }
      else
      {
          ifdata = '';
          // ifdata = '<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
      }

      var stddata = '';
      $.each(totaldaysarr,function(k4,v4) {
          // dumpdata[j]['D'+v4.vals] = response[i]['td_'+v4.vals];
          stddata += '<td>'+option1[i]['D'+v4.vals]+'</td>';
      });
      // console.log(ifdata);
      tdata += '<tr><td>'+option1[i].Employee_name+'</td><td>'+option1[i].Employee_no+'</td><td>'+option1[i].Designation+'</td><td>'+option1[i].Location+'</td>'+stddata+'<td>'+option1[i].Present+'</td><td>'+option1[i].Leave+'</td><td>'+option1[i].Holiday+'</td><td>'+option1[i].Absent+'</td><td>'+option1[i].OffDay+'</td><td>'+option1[i].RestDay+'</td><td>'+option1[i].Onduty+'</td><td>'+option1[i].Error+'</td><td>'+option1[i].Statusunknown+'</td><td>'+option1[i].Total+'</td>'+ifdata;
      
  }

  
  $('#firsttrheading').html(strdata);
  $('#tablerowdata1').html(tdata);
  $('#example1').DataTable({
   "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
   "pageLength": 10
});

  var tdata2 = '';
  var ifdata2 = '';

  for (var j = 0; j < size12; j++) 
  {
      if (option2[j].Present == option2[j].Admin_Count) 
      {
          var admin_bg_class = '';
      }
      else
      {
          var admin_bg_class = 'yellowbg';
      }
      if (option2[j].Present == option2[j].Project_Manager_Count) 
      {
          var proj_bg_class = '';
      }
      else
      {
          var proj_bg_class = 'yellowbg';
      }
      if (option2[j].Present == option2[j].RRC_Incharge_Count) 
      {
          var rrc_bg_class = '';
      }
      else
      {
          var rrc_bg_class = 'yellowbg';
      }
      if (option2[j].Present == option2[j].Program_manager_Count) 
      {
          var prog_bg_class = '';
      }
      else
      {
          var prog_bg_class = 'yellowbg';
      }
      if (option2[j].Present == option2[j].ED_Count) 
      {
          var ed_bg_class = '';
      }
      else
      {
          var ed_bg_class = 'yellowbg';
      }
      if (loginas == 1000) 
      {
          
          ifdata2 = '<td class="'+proj_bg_class+'">'+option2[j].Project_Manager_Count+'</td><td>'+option2[j].Project_Manager_Comment+'</td><td>'+option2[j].Project_manager_Remark+'</td><td class="'+rrc_bg_class+'">'+option2[j].RRC_Incharge_Count+'</td><td>'+option2[j].RRC_Incharge_Comment+'</td><td>'+option2[j].RRC_Incharge_Remark+'</td><td class="'+prog_bg_class+'">'+option2[j].Program_manager_Count+'</td><td>'+option2[j].Program_manager_Comment+'</td><td>'+option2[j].Program_manager_Remark+'</td><td class="'+ed_bg_class+'">'+option2[j].ED_Count+'</td><td>'+option2[j].ED_Comment+'</td><td>'+option2[j].ED_Remark+'</td><td class="'+admin_bg_class+'">'+option2[j].Admin_Count+'</td><td>'+option2[j].Admin_Comment+'</td><td>'+option2[j].Admin_Remark+'</td></tr>';
      }
      else if (loginas == 1004)
      {
          ifdata2 = '<td class="'+proj_bg_class+'">'+option2[j].Project_Manager_Count+'</td><td'+option2[j].Project_Manager_Comment+'</td><td>'+option2[j].Project_manager_Remark+'</td></tr>';
      }
      else if (loginas == 1005)
      {
          
          ifdata2 = '<td class="'+proj_bg_class+'">'+option2[j].Project_Manager_Count+'</td><td>'+option2[j].Project_Manager_Comment+'</td><td>'+option2[j].Project_manager_Remark+'</td><td class="'+rrc_bg_class+'">'+option2[j].RRC_Incharge_Count+'</td><td>'+option2[j].RRC_Incharge_Comment+'</td><td>'+option2[j].RRC_Incharge_Remark+'</td></tr>';
      }
      else if (loginas == 1006)
      {
          
          ifdata2 = '<td class="'+proj_bg_class+'">'+option2[j].Project_Manager_Count+'</td><td>'+option2[j].Project_Manager_Comment+'</td><td>'+option2[j].Project_manager_Remark+'</td><td class="'+rrc_bg_class+'">'+option2[j].RRC_Incharge_Count+'</td><td>'+option2[j].RRC_Incharge_Comment+'</td><td>'+option2[j].RRC_Incharge_Remark+'</td><td class="'+prog_bg_class+'">'+option2[j].Program_manager_Count+'</td><td>'+option2[j].Program_manager_Comment+'</td><td>'+option2[j].Program_manager_Remark+'</td></tr>';
      }
      else if (loginas == 1007)
      {
          
          ifdata2 = '<td class="'+proj_bg_class+'">'+option2[j].Project_Manager_Count+'</td><td>'+option2[j].Project_Manager_Comment+'</td><td>'+option2[j].Project_manager_Remark+'</td><td class="'+rrc_bg_class+'">'+option2[j].RRC_Incharge_Count+'</td><td>'+option2[j].RRC_Incharge_Comment+'</td><td>'+option2[j].RRC_Incharge_Remark+'</td><td class="'+prog_bg_class+'">'+option2[j].Program_manager_Count+'</td><td>'+option2[j].Program_manager_Comment+'</td><td>'+option2[j].Program_manager_Remark+'</td><td class="'+ed_bg_class+'">'+option2[j].ED_Count+'</td><td>'+option2[j].ED_Comment+'</td><td>'+option2[j].ED_Remark+'</td></tr>';
      }
      else
      {
          ifdata2 = '';
          // ifdata2 = '<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
      }

      var stddata = '';
      $.each(totaldaysarr,function(k4,v4) {
          // dumpdata[j]['D'+v4.vals] = response[i]['td_'+v4.vals];
          stddata += '<td>'+option2[j]['D'+v4.vals]+'</td>';
      });
      // console.log(ifdata2);
      tdata2 += '<tr><td>'+option2[j].Employee_name+'</td><td>'+option2[j].Employee_no+'</td><td>'+option2[j].Designation+'</td><td>'+option2[j].Location+'</td>'+stddata+'<td>'+option2[j].Present+'</td><td>'+option2[j].Leave+'</td><td>'+option2[j].Holiday+'</td><td>'+option2[j].Absent+'</td><td>'+option2[j].OffDay+'</td><td>'+option2[j].RestDay+'</td><td>'+option2[j].Onduty+'</td><td>'+option2[j].Error+'</td><td>'+option2[j].Statusunknown+'</td><td>'+option2[j].Total+'</td>'+ifdata2;
      
  }
  $('#secondtrheading').html(strdata);
  $('#tablerowdata2').html(tdata2);
  $('#example2').DataTable({
   "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
   "pageLength": 10
});

  var tdata3 = '';
  var ifdata3 = '';

  for (var k = 0; k < size13; k++) 
  {
      if (option3[k].Present == option3[k].Admin_Count) 
      {
          var admin_bg_class = '';
      }
      else
      {
          var admin_bg_class = 'yellowbg';
      }
      if (option3[k].Present == option3[k].Project_Manager_Count) 
      {
          var proj_bg_class = '';
      }
      else
      {
          var proj_bg_class = 'yellowbg';
      }
      if (option3[k].Present == option3[k].RRC_Incharge_Count) 
      {
          var rrc_bg_class = '';
      }
      else
      {
          var rrc_bg_class = 'yellowbg';
      }
      if (option3[k].Present == option3[k].Program_manager_Count) 
      {
          var prog_bg_class = '';
      }
      else
      {
          var prog_bg_class = 'yellowbg';
      }
      if (option3[k].Present == option3[k].ED_Count) 
      {
          var ed_bg_class = '';
      }
      else
      {
          var ed_bg_class = 'yellowbg';
      }
      if (loginas == 1000) 
      {
          
          ifdata3 = '<td class="'+proj_bg_class+'">'+option3[k].Project_Manager_Count+'</td><td>'+option3[k].Project_Manager_Comment+'</td><td>'+option3[k].Project_manager_Remark+'</td><td class="'+rrc_bg_class+'">'+option3[k].RRC_Incharge_Count+'</td><td>'+option3[k].RRC_Incharge_Comment+'</td><td>'+option3[k].RRC_Incharge_Remark+'</td><td class="'+prog_bg_class+'">'+option3[k].Program_manager_Count+'</td><td>'+option3[k].Program_manager_Comment+'</td><td>'+option3[k].Program_manager_Remark+'</td><td class="'+ed_bg_class+'">'+option3[k].ED_Count+'</td><td>'+option3[k].ED_Comment+'</td><td>'+option3[k].ED_Remark+'</td><td class="'+admin_bg_class+'">'+option3[k].Admin_Count+'</td><td>'+option3[k].Admin_Comment+'</td><td>'+option3[k].Admin_Remark+'</td></tr>';
      }
      else if (loginas == 1004)
      {
          ifdata3 = '<td class="'+proj_bg_class+'">'+option3[k].Project_Manager_Count+'</td><td'+option3[k].Project_Manager_Comment+'</td><td>'+option3[k].Project_manager_Remark+'</td></tr>';
      }
      else if (loginas == 1005)
      {
          
          ifdata3 = '<td class="'+proj_bg_class+'">'+option3[k].Project_Manager_Count+'</td><td>'+option3[k].Project_Manager_Comment+'</td><td>'+option3[k].Project_manager_Remark+'</td><td class="'+rrc_bg_class+'">'+option3[k].RRC_Incharge_Count+'</td><td>'+option3[k].RRC_Incharge_Comment+'</td><td>'+option3[k].RRC_Incharge_Remark+'</td></tr>';
      }
      else if (loginas == 1006)
      {
          
          ifdata3 = '<td class="'+proj_bg_class+'">'+option3[k].Project_Manager_Count+'</td><td>'+option3[k].Project_Manager_Comment+'</td><td>'+option3[k].Project_manager_Remark+'</td><td class="'+rrc_bg_class+'">'+option3[k].RRC_Incharge_Count+'</td><td>'+option3[k].RRC_Incharge_Comment+'</td><td>'+option3[k].RRC_Incharge_Remark+'</td><td class="'+prog_bg_class+'">'+option3[k].Program_manager_Count+'</td><td>'+option3[k].Program_manager_Comment+'</td><td>'+option3[k].Program_manager_Remark+'</td></tr>';
      }
      else if (loginas == 1007)
      {
          
          ifdata3 = '<td class="'+proj_bg_class+'">'+option3[k].Project_Manager_Count+'</td><td>'+option3[k].Project_Manager_Comment+'</td><td>'+option3[k].Project_manager_Remark+'</td><td class="'+rrc_bg_class+'">'+option3[k].RRC_Incharge_Count+'</td><td>'+option3[k].RRC_Incharge_Comment+'</td><td>'+option3[k].RRC_Incharge_Remark+'</td><td class="'+prog_bg_class+'">'+option3[k].Program_manager_Count+'</td><td>'+option3[k].Program_manager_Comment+'</td><td>'+option3[k].Program_manager_Remark+'</td><td class="'+ed_bg_class+'">'+option3[k].ED_Count+'</td><td>'+option3[k].ED_Comment+'</td><td>'+option3[k].ED_Remark+'</td></tr>';
      }
      else
      {
          ifdata3 = '';
          // ifdata3 = '<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
      }

      var stddata = '';
      $.each(totaldaysarr,function(k4,v4) {
          // dumpdata[j]['D'+v4.vals] = response[i]['td_'+v4.vals];
          stddata += '<td>'+option3[k]['D'+v4.vals]+'</td>';
      });
      // console.log(ifdata3);
      tdata3 += '<tr><td>'+option3[k].Employee_name+'</td><td>'+option3[k].Employee_no+'</td><td>'+option3[k].Designation+'</td><td>'+option3[k].Location+'</td>'+stddata+'<td>'+option3[k].Present+'</td><td>'+option3[k].Leave+'</td><td>'+option3[k].Holiday+'</td><td>'+option3[k].Absent+'</td><td>'+option3[k].OffDay+'</td><td>'+option3[k].RestDay+'</td><td>'+option3[k].Onduty+'</td><td>'+option3[k].Error+'</td><td>'+option3[k].Statusunknown+'</td><td>'+option3[k].Total+'</td>'+ifdata3;
      
  }
  $('#thirdtrheading').html(strdata);
  $('#tablerowdata3').html(tdata3);
  $('#example3').DataTable({
   "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
   "pageLength": 10
});

  var tdata4 = '';
  var ifdata4 = '';

  for (var l = 0; l < size14; l++) 
  {
      if (option4[l].Present == option4[l].Admin_Count) 
      {
          var admin_bg_class = '';
      }
      else
      {
          var admin_bg_class = 'yellowbg';
      }
      if (option4[l].Present == option4[l].Project_Manager_Count) 
      {
          var proj_bg_class = '';
      }
      else
      {
          var proj_bg_class = 'yellowbg';
      }
      if (option4[l].Present == option4[l].RRC_Incharge_Count) 
      {
          var rrc_bg_class = '';
      }
      else
      {
          var rrc_bg_class = 'yellowbg';
      }
      if (option4[l].Present == option4[l].Program_manager_Count) 
      {
          var prog_bg_class = '';
      }
      else
      {
          var prog_bg_class = 'yellowbg';
      }
      if (option4[l].Present == option4[l].ED_Count) 
      {
          var ed_bg_class = '';
      }
      else
      {
          var ed_bg_class = 'yellowbg';
      }
      if (loginas == 1000) 
      {
          
          ifdata4 = '<td class="'+proj_bg_class+'">'+option4[l].Project_Manager_Count+'</td><td>'+option4[l].Project_Manager_Comment+'</td><td>'+option4[l].Project_manager_Remark+'</td><td class="'+rrc_bg_class+'">'+option4[l].RRC_Incharge_Count+'</td><td>'+option4[l].RRC_Incharge_Comment+'</td><td>'+option4[l].RRC_Incharge_Remark+'</td><td class="'+prog_bg_class+'">'+option4[l].Program_manager_Count+'</td><td>'+option4[l].Program_manager_Comment+'</td><td>'+option4[l].Program_manager_Remark+'</td><td class="'+ed_bg_class+'">'+option4[l].ED_Count+'</td><td>'+option4[l].ED_Comment+'</td><td>'+option4[l].ED_Remark+'</td><td class="'+admin_bg_class+'">'+option4[l].Admin_Count+'</td><td>'+option4[l].Admin_Comment+'</td><td>'+option4[l].Admin_Remark+'</td></tr>';
      }
      else if (loginas == 1004)
      {
          ifdata4 = '<td class="'+proj_bg_class+'">'+option4[l].Project_Manager_Count+'</td><td'+option4[l].Project_Manager_Comment+'</td><td>'+option4[l].Project_manager_Remark+'</td></tr>';
      }
      else if (loginas == 1005)
      {
          
          ifdata4 = '<td class="'+proj_bg_class+'">'+option4[l].Project_Manager_Count+'</td><td>'+option4[l].Project_Manager_Comment+'</td><td>'+option4[l].Project_manager_Remark+'</td><td class="'+rrc_bg_class+'">'+option4[l].RRC_Incharge_Count+'</td><td>'+option4[l].RRC_Incharge_Comment+'</td><td>'+option4[l].RRC_Incharge_Remark+'</td></tr>';
      }
      else if (loginas == 1006)
      {
          
          ifdata4 = '<td class="'+proj_bg_class+'">'+option4[l].Project_Manager_Count+'</td><td>'+option4[l].Project_Manager_Comment+'</td><td>'+option4[l].Project_manager_Remark+'</td><td class="'+rrc_bg_class+'">'+option4[l].RRC_Incharge_Count+'</td><td>'+option4[l].RRC_Incharge_Comment+'</td><td>'+option4[l].RRC_Incharge_Remark+'</td><td class="'+prog_bg_class+'">'+option4[l].Program_manager_Count+'</td><td>'+option4[l].Program_manager_Comment+'</td><td>'+option4[l].Program_manager_Remark+'</td></tr>';
      }
      else if (loginas == 1007)
      {
          
          ifdata4 = '<td class="'+proj_bg_class+'">'+option4[l].Project_Manager_Count+'</td><td>'+option4[l].Project_Manager_Comment+'</td><td>'+option4[l].Project_manager_Remark+'</td><td class="'+rrc_bg_class+'">'+option4[l].RRC_Incharge_Count+'</td><td>'+option4[l].RRC_Incharge_Comment+'</td><td>'+option4[l].RRC_Incharge_Remark+'</td><td class="'+prog_bg_class+'">'+option4[l].Program_manager_Count+'</td><td>'+option4[l].Program_manager_Comment+'</td><td>'+option4[l].Program_manager_Remark+'</td><td class="'+ed_bg_class+'">'+option4[l].ED_Count+'</td><td>'+option4[l].ED_Comment+'</td><td>'+option4[l].ED_Remark+'</td></tr>';
      }
      else
      {
          ifdata4 = '';
          // ifdata4 = '<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
      }

      var stddata = '';
      $.each(totaldaysarr,function(k4,v4) {
          // dumpdata[j]['D'+v4.vals] = response[i]['td_'+v4.vals];
          stddata += '<td>'+option4[l]['D'+v4.vals]+'</td>';
      });
      // console.log(ifdata4);
      tdata4 += '<tr><td>'+option4[l].Employee_name+'</td><td>'+option4[l].Employee_no+'</td><td>'+option4[l].Designation+'</td><td>'+option4[l].Location+'</td>'+stddata+'<td>'+option4[l].Present+'</td><td>'+option4[l].Leave+'</td><td>'+option4[l].Holiday+'</td><td>'+option4[l].Absent+'</td><td>'+option4[l].OffDay+'</td><td>'+option4[l].RestDay+'</td><td>'+option4[l].Onduty+'</td><td>'+option4[l].Error+'</td><td>'+option4[l].Statusunknown+'</td><td>'+option4[l].Total+'</td>'+ifdata4;
      
  }
  $('#fourthtrheading').html(strdata);
  $('#tablerowdata4').html(tdata4);
  $('#example4').DataTable({
   "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
   "pageLength": 10
});


  $("#Login_screen").fadeOut(2000);
}

function cntchange()
{
  var cnts = $('input[name=entry_Type]:checked').val();
  console.log('cnts');
  console.log(cnts);
  if (cnts == 'Manager') 
  {
    $('#managercnt').removeClass('hidden');
    $('#empcnt').addClass('hidden');
  }
  else if (cnts == 'Emp')
  {
    $('#empcnt').removeClass('hidden');
    $('#managercnt').addClass('hidden');
  }
}


</script>