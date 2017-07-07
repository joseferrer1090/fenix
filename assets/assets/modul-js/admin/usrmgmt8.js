$("#date").datepicker({format: 'yyyy-mm-dd'});
function clearDate(){
    $("#date").val("");
}
function loadData(page){
         $.ajax({
                type: "POST",
                url: "/user-management/list",
                data: "page="+page,
                cache: false,
                beforeSend: function(){ $("#loading").show();},
                success: function(msg)
                        {
                            $(".usr-tbl-wrap").ajaxComplete(function(event, request, settings)
                            {
                                //loading_hide();
                                $(".usr-tbl-wrap").html(msg);
                                $('#usr-tbl').footable();
                            });
                        }
                
            });
        
}
function filter(){
   var date = $("#date").val();
   var user = $("#user").val();
   var state= $("#state").val();
       $.ajax({
                type: "POST",
                url: "/user-management/filter",
                data: "&date="+date+"&uname="+user+"&state="+state,
                cache: false,
                success: function(msg)
                        {
                           loadData(1);
                           $("#filter").html("<i class='fa fa-search'></i> FILTER");
                           $("#filter").attr("disabled", false);
                        }
                
            });
}
function clearfilter(){
     $.ajax({
                type: "POST",
                url: "/user-management/clearfilter",
                data: "clear=1",
                cache: false,
                success: function(msg)
                        {
                           loadData(1);
                        }
                
            });
}
function block(id){
   $.ajax({
                type: "POST",
                url: "/user-management/block",
                data: "id="+id,
                cache: false,
                success: function(msg)
                        {
                           loadData(1);
                        }
                
            });
}
function unblock(id){
    $.ajax({
                type: "POST",
                url: "/user-management/unblock",
                data: "id="+id,
                cache: false,
                success: function(msg)
                        {
                           loadData(1);
                        }
                
            });
}

function changeproduct(strurl,product_id){

    var url=strurl+product_id;
    $.ajax({
        type: "GET",
        url: url,
        cache: false,
        success: function(msg)
                {
                   loadData(1);
                }
        
    });
}
    

function godMode(id){
   $.ajax({
        type: "POST",
        url: "/user-management/godmode",
        data: "id="+id,
        cache: false,
        success: function(msg)
        {
           window.location.href = "/dashboard";
        }
        
    });
}

function activebvault(id){

    $.ajax({
        type: "POST",
        url: "/user-management/activebvault",
        data: "id="+id,
        cache: false,
        success: function(msg)
        {
           alert(msg);
           //window.location.href = "/user-management";
        }
        
    });
}



$(document).ready(function() {
    loadData(1);
    $('#filter').live('click',function(){
        $(this).html("<i class='fa fa-search'></i> PLEASE WAIT..")
        $(this).attr("disabled", true);
        filter();
    }); 
    $('#clearfilter').live('click',function(){
        clearfilter();
    }); 
    $('.usr-tbl-wrap .pagination li').live('click',function(){
                    var page = $(this).attr('p');
                    loadData(page);
    });  
    $('.ban').live('click',function(){
                     $(this).html("PLEASE WAIT..")
                    $(this).attr("disabled", true);
                    var id = $(this).attr('data-id');
                    block(id);
    });  
    $('.unban').live('click',function(){
                    $(this).html("PLEASE WAIT..")
                    $(this).attr("disabled", true);
                    var id = $(this).attr('data-id');
                    unblock(id);
    }); 
    $('.changeproduct').live('click',function(e){
        e.preventDefault();
        id=$(this).data('id');
        product_id=($(this).parent().find('select').val());
        changeproduct($(this).attr('href'),product_id);
    });
    $('.godmode').live('click',function(){
            $(this).html("PLEASE WAIT..")
            $(this).attr("disabled", true);
            var id = $(this).attr('data-id');
            godMode(id);
    }); 

     $('.active-bvault').live("click",function(e){
        e.preventDefault();
        id=$(this).data('id');
        $(this).html("PLEASE WAIT..")
        $(this).attr("disabled", true);
        var id = $(this).attr('data-id');
        activebvault(id);

     });



});