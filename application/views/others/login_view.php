<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="content-language" content="en-us">
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FGAPI</title>
        <!-- <title><?php //echo $this->lang_library->translate('WOTR'); ?></title> -->
        <link rel="icon" type="image/jpg" href="<?php echo base_url("img/logo.png"); ?>">
        <link href="<?php echo base_url("css/animate.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url('css/bootstrap.min.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url("css/style.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("font-awesome/css/font-awesome.css"); ?>" rel="stylesheet">
        <!-- Sweet Alert -->
        <link href="<?php echo base_url('css/plugins/sweetalert/sweetalert.css'); ?>" rel="stylesheet">
<script type="text/javascript">

        
 /*  window.onload = maxWindow;
    function maxWindow() {
        window.moveTo(0, 0);


        if (document.all) {
             window.open();
            top.window.resizeTo(screen.availWidth, screen.availHeight);

        }

        else if (document.layers || document.getElementById) {
            if (top.window.outerHeight < screen.availHeight || top.window.outerWidth < screen.availWidth) {
                top.window.outerHeight = screen.availHeight;
                top.window.outerWidth = screen.availWidth;
            }
        }
    }
*/
</script> 
   </head>
    <body class="skBlueLight">
        <div class="container">
            <div class="row login-screen">
                <div class="col-md-4 col-md-offset-4 text-center">
                        <img src="<?php echo base_url('img/logo.png');?>" class="margin-bottom50" />
                    
                    <!-- <form id="loginForm" action="<?php echo base_url('login/process'); ?>" class="form-horizontal" method="post" id="loginForm"> -->
                    <form id="loginForm" class="form-horizontal" id="loginForm">
                        <div class="form-group">
                            &nbsp;
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" class="form-control" id="u" name="email" placeholder="Username">
                                <!-- <input type="text" class="form-control" id="u" name="email" placeholder="<?php //echo $this->lang_library->translate('Username'); ?>"> -->
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                <input type="password" class="form-control" id="p" name="password" placeholder="Password">
                                <!-- <input type="password" class="form-control" id="p" name="password" placeholder="<?php //echo $this->lang_library->translate('Password'); ?>"> -->
                            </div>
                        </div>
                        <div id="login_error"></div>
                        <div class="form-group">
                            <button type="button" class="btn btn-md btn-block skYellowNormal" id="btnsubmit"><i class="fa fa-sign-in padding-right5"></i> Sign In</button>
                            <!-- <button type="submit" class="btn btn-md btn-block skYellowNormal"><i class="fa fa-sign-in padding-right5"></i> Sign In</button> -->
                        </div>
                    </form>
                    
                    <!-- <div class="langauges margin-top50">
                        <div class="btn-group">
                            <?php 
                                //foreach($all_langs as $one)
                                //{
                            ?>
                            <button class="btn btn-btn-white" type="button">
                                <a href="<?php //echo base_url('login/index/'.$one['Title']); ?>" class=""><?php echo ucfirst($one['Title']); ?></a>
                            </button>
                            <?php //} ?>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
        <script src="<?php echo base_url('js/jquery-2.1.1.js'); ?>"></script>
        <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
        <!-- Jquery Validate -->
        <script src="<?php echo base_url("js/plugins/validate/jquery.validate.min.js"); ?>"></script>
        <script src="<?php echo base_url('js/formSerialize.js'); ?>"></script>

        <!-- Sweet alert -->
        <script src="<?php echo base_url('js/plugins/sweetalert/sweetalert.min.js'); ?>"></script>
        <script type="text/javascript">
        base_url = '<?php echo base_url(); ?>';
        console.log('base_url');
        console.log(base_url);
        $(document).ready(function() {

            <?php  ?>
            // $("#loginForm").postAjaxData(function(result){
            //     if(result === true)
            //     {
            //         window.location.href = '<?php echo base_url("Dashboard"); ?>';
            //     }
            //     else {
            //         $("#login_error").text("Authentication Failed!!");
            //     }
            // });

            $('#btnsubmit').click(function(){
                $('body').prepend('<div id="Login_screen"><img src="'+base_url+'img/loader.gif"></div>');
                $("#Login_screen").fadeIn('fast');
                var email = $('#u').val();
                var pwd = $('#p').val();

                if(email == '' || email == null || email == undefined)
                {
                    $("#Login_screen").fadeOut(2000);
                    swal("Oops...", "Please Enter Email ID ! ", "error");
                }
                else if (pwd == '' || pwd == null || pwd == undefined) 
                {
                    $("#Login_screen").fadeOut(2000);
                    swal("Oops...", "Please Enter Password ! ", "error");
                }
                else
                {


                    $("#Login_screen").fadeOut(2000);
                    swal("Done", "Log in Successfully", "success");
                    window.location.href = '<?php echo base_url("Dashboard"); ?>';

                    // var obj = {};
                    // obj.op = 'get';
                    // obj.DSN = 100101;
                    // var obj2 = {};
                    // obj2.Reg_EmialID = email;
                    // obj2.Password = pwd;
                    // obj.payload = JSON.stringify(obj2);

                    // var estr = JSON.stringify(obj);

                    // console.log(obj);
                    // console.log(estr);



                        // var estr2 = 'op=get%3FDSN=100101%3Fpayload=Reg_EmialID:'+email+'%3FPassword:'+pwd;
                        // var estr = encodeURIComponent('op=getDSN=100101?payload={"Reg_EmialID":"'+email+'","Password":"'+pwd+'"}');
                    // $.ajax({
                    // type:'get',
                    // data: obj,
                    // // data: { 
                    // //     op: 'get', 
                    // //     DSN: 100101, 
                    // //     payload: {Reg_EmialID : email,
                    // //         Password : pwd}
                    // //   },
                    // datatype:'json',
                    // // url: 'http://104.211.73.199/dtapi/Dtoperations/wDT/'+estr,
                    // // url: 'http://localhost/dtapi/Dtoperations/wDT/',
                    // url: 'http://dtapi.wotr.org.in/dtapi/Dtoperations/wDT/',
                    // headers: {
                    // 'Access-Control-Allow-Origin': '*'
                    //     },
                    // success:function(response)
                    // {

                    //       console.log('response');
                    //       console.log('typeof');
                    //       console.log(typeof response);

                    //       var jres = JSON.parse(response);
                    //       var finalres = JSON.parse(jres);

                    //           if (finalres.statusCode == 200) 
                    //       {
                            
                            
                    //         var logindata = {};
                    //         logindata.ID = finalres.payLoad[0].Employee_Code ;
                    //         logindata.Name = finalres.payLoad[0].Employee_Name ;
                    //         logindata.Email = finalres.payLoad[0].Reg_EmialID ;
                    //         logindata.Login_as = finalres.payLoad[0].RoleID ;
                    //         logindata.Logged_in = "TRUE";
                    //         logindata.Locked = "FALSE";

                    //         var getlist = [];
                    //         var getlist2 = {};
                    //         var rolej = {};
                    //           rolej.op = 'get';
                    //           rolej.DSN = 100106;
                    //           rolej.payload = JSON.stringify({"RoleID":finalres.payLoad[0].RoleID});
                    //         $.ajax({
                    //             type:'get',
                    //             data: rolej,
                    //             datatype:'json',
                    //             url: 'http://dtapi.wotr.org.in/dtapi/Dtoperations/wDT/',
                    //             // url: 'http://localhost/dtapi/Dtoperations/wDT/',
                    //              headers: {
                    //                             'Access-Control-Allow-Origin': '*'
                    //                                 },
                    //             success:function(responseget)
                    //             {
                    //                 var jresget = JSON.parse(responseget);
                    //                 var finalresget = JSON.parse(jresget);
                    //                 if (finalresget.statusCode == 200) 
                    //                 {
                    //                     if (finalresget.payLoad.length > 0) 
                    //                     {
                    //                         console.log('finalresget');
                    //                         console.log(finalresget.payLoad.length);
                    //                         console.log(finalresget);
                    //                         for (var j = 0; j < finalresget.payLoad.length; j++) 
                    //                         {
                    //                             console.log(finalresget.payLoad[j].ObjectID);
                    //                             if (getlist.includes(finalresget.payLoad[j].ObjectID)) 
                    //                             {
                    //                                 getlist2[finalresget.payLoad[j].ObjectID][finalresget.payLoad[j].PermissionID] = finalresget.payLoad[j];
                    //                             }
                    //                             else
                    //                             {
                    //                                 getlist.push(finalresget.payLoad[j].ObjectID);

                    //                                 getlist2[finalresget.payLoad[j].ObjectID] = {};
                    //                                 // getlist2[finalresget.payLoad[j].ObjectID].name = finalresget.payLoad[j].ObjectID;
                    //                                 getlist2[finalresget.payLoad[j].ObjectID][finalresget.payLoad[j].PermissionID] = finalresget.payLoad[j];
                    //                             }   
                    //                         }

                    //                         logindata.Role_data = getlist2;
                    //                         $.ajax({
                    //                             datatype:'json',
                    //                             data:logindata,
                    //                             type:'POST',
                    //                             url: base_url+'/Login/SetSessiondata',
                    //                             success:function(responsess)
                    //                             {
                    //                                 $("#Login_screen").fadeOut(2000);
                    //                                 swal("Done", "Log in Successfully", "success");
                    //                                 window.location.href = '<?php echo base_url("Dashboard"); ?>';
                    //                                   // var estr = encodeURIComponent('op=list?DSN=100101?payload={}');

                                                    
                    //                             },
                    //                             error:function(){
                    //                                 $("#Login_screen").fadeOut(2000);
                    //                                 swal("Oops...", "Something went wrong!\n ", "error");
                    //                             }
                    //                         });

                    //                         $("#Login_screen").fadeOut(2000);
                    //                     }
                    //                     else
                    //                     {
                    //                         $("#Login_screen").fadeOut(2000);
                    //                         swal("Oops...", "Something went wrong!\n ", "error");
                    //                     }
                                        
                                        
                    //                 }
                    //                 else
                    //                 {
                    //                     $("#Login_screen").fadeOut(2000);
                    //                     swal("Oops...", "Something went wrong!\n ", "error");
                    //                 }
                    //             },
                    //             error:function(err){
                    //                 $("#Login_screen").fadeOut(2000);
                    //                 swal("Oops...", "Something went wrong!\n ", "error");
                    //             }
                    //         });

                    //         console.log('logindata');
                    //         console.log(logindata);
                                        

                            

                            

                            
                    //       }
                    //       else
                    //       {
                    //         $("#Login_screen").fadeOut(2000);
                    //         swal("Oops...", "Something went wrong!\n "+finalres.status, "error");
                    //       }
                          
                    //       console.log('finalres');
                    //       console.log(finalres);
                    //         // console.log(response['ID']); 
                    //     },
                    //             error:function(){
                    //                 $("#Login_screen").fadeOut(2000);
                    //                 swal("Oops...", "Something went wrong!\n ", "error");
                    //             }
                    // });

                    //window.location.href = '<?php echo base_url("Dashboard"); ?>';
                }
                // alert('sfsfssf');
                // console.log(<?php //echo base_url($this->config->item("skyq")["default_home_page"]); ?>);
                
            })
        });            
        </script>
    </body>
</html>