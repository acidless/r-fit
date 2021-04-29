const passwordInputGroups = jQuery(".password-input");

passwordInputGroups.each((i, group) => {
    const input = jQuery(group).find("input").first();
    const button = jQuery(group).find(".password-toggle")[0];
    const span = jQuery(button).find("span").first();

    button.addEventListener("click", () => {
        if (input.attr("type") === "password") {
            input.attr("type", "text");
            span.text("visibility_off");
        } else {
            input.attr("type", "password");
            span.text("visibility");
        }
    });
});
