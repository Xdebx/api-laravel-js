$(document).ready(function () {
    $('#itable').DataTable({
        ajax:{
            url:"/api/item",
            dataSrc: ""
        },
        dom:'Bfrtip',
        buttons:[
            'pdf',
            'excel',
            {
                text:'Add item',
                className: 'btn btn-primary',
                action: function(e, dt, node, config){
                    $("#iform").trigger("reset");
                    $('#itemModal').modal('show');
                }
            }
        ],
        columns:[
            {data: 'item_id'},
            {data: 'description'},
            {data: 'sell_price'},
            {data: 'cost_price'},
            {data: 'title'},
            {data: 'img_path'},
            {data: null,
                render: function (data, type, row) {
                    return "<a href='#' data-bs-toggle='modal' data-bs-target='#editItemModal' id='editbtn' data-id=" +
                        data.item_id + "><i class='fa-solid fa-pen' aria-hidden='true' style='font-size:24px' ></i></a>  <a href='#' class='deletebtn' data-id=" + data.item_id + "><i class='fa-regular fa-trash-can' style='font-size:24px; color:red'></a></i>";
                },
            },
        ]
    })//end datatables
    $("#itemSubmit").on("click", function (e) {
        e.preventDefault();
        var data = $("#iform").serialize();
        console.log(data);
        $.ajax({
            type: "post",
            url: "/api/item",
            data: data,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            dataType: "json",
            success: function (data) { 
                console.log(data);
                //$("myModal").modal("hide");
                $('#itemModal').each(function(){
                    window.location.reload();
                    $(this).modal('hide'); });
                //$.each(data, function(key, value){
                    //console.log(value);
                var tr = $("<tr>");
                tr.append($("<td>").html(data.item_id));
                tr.append($("<td>").html(data.description));
                tr.append($("<td>").html(data.cost_price));
                tr.append($("<td>").html(data.sell_price));
                tr.append($("<td>").html(data.title));
                tr.append($("<td>").html(data.img_path));
                tr.append("<td><a href='#' data-bs-toggle='modal' data-bs-target='#editItemModal' id='editbtnitem' data-id=" + id + "><i class='fa fa-pencil' aria-hidden='true' style='font-size:24px' ></a></i></td>"
                );

                tr.append("<td><a href='#'  class='deletebtn' data-id="+ id + "><i  class='fa-solid fa-trash-can' style='font-size:24px; color:red' ></a></i></td>");
                tr.append("<td><a href=" + "/customer/" + id + "/restore" + "><i class='fa fa-undo' aria-hidden='true' style='font-size:24px' ></a></i></td>" );
                $("#ibody").prepend(tr);
                
            },
            error: function (error) {
                console.log(error);
            },
            
        });
    });


    $('#editItemModal').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).attr('data-id');
        // console.log(id);
        $('<input>')
        .attr({
            type: 'hidden', 
            id:'itemid',
            name: 'item_id',
            value: id
        })
        .appendTo('#updateformItem');
        
        $.ajax({
            type: "GET",
            url: "api/item/" + id + "/edit",
            success: function(data){
                //    console.log(data);
                   $("#eedescription").val(data.description);
                   $("#eecost_price").val(data.cost_price);
                   $("#eesell_price").val(data.sell_price);
                   $("#eetitle").val(data.title);
                   $("#eeimagePath").val(data.img_path);

                },
                error: function(){
                    console.log('AJAX load did not work');
                    alert("error");
                }
            });
        });

        $('#editItemModal').on('hidden.bs.modal', function (e) {
            $("#updateformItem").trigger("reset");
            $("#itemid").remove();
    });
        
        $("#updatebtnItem").on('click', function(e) {
            var id = $('#itemid').val();
            var data = $("#updateformItem").serialize();
            console.log(data);
            $.ajax({
                type: "PUT",
                url: "api/item/"+ id,
                data: data,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                dataType: "json",
                success: function(data) {
                    console.log(data);

                    $("#editItemModal").css('backgroundColor','hsl(143, 100%, 50%)').each(function () {
                        $(this).modal("hide");
                        window.location.reload();
                    });
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });


    $("#ibody").on("click", ".deletebtn", function (e) {
        var id = $(this).data("id");
        var $tr = $(this).closest("tr");
        // var id = $(e.relatedTarget).attr('id');
        console.log(id);
        e.preventDefault();
        bootbox.confirm({
            message: "Do you want to delete this item",
            buttons: {
                confirm: {
                    label: "Yes",
                    className: "btn-success",
                },
                cancel: {
                    label: "No",
                    className: "btn-danger",
                },
            },
            callback: function (result) {
                if (result)
                    $.ajax({
                        type: "DELETE",
                        url: "/api/item/" + id,
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                            
                            $tr.find("td").css('backgroundColor','hsl(0,100%,50%').fadeOut(2000, function () {
                                $tr.remove();
                            });
                            
                            
                        },
                        error: function (error) {
                            console.log(error);
                        },
                    });
            },
        });
    });

}); //Document.ready end