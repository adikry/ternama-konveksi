// popovers initialization - on hover
$('[data-toggle="popover-hover"]').popover({
    html: true,
    trigger: "hover",
    placement: "top",
    content: function () {
        return '<img src="' + $(this).data("img") + '" class="img-fluid"/>';
    },
});
