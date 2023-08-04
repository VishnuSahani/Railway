<?php

include("a-header.php");
include("a-navbar.php");

?>


<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <span class="font-weight-bold">
                        Section Details
                    </span>
                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal"
                        data-target="#sectionModal">
                        <!-- <span class="">+</span> -->
                        <span class="">Add</span>
                    </button>

                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <td>#</td>
                                    <td>Section Name</td>
                                    <td>Action</td>
                                </tr>

                            </thead>

                            <tbody id="sectionTableData">
                               
                            </tbody>

                        </table>

                    </div>

                </div>

            </div>
        </div>

        <div class="col-xl-6 col-lg-6 col-12">

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <span>
                        Sector Details
                    </span>
                    <button type="button" class="btn btn-sm btn-outline-success rounded-circle">
                        <span class="">+</span>
                    </button>

                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <td>#</td>
                                    <td>Section Name</td>
                                    <td>Sector Name</td>
                                    <td>Action</td>
                                </tr>

                            </thead>

                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Gorakhpur</td>
                                    <td>Nakaha</td>
                                    <td>
                                        <i class="fas fa-edit"></i>
                                    </td>
                                </tr>
                            </tbody>

                        </table>

                    </div>

                </div>

            </div>


        </div>
    </div>

</div>





<!-- modal for section -->
<!-- Modal -->
<div class="modal fade" id="sectionModal" tabindex="-1" aria-labelledby="sectionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sectionModalLabel">Add Section</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="sectionForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="sectionName">Section Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="sectionName" name="sectionName">
                        <span id="sectionNameError" class="text-danger"></span>

                    </div>
                </div>
                <div class="ml-3" id="sectionRespoStatus"></div>
                <div class="modal-footer">                
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="addSectionBtn">Add Section</button>
                </div>
            </form>
        </div>
    </div>
</div>






<?php

include("a-footer.php");

?>

<script>
    var sectionList = [];


    function createSectionTable(dataList){
        let htmlDisplay = "";
        if(dataList.length == 0){
            htmlDisplay = `<tr>
                <td colspan="3">Section list is empty</td>
            </tr>`;
        }else{

            dataList.forEach((data,index)=>{
                htmlDisplay += `<tr>
                <td>${index+1}</td>
                <td>${data['sectionName']}</td>
                <td><i class="fas fa-edit"></i></td>
            </tr>`;
            });



        }

        $("#sectionTableData").html(htmlDisplay);


    }

    function getSectionList(){
        $.ajax({
            type :"POST",
            url :"./query/action.php",
            data:{"action":"getSectionList"},
            beforeSend:()=>{
                sectionList = [];
            },
            success:(respo)=>{
                let response = JSON.parse(respo);
                if(response['status']){
                    sectionList = response['data'];
                    createSectionTable(sectionList);
                    
                }else{

                }

                
               

            },
            error:()=>{

            }
        });
    }


    $(document).ready(() => {

        getSectionList();

        $("#sectionForm").submit((e) => {
            e.preventDefault();

            let sectionName = (($("#sectionName").val()).trim()).toUpperCase();

            if(sectionName == null || sectionName == undefined || sectionName == ""){
                $("#sectionNameError").html("Section Name is required");
                $("#sectionName").addClass("is-invalid");
                return;
            }

            $.ajax({
               type:"POST",
               url:"./query/action.php",
               data:{"action":"addSection","sectionName":sectionName},
               beforeSend:()=>{

                $("#addSectionBtn").html("Please wait...")
                $("#addSectionBtn").attr("disabled",true)

               },
               success:(respo)=>{                
                let response = JSON.parse(respo);
                if(response['status']){
                    $("#sectionForm")[0].reset();
                    $("#sectionRespoStatus").html(response['msg']).css("color","green");                    
                }else{                    
                    $("#sectionRespoStatus").html(response['msg']).css("color","red");
                }

               },
               error:(error)=>{

               },
               complete:()=>{
                
                $("#addSectionBtn").html("Add Section")
                $("#addSectionBtn").attr("disabled",false);
                setTimeout(()=>{
                    $("#sectionRespoStatus").html("");

                },3000)
               }
            });



        });
    })
</script>