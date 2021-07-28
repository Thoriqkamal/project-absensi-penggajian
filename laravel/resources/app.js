$(document).ready(function () {
    $("#inputName").keyup(function () {
        var query = $(this).val();
        if (query != "") {
            var _token = $('input[name="_token"]').val();
            var option = "";
            $.ajax({
                url: "/autocomplete/fetch/nama",
                method: "POST",
                // data: $(this).serialize(),
                dataType: "json",
                data: { query: query, _token: _token },
                success: function (data) {
                    for (let i = 0; i < data.length; i++) {
                        option +=
                            '<button type="button" class="list-group-item-action list-group-item" data-id="' +
                            data[i].id +
                            '" data-value="' +
                            data[i].inputName +
                            '">' +
                            data[i].inputName +
                            "</button>";
                    }
                    $("#namaList").fadeIn();
                    $("#namaList").html(option);
                }
            });
        }
    });

    $("#namaList").delegate(".list-group-item", "click", function () {
            var id = $(this).attr("data-id");
            var value = $(this).attr("data-value");
            $(".nama").val(value);
            $(".nama-value").val(id);
            $("model").val();
            $(this)
                .parent()
                .fadeOut();
        });

    $(document).on("click", "li", function () {
        $("#inputName").val($(this).text());
        $("#namaList").fadeOut();
    });
});
