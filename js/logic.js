$(document).ready(function () {
    $(".tabs li").click(function () {
        // Remove the active class from all tabs
        $(".tabs li").removeClass("active");

        // Add the active class only to the clicked tab
        $(this).addClass("active");

        // Hide all tab contents and show the clicked tab's content
        $(".tab-content").hide();
        var activeTab = $(this).find("a").attr("href");
        $(activeTab).fadeIn();

        // Prevent the default link behavior
        return false;
    });

    // Show the first tab on page load
    $(".tabs li:first").click();
});
