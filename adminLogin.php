<?php

include("header.php");

?>


<div class="vh-100">
    <div class="container-fluid h-100">
        <div class="row h-100 align-items-center">
            <div class="col-xl-5 col-lg-6 col-mg-8 col-12 m-auto">
                <div class="card p-3" style="border-radius: 1rem;">
                    <div class="card-body">
                        <form id="adminModelForm">
                            <div class="d-flex justify-content-between align-items-center mb-4" >
                            <h3 class="">Admin Login</h3>
                         
                            <a href="index.php">
                            <i class="fas fa-home text-secondary font20"></i>

                            </a>
                         
                            </div>

                            <div class="form-group">
                                <label for="adminUserName">Admin Id <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="adminUserName" name="adminUserName">
                                <span id="adminUsernameError"></span>
                            </div>

                            <div class="form-group">
                                <label for="adminPassword">Password <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="adminPassword" name="adminPassword">
                                <span id="adminPasswordError"></span>
                            </div>

                            <!-- Checkbox -->
                            <div class="form-check d-flex justify-content-start mb-4">
                                <input class="form-check-input" type="checkbox" value="yes" id="rememberPassword" />
                                <label class="form-check-label mx-2" for="rememberPassword"> Remember password </label>
                            </div>

                            <div class="form-group my-1">
                                <button type="submit" class="btn btn-block btn-primary" id="adminLoginBtn">Login</button>
                            </div>

                            <hr class="my-4">

                            <div class="my-2 text-danger" id="adminRespo"></div>

                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>













<?php

include("footer.php");

?>

<script>

function getId(){
        let localstorage =  localStorage.getItem("adminInfo");

        if(localstorage != null && localstorage != undefined){

            let obj = JSON.parse(window.atob(localstorage))
            if(obj['un']){

                $("#adminUserName").val(obj['un']);
                $("#adminPassword").val(obj['ps']);
                $("#rememberPassword").prop('checked',true)
            }

            
        }
       

    }
  $(document).ready(function(){

    getId();

    // let localstorage = JSON.stringify({"un":"hum","ps":"tum"});
    //                         localStorage.setItem("adminInfo", window.btoa(localstorage));


    // alert(JSON.stringify(localstorage))


   

$("#basic-addon3").click(function(){
    if($("#adminPassword").attr("type")=='password'){
        $("#adminPassword").attr("type",'text');
        $("#basic-addon3").html('<i class="fas fa-eye"></i>')
    }else{
        $("#adminPassword").attr("type",'password');
        $("#basic-addon3").html('<i class="fas fa-eye-slash"></i>')


    }
});

 
    $("#adminModelForm").submit(function(e){
        e.preventDefault();
        let username = (($("#adminUserName").val()).trim()).toLowerCase();
        let password = ($("#adminPassword").val()).trim();
        let rememberPassword = $("#rememberPassword").prop('checked') //$("#rememberPassword").prop("checked");

        $("#adminRespo").html("");


        if(username == (undefined || null || "")){
           $("#adminUsernameError").html("Admin Id is required").css("color","red");
           $("#adminUserName").focus();
           $("#adminUserName").addClass("is-invalid");
           return ;
        }else{
            $("#adminUsernameError").html("");
           $("#adminUserName").removeClass("is-invalid");

        }

        if(password == (undefined || null || "")){
           $("#adminPasswordError").html("Password is required").css("color","red");
           $("#adminPassword").focus();
           $("#adminPassword").addClass("is-invalid");
           return ;
           
        }else{
            $("#adminPasswordError").html("");
            $("#adminPassword").removeClass("is-invalid");

        }



        
        // let reqBody = JSON.stringify({"action":"adminLogin","adminId":username,"adminPassword":password});

        $.ajax({
            type:"POST",
            url:"./action/adminLoginQuery.php",
            data:{"action":"adminLogin","adminId":username,"adminPassword":password},
            beforeSend:function(){
                $("#adminLoginBtn").html("Please wait...").attr("disabled",true)
            },
            success:function(respo){
                $("#adminLoginBtn").html("Login").attr("disabled",false)
                let response = JSON.parse(respo);
                console.log(response)
                if(response['status']){

                    if(rememberPassword){
                            let localstorage = JSON.stringify({"un":username,"ps":password});
                            localStorage.setItem("adminInfo", window.btoa(localstorage));
                        }

                    $("#adminRespo").html("");
                    window.open('r-admin/','_self')

                }else{
                    $("#adminRespo").html(response['msg']);

                }

            },
            error:function(error){
                    
                $("#adminLoginBtn").html("Login").attr("disabled",false)

                $("#adminRespo").html("Something went wrong, Try Again").css("color","red");

            }
        });
    });
     
    });

</script>