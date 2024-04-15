$(document).ready(function(){
    $('#roleid').change(function(){

        if($('#roleid').val() == 'busoperator'){
            $('#doc').show();
            $("input").prop('required',true);
            $('#user_reg').html('Bus Operator Register');
        }else{
            $('#doc').hide();
            $('#user_reg').html('Customer Register');
        }
    });

    $()

    $('#ticket').change(function(){
        var n = $('#schedule').val();
        var t = $('#ticket').val();
        $.ajax({
            type: "POST",
            url: "script.php",
            data: {
                "request" : "schedule",
                "id" :  n,
            },
            success: function(response){
                $('#amount').val(response*t);
            }
        });
    });

});

