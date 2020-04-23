function format(state) {
    if (!state.id) return state.text;
    return state.text;
}

var placeholder = "Select Module";

$("#selitemIcon").select2({
    theme: "bootstrap",
    templateResult: format,
    formatSelection: format,
    escapeMarkup: function (m) {
        return m;
    }
});



