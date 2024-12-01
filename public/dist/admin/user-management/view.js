var Index = (function () {
    var csrf_token = $('meta[name="csrf_token"]').attr("content");
    var table;
    var aSelected = [];
    const nameOfModule = "user-management";

    var handleDataTable = function () {
        table = $("#table-user-management").DataTable({
            responsive: true,
            // autoWidth: true,
            bAutoWidth: false,
            // pageLength: 15,
            dom: "Bftip",
            buttons: ["pageLength", "csv", "excel", "pdf", "print"],
            searching: true,
            paging: true,
            lengthMenu: [
                [25, 50, 100],
                [25, 50, 100],
            ],
            language: {
                info: "Show _START_ - _END_ from _TOTAL_ data",
                infoEmpty: "Show 0 - 0 from 0 data",
                infoFiltered: "",
                zeroRecords: "Data not found",
                loadingRecords: "Loading...",
                processing: "Processing...",
            },
            columnsDefs: [
                { searchable: false, target: [0, 1] },
                { orderable: false, target: 0 },
            ],
            processing: true,
            serverSide: true,
            ajax: {
                url: url + "/admin/user-management/list",
                type: "POST",
                data: {
                    _token: csrf_token,
                },
            },
            columns: [
                { data: "rnum", orderable: false },
                { data: "name", orderable: false },
                { data: "email", orderable: false },
                { data: "active", orderable: false },
                { data: "verified", orderable: false },
                { data: "group", orderable: false },
                { data: "google", orderable: false },
                { data: "registered", orderable: false },
            ],
            drawCallback: function (settings) {},
        });

        // btn refresh on click
        $("#btn-refresh").click(function (e) {
            e.preventDefault();
            table.ajax.reload();
        });
        //btn reload page
        $("#btn-reload").click(function (e) {
            e.preventDefault();
            window.location.reload();
        });
        handleActiveChanged();
    };

    //method handle form submit for save the data
    var handleFormSubmit = function () {
        $("#form-add-" + nameOfModule).submit(function (e) {
            e.preventDefault();
            const form = $(this);
            let formData = new FormData(form[0]);

            $.ajax({
                url: `${url}/admin/user-management/register`,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (responses) {
                    toastr.success(responses.message);
                    setTimeout(() => {
                        window.location.reload();
                    }, 2500);
                },
                error: function (response) {
                    $.each(response.responseJSON, function (key, value) {
                        toastr.error(value);
                    });
                },
            });
        });
    };

    var handleActiveChanged = function () {
        $(document).on("change", ".active-user", function () {
            if ($(this).is(":checked")) {
                const cbxVal = $(this).data("active");
                const activeVal = "1";

                $.ajax({
                    type: "POST",
                    url: `${url}/admin/user-management/user-active`,
                    data: {
                        _token: csrf_token,
                        cbxValue: cbxVal,
                        acValue: activeVal,
                    },
                    success: function (response) {
                        toastr.success(response.message);
                        setTimeout(() => {
                            table.ajax.reload();
                        }, 1500);
                    },
                });
            } else {
                const cbxVal = $(this).data("active");
                const activeVal = "0";
                $.ajax({
                    type: "POST",
                    url: `${url}/admin/user-management/user-active`,
                    data: {
                        _token: csrf_token,
                        cbxValue: cbxVal,
                        acValue: activeVal,
                    },
                    success: function (response) {
                        toastr.success(response.message);
                        setTimeout(() => {
                            table.ajax.reload();
                        }, 1500);
                    },
                });
            }
        });
    };

    return {
        init: function () {
            handleDataTable();
            handleFormSubmit();
        },
    };
})();

$(document).ready(function () {
    Index.init();
});
