$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "/api/customer/all",
        dataType: "json",
        success: function (data) {
           
            console.log(data);
            $.each(data, function (key, value) {
                console.log(value);
                var id = value.id;
                var tr = $("<tr>");
                tr.append($("<td>").html(value.customer_id));
                tr.append($("<td>").html(value.title));
                tr.append($("<td>").html(value.lname));
                tr.append($("<td>").html(value.fname));
                tr.append($("<td>").html(value.addressline));
                tr.append($("<td>").html(value.phone));
                // tr.append($("<td>").html(value.creditlimit));
                // tr.append($("<td>").html(value.level));
                tr.append("<td><a href="+'/customer/'+id+'/edit'+"><i class='fa-solid fa-user-pen' aria-hidden='true' style='font-size:24px' ></a></i></td>");
                tr.append("<td><a href="+'/customer/'+id+'/delete'+"><i class='fa-sharp fa-solid fa-trash' aria-hidden='true' style='font-size:24px; color:red' ></a></i></td>");
                tr.append("<td><a href="+'/customer/'+id+'/restore'+"><i class='fa-solid fa-trash-can-arrow-up' aria-hidden='true' style='font-size:24px; color:green' ></a></i></td>");
                $("#cbody").append(tr);
            });
           
        },
        error: function () {
            console.log("AJAX load did not work");
            alert("error");
        },
    });

    $("#myFormSubmit").on("click", function (e) {
        e.preventDefault();
        var data = $("#cform").serialize();
        console.log(data);
        $.ajax({
            type: "post",
            url: "/api/customer",
            data: data,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
                $("myModal").modal("hide");
                // $('#myModal').each(function(){
                //          $(this).modal('hide'); });
                //$.each(data, function(key, value){
                var tr = $("<tr>");
                tr.append($("<td>").html(data.customer_id));
                tr.append($("<td>").html(data.title));
                tr.append($("<td>").html(data.lname));
                tr.append($("<td>").html(data.fname));
                tr.append($("<td>").html(data.addressline));
                tr.append($("<td>").html(data.phone));
                tr.append("<td><a href="+'/customer/'+id+'/edit'+"><i class='fa-solid fa-user-pen' aria-hidden='true' style='font-size:24px' ></a></i></td>");
                tr.append("<td><a href="+'/customer/'+id+'/delete'+"><i class='fa-sharp fa-solid fa-trash' aria-hidden='true' style='font-size:24px; color:red' ></a></i></td>");
                tr.append("<td><a href="+'/customer/'+id+'/restore'+"><i class='fa-solid fa-trash-can-arrow-up' aria-hidden='true' style='font-size:24px; color:green' ></a></i></td>");
                // tr.append($("<td>").html(data.creditlimit));
                // tr.append($("<td>").html(data.level));
                $("#ctable").prepend(tr);
            },
            error: function (error) {
                console.log(error);
            },
        });
    });
}); 

