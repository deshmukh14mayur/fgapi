        </div>
        <div class="footer">
            <div>
              <center>
                Designed & Developed by  <strong>Bipin</strong> 
              </center>
            </div>
        </div>

        </div>
        </div>

<!-- Mainly scripts -->
<script src="<?php echo base_url("js/bootstrap.min.js"); ?>"></script>
<script src="<?php echo base_url("js/plugins/metisMenu/jquery.metisMenu.js"); ?>"></script>
<script src="<?php echo base_url("js/plugins/slimscroll/jquery.slimscroll.min.js"); ?>"></script>
<!-- Custom and plugin javascript -->
<script src="<?php echo base_url("js/inspinia.js"); ?>"></script>
<script src="<?php echo base_url("js/plugins/pace/pace.min.js"); ?>"></script>
<script src="<?php echo base_url("js/plugins/datapicker/bootstrap-datepicker.js"); ?>"></script>
<script src="<?php echo base_url("js/plugins/fullcalendar/moment.min.js"); ?>"></script>
<script src="<?php echo base_url("js/plugins/daterangepicker/daterangepicker.js"); ?>"></script>
<!-- Sweet alert -->
<script src="<?php echo base_url('js/plugins/sweetalert/sweetalert.min.js'); ?>"></script>

<script type="text/javascript">
// $(".chosen-select").chosen();
var base_url="<?php echo base_url();?>";
function searchT(e)
 {
  var base_url="<?php echo base_url();?>";
      var searchTearm=e.value;
       $.ajax({
        type:'POST',
        url: '<?php echo base_url(); ?>'+'Search/view/'+searchTearm,
        success:function(response)
        {
          /*$(".searchData").append("<li><a href='#'><div class='pull-left'><img src='"+base_url+v1.Image_ID+"' class='img-circle' alt='User Image' height='10%' width='10%'></div><a href='"+base_url+"Customer/view/"+v1.ID+"'><h4>"+v1.Name+"</h4></a><p>"+v1.email+"</p></a></li>");*/
           $(".searchData").html('');
          if(jQuery.isEmptyObject(response))
          {
            $(".searchData").append("<li><h2><i class='fa fa-frown-o'></i> No data found..</h2></li>");
          }
          else{
            $.each(response, function(k,v){
              $.each(v, function(k1,v1){
                console.log(v1.Image_ID);
                if (v1.ID.indexOf("CS") >= 0){
                   $(".searchData").append("<li><a href='"+base_url+"Customer/view/"+v1.ID+"'><h4>"+v1.name+"</h4></a><sup><span class='label label-warning-light pull-right'>Customer</span></sup><p>"+v1.email+"</p></li>");
                }
                else if (v1.ID.indexOf("VS") >= 0){
                  $(".searchData").append("<li><a href='"+base_url+"Vendor/view/"+v1.ID+"'><h4>"+v1.name+"</h4></a><sup><span class='label label-success pull-right'>Vender</span></sup><p>"+v1.email+"</p></li>");
                }else if (v1.ID.indexOf("PS") >= 0){
                  $(".searchData").append("<li><a href='"+base_url+"Product/view/"+v1.ID+"'><h4>"+v1.name+"</h4></a><sup><span class='label label-primary pull-right'>Product</span></sup><p>"+v1.Description+"</p></li>");
                }else{
                   $(".searchData").append("<li><h1>NO Data Found</h1></li>");
                }
               
              });
            });
          }
        }
      }); 
 }
</script>

</body>

</html>
