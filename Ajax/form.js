jQuery(document).ready(function ($) {
    $("form").submit(function (event) {

            $(".form-group").removeClass("has-error");
            $(".help-block").remove();

        var formData = {
            name: $("#name").val(),
            email: $("#email").val(),
            SuperheroAlias: $("#SuperheroAlias").val(),
        };

        $.ajax({
            type: "POST",
            url:"process.php",
            data:formData,
            dataType:"json",
            encode:true,
        })

        .done(function (data) {
            console.log(data);


            

            if (!data.success) {
                if (data.error.name) {
                    $("#name-group").addClass("has-error");
                    $("#name-group").append('<div class="help-block">' +data.error.name + "</div>");
                }

                if (data.error.email) {
                    $("#email-group").addClass("has-error");
                    $("#email-group").append('<div class="help-block">' +data.error.email + "</div>");
                }

                if (data.error.SuperheroAlias) {
                    $("#SuperheroAlias-group").addClass("has-error");
                    $("#SuperheroAlias-group").append('<div class="help-block">' +data.error.SuperheroAlias + "</div>");
                }
            }else{
                $("form").html('<div class="alert alert-success">' + data.message + "</div>");
            }
            
        })

        .fail(function (data) {
            $("form").html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
            console.log(data);
            });
        event.preventDefault();
    });
});


