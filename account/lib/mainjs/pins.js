$(document).ready(() =>{

    getRecodes(1)
    function getRecodes(pn){  // get transaction record
        $.ajax({
            url: "../account/modules/process.php",
            method:"POST",
            data:{
                manageRecode:1,
                pageno:pn
                },
            success:function(data){
                  $('#table').html(data);
            }
        });
    }
    $("body").delegate(".page-link","click",function(){
        var n = $(this).attr("n");
         getRecodes(n);
    });

      get(1)
    function get(pn){  // get users record
        $.ajax({
            url: "../account/modules/process.php",
            method:"POST",
            data:{
                manageUsrs:1,
                pageno:pn
                },
            success:function(data){
                  $('#user').html(data);
            }
        });
    }
    $("body").delegate(".page-link","click",function(){
        var n = $(this).attr("n");
         get(n);
    });

    $("body").delegate(".ban","click",function(){ // ban user
        var app = $(this).attr("ban");
          $.ajax({
            url: "../account/modules/process.php",
            method:"POST",
            data:{
                banUser:1,
                id:app
            },
            success:function(data){
                 get(1);
            }
        })
    });
     $("body").delegate(".unban","click",function(){ // unban user
        var app = $(this).attr("unban");
          $.ajax({
            url: "../account/modules/process.php",
            method:"POST",
            data:{
                UnbanUser:1,
                id:app
            },
            success:function(data){
                 get(1);
            }
        })
    });
    $("body").delegate(".delete","click",function(){ // unban user
        var app = $(this).attr("delete");
          $.ajax({
            url: "../account/modules/process.php",
            method:"POST",
            data:{
                deleteUser:1,
                id:app
            },
            success:function(data){
                 get(1);
            }
        })
    });
    $("#cre").on("submit",function(e){ // top up user
        e.preventDefault();
        let amount = $("#amount").val();
        let id     = $("#get").val();

          $.ajax({
            url: "../account/modules/process.php",
            method:"POST",
            data:{
                topup:1,
                amount:amount,
                id:id
            },
            success:function(data){
                $("#error").html("<p class='alert alert-success'>$"+amount+ " has been credited</p>");
                 $("#balance").html('$'+data)
            }
        });
    });
     $("#edit").on("submit",function(e){ // edit top up
           e.preventDefault();
        let amount = $("#a").val();
        let id     = $("#get").val();

        $.ajax({
            url: "../account/modules/process.php",
            method:"POST",
            data:{
                editset:1,
                amount,
                id:id
            },
            success:function(data){
               $("#errors").html("<p class='alert alert-success'>"+amount+" was Debited successfully.</p>");
               $("#balance").html('$'+data)
            }
        });
    });

     $("#creinvest").on("submit",function(e){ // top up investment balance
        e.preventDefault();
        let amount = $("#cre_amount").val();
        let id     = $("#get").val();
        // console.log(amount)
        // console.log(id)

          $.ajax({
            url: "../account/modules/process.php",
            method:"POST",
            data:{
                invest:1,
                amount:amount,
                id:id
            },
            success:function(data){
                console.log(data)
                $("#errorsinvest").html("<p class='alert alert-success'>$"+amount+ " has been credited</p>");
                 $("#investbalance").html('$'+data)
                $("#creinvest").modal('hide')

            }
        });
    });
     $("#editinvest").on("submit",function(e){ //debit investment balance
           e.preventDefault();
        let amount = $("#aamount").val();
        let id     = $("#get").val();

        $.ajax({
            url: "../account/modules/process.php",
            method:"POST",
            data:{
                invest1:1,
                amount:amount,
                id:id
            },
            success:function(data){
                console.log(data)

               $("#errorsinvest").html("<p class='alert alert-success'>"+amount+" was Debited successfully.</p>");
               $("#investbalance").html('$'+data)
               $("#editinvest").modal('hide')
            }
        });
    });
         getUserDepo(1)
    function  getUserDepo(pn){  // get depo record
        $.ajax({
            url: "../account/modules/process.php",
            method:"POST",
            data:{
                manageDepo:1,
                pageno:pn
                },
            success:function(data){
                  $('#userDepo').html(data);
            }
        });
    }
    $("body").delegate(".page-link","click",function(){
        var n = $(this).attr("n");
        getUserDepo(n);
    });
    $("body").delegate(".approve","click",function(){ // approved deposit
        var app = $(this).attr("approve");
          $.ajax({
            url: "../account/modules/process.php",
            method:"POST",
            data:{
                getapprove:1,
                id:app
            },
            success:function(data){
                 getUserDepo(1);

            }
        })
    });
    $("body").delegate(".delete","click",function(){ // approved deposit
        var app = $(this).attr("delete");
          $.ajax({
            url: "../account/modules/process.php",
            method:"POST",
            data:{
                delete:1,
                id:app
            },
            success:function(data){
                 getUserDepo(1);

            }
        })
    });
         getUserTransfer(1)
    function getUserTransfer(pn){  // get transfer record
        $.ajax({
            url: "../account/modules/process.php",
            method:"POST",
            data:{
                transfer:1,
                pageno:pn
                },
            success:function(data){
                  $('#userTransfer').html(data);
            }
        });
    }
    $("body").delegate(".page-link","click",function(){
        var n = $(this).attr("n");
        getUserTransfer(n);
    });
    $("body").delegate(".return","click",function(){ // delete transfer request
        var app = $(this).attr("return");
          $.ajax({
            url: "../account/modules/process.php",
            method:"POST",
            data:{
                getreturn:1,
                id:app
            },
            success:function(data){
                 getUserTransfer(1);

            }
        })
    });

     $("body").delegate(".delete","click",function(){ // delete transfer request
        var app = $(this).attr("delete");
        $(this).parent().parent().remove()
          $.ajax({
            url: "../account/modules/process.php",
            method:"POST",
            data:{
                deletehs:1,
                id:app
            },
            success:function(data){

            }
        })
    });
    
     // admin
    $("#add_admin").on('submit',(e)=>{
        e.preventDefault()

        let admin = $("#admin").val()

        $.ajax({
            url: "../account/modules/process.php",
            method:"POST",
            data:{
                addadmin:1,
                admin:admin,
            },
            success:function(data){
                let datas  = data.trim()
                if(datas == 'added'){
                    $("#add_errors").html("<p class='alert alert-success'>Admin added ! page will reload in few seconds</p");

                    setTimeout(function(){
                        location.reload()
                    },4000)
                }
            }
        })
    })

    $('body').delegate('.removes','click',function(){
        let a = $(this).attr("r");
       $(this).parent().parent().remove()
       $.ajax({
            url: "../account/modules/process.php",
            method:"POST",
            data:{
                removeadmin:1,
                a:a,
            },
            success:function(data){
                console.log(data)
            }
        })
    })

})