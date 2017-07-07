var Script = function () {

    $.validator.setDefaults({
        submitHandler: function() {
            dataString=$('#transferx').serialize();
            //alert(dataString);
             $.ajax({
                type: "POST",
                url: "/account/transfer/exec",
                data: dataString,
                cache: false,
                beforeSend: function(){
                    $("#submitpin").hide();
                    $("#waitingpin").show();
                    $("#suksesupdate").hide();
                    $("#gagalupdate").hide();
                },
                complete: function(e, xhr, settings){
                    if(e.status === 200){
                        $("#submitpin").show();
                        $("#waitingpin").hide();
                        $("#suksesupdate").show();
                        setTimeout(function() {
                            window.location.href=window.location.href + "?success=1";
                        }, 2000);
                    }else{
                        $("#submitpin").show();
                        $("#waitingpin").hide();
                        //$("#suksesupdate").show();
                        if(e.status==202){
                            $('#msjerror').html('Operation cancelled, user banned');
                        }
                        $("#gagalupdate").show();
                    }
                }
                
            });
        }
    });

    $().ready(function() {
        $("#transferx").validate({
            rules: {
                uname: {
                    required: false
                },
                nominal: {
                    digits: false,
                    required: false
                },
                pin: {
                    required: true,
                    minlength: 6,
                    maxlength: 6,
                    digits: true
                },
            },
            messages: {
                
                uname: {
                    required: "Please insert the username"
                },
                nominal: {
                    required: "Please enter the ammount you want to transfer",
                    digits: "Number only allowed"
                },
                pin: {
                    required: "Please provide current PIN",
                    minlength: "Your PIN must be at least 6 DIGITS",
                    maxlength: "Your PIN must be 6 DIGITS",
                    digits: "Your PIN must be numerical ONLY"
                },
                
                
            }
        });

        // propose username by combining first- and lastname
       
    });


}();