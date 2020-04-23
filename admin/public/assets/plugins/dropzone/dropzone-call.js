Dropzone.autoDiscover = false;

$(document).ready(function () {
    $("#id_dropzone").dropzone({
        maxFiles: 1,
        paramName: "course_csv",
        success: function (file, response) {
            console.log(file);
            console.log(response);
        }
    });
})