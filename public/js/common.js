$("#gender").click(function () {
    if ($("#gender").val() == 1) {
        $("#rolesWoman").css("display", "none");
        $("#rolesMan").css("display", "block");

        $(".rolesWoman").css("display", "none");
        $(".rolesMan").css("display", "block");

        $(".rolesWoman").removeAttr("selected");
        $(".rolesMan").removeAttr("selected");
        $(".rolesMan").filter( ':first' ).attr("selected", "selected");

    }
    if ($("#gender").val() == 2) {
        $("#rolesWoman").css("display", "block");
        $("#rolesMan").css("display", "none");

        $(".rolesWoman").css("display", "block");
        $(".rolesMan").css("display", "none");

        $(".rolesWoman").removeAttr("selected");
        $(".rolesMan").removeAttr("selected");
        $(".rolesWoman").filter( ':first' ).attr("selected", "selected");
    }
    if ($("#gender").val() == 3) {
        $("#rolesWoman").css("display", "block");
        $("#rolesMan").css("display", "block");

        $(".rolesWoman").css("display", "block");
        $(".rolesMan").css("display", "block");
    }
});




$(".delete-button").click(function () {
    if (confirm("Удалить?")) {
        return true;       
    }
    else {
        return false;
    }
});
