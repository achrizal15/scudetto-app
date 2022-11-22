const Select2Handler = () => {
    if ($(".select2").length == 0) return false;
    $(".select2").select2({

    })
}
const DatatableHandler = () => {
    if ($(".datatable").length == 0) return false;
    const addUrl = $(".datatable").data("url")
    const datatable = $(".datatable").DataTable({
        lengthChange: false,
        ordering: false,
        dom: "<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        buttons: [
            {
                text: "<i class='bx bx-plus'></i> Add New Record",
                className: "btn btn-primary",
                action: function (e, dt, node, config) {
                    window.location.href = addUrl
                },
                init: function (api, node, config) {
                    $(node).removeClass('dt-button')
                }
            }
        ]
    })

    if ($(".datatable").data("access") == "RO") {
        datatable.button().remove()
    }
    $(document).on("keyup", "#filter-search", function () {
        datatable.search($(this).val()).draw()
    })
    datatable.search()
}
const FormFilters = () => {
    if ($("#form-filters").length == 0) return false;
    if ($("#value-from-search").val()) $("#filter-search").val($("#value-from-search").val());
    $(document).on("keyup", "#filter-search", function () {
        $("#value-from-search").val($(this).val())
    })
}
const AccessControl = () => {
    if ($("#form-access-control").length != 0) {
        const setValueLandingPage = () => {
            const activeMenu = $("select.menu");
            $("#landing_page").html('<option value="Select one" disabled>Select one</option>')
            if (activeMenu.filter((e) => {
                return $(activeMenu).eq(e).val() != "NA"
            }).length == 0) {
                $("#landing_page").html('<option value="" >Select access menu first</option>')
            }
            for (let i = 0; i < activeMenu.length; i++) {
                const element = $(activeMenu[i]);
                if (element.val() == "NA") continue;
                const menu = menus.filter((e) => {
                    return e.id == element.attr("id")
                })[0]
                $("#landing_page").append(`<option value="${menu.link}">${menu.name}</option>`)
            }

        }

        $(document).on("change", "input#rw-all", function () {
            $('.' + $(this).val()).val("RW").trigger('change');
            setValueLandingPage()
        })
        $(document).on("change", "select.menu", function () {
            setValueLandingPage()
        })
        $(document).on("change", "input#ro-all", function () {
            $('.' + $(this).val()).val("RO").trigger('change');
            setValueLandingPage()
        })
        $(document).on("change", "input#na-all", function () {
            $('.' + $(this).val()).val("NA").trigger('change');
            setValueLandingPage()
        })
        $(document).on("change", "input#check-akun-group", function () {
            $("input.akun-" + $(this).val()).prop('checked', $(this).prop("checked"));
        })

    }
    $(document).on("click", "#view-access-menu", function () {
        const roleAccess = $(this).data("role")
        $("#modalAccessMenuTitle").text(roleAccess.name)
        $("#modalAccessMenu .modal-body tbody").html("");
        roleAccess.menus.forEach(element => {
            $("#modalAccessMenu .modal-body tbody").append(`
            <tr><td>${element.name}</td><td>${element.link}</td><td>${element.pivot.type}</td></tr>
            `);
        });
    })
}
const InitialDateTimePicker = () => {
    // if( $(".datetimepicker").length==0)
    $(".datetimepicker").each(function (i) {
        new DateTime($(this), {
            format: 'D MMM YYYY HH:mm'
        })
    })
}
const countDownTimer = () => {
    const countdown = $("#countdown");
    if ($("#countdown").length <= 0) return false;
    const time = countdown.data("time");
    countdown.countdown(time, function (param) {
        $(this).html(param.strftime("%H jam %M menit %S detik"));    
        if(param.offset.seconds==0)location.href="/transaksi/add";
    });
};
$(document).ready(function () {
    countDownTimer()
    InitialDateTimePicker()
    FormFilters()
    AccessControl()
    DatatableHandler()
    Select2Handler()
    $(document).on("change", "#tanggal_pesan_lapangan", function () {
        const value = new Date($(this).val())
        const dateValue = `${value.getDate()}/${value.getMonth()}/${value.getFullYear()}`
        const date = new Date()
        const dateNow = `${date.getDate()}/${date.getMonth()}/${date.getFullYear()}`
        $("#waktu_awal").html("<option  selected>Waktu Awal</option>")
        $("#waktu_akhir").html("<option  selected>Waktu Akhir</option>")
        if (dateValue == dateNow) {
            for (let index = date.getHours()+1; index <= 23; index++) {
                $("#waktu_awal").append(`<option value="${index}:00">${index}:00</option>`)
            }
            for (let index = date.getHours()+2; index <= 23; index++) {
                $("#waktu_akhir").append(`<option value="${index}:00">${index}:00</option>`)
            }
         }else if(dateValue >= dateNow){
            for (let index = 8; index <= 23; index++) {
                        $("#waktu_awal").append(`<option value="${index}:00">${index}:00</option>`)
                    }
                    for (let index = 9; index <= 23; index++) {
                        $("#waktu_akhir").append(`<option value="${index}:00">${index}:00</option>`)
                    }
         }
    })
})


