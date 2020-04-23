function convertArrayOfObjectsToCSV(args) {
  var result, ctr, keys, columnDelimiter, lineDelimiter, data;

  data = args.data || null;
  if (data == null || !data.length) {
    return null;
  }

  columnDelimiter = args.columnDelimiter || ',';
  lineDelimiter = args.lineDelimiter || '\n';

  keys = Object.keys(data[0]);

  result = '';
  result += keys.join(columnDelimiter);
  result += lineDelimiter;

  data.forEach(function (item) {
    ctr = 0;
    keys.forEach(function (key) {
      if (ctr > 0) result += columnDelimiter;

      result += item[key];
      ctr++;
    });
    result += lineDelimiter;
  });

  return result;
}

$(document).ready(() => {
  $("#upload_csv").dropzone({
    maxFiles: 10,
    paramName: "course_csv",
    acceptedFiles: '.csv,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    success: function (file, response) {
      Swal.fire({
        type: 'success',
        text: 'Courses imported successfully',
      })
    },
    error: function (response) {
      let msg = 'Error, try again';
      try {
        msg = JSON.parse(response.xhr.responseText).message;
      } catch (error) {
        console.log(error);
      }
      Swal.fire({
        type: 'error',
        text: msg,
      })
    }
  });

  $('#submit_course').click(() => {

    const route = $('#route').val();

    const modal = $('#loader-modal');

    $(modal).modal('show');

    const fields = [
      'department_id',
      'university_wide',
      'course_name',
      'course_code',
      'course_description',
    ]

    let postData = {
      '_token': $('meta[name=csrf-token]').attr('content')
    }

    requiredF = false;

    fields.forEach(field => {
      postData[field] = $(`#${field}`).data("val") || $(`#${field}`).val();
      if (!postData[field]) {
        requiredF = true;
      }

      if (field === 'university_wide' && postData[field]) {
        postData[field] = (postData[field] === 'no') ? 0 : 1;
      }
      if (field === "course_code") {
        postData[field] = postData[field].toUpperCase();
      }
    });

    if (requiredF) {
      removeModal(modal);
      Swal.fire({
        type: 'error',
        text: 'Please fill in all required fields with (*)',
      })
      return;
    }
    console.log(route, postData);

    $.post(route, postData)
      .done(() => {
        removeModal(modal);
        Swal.fire({
          toast: true,
          type: 'success',
          text: 'Course added successfully',
          showConfirmButton: false,
          timer: 2990
        })
        postData = {};
        setTimeout(() => clearInputs(fields), 3000);
      })
      .fail(() => {
        removeModal(modal);
        Swal.fire({
          type: 'error',
          title: 'Oops...',
          text: 'Something went wrong! Correct your form and make sure you are connected to the internet.',
          footer: '<a href="mailto:support@diamond.co.zw?Subject=Add course error">Persist? Contact the Webmaster</a>'
        })
      });

    function clearInputs(fields) {
      fields.forEach(field => {
        $(`#${field}`).val('');
      });
      window.location.reload();
    }

  })






























  /**
   * Create csv template
   */

  $('#csv_template').click(() => {

    var stockData = [
      {
        course_code: "[replace]",
        course_name: "[replace]",
        course_description: "[replace]"
      }
    ];


    var data, filename, link;

    var csv = convertArrayOfObjectsToCSV({
      data: stockData
    });
    if (csv == null) return;

    filename = 'template.csv';

    if (!csv.match(/^data:text\/csv/i)) {
      csv = 'data:text/csv;charset=utf-8,' + csv;
    }
    data = encodeURI(csv);
    link = document.createElement('a');
    link.setAttribute('href', data);
    link.setAttribute('download', filename);
    link.click();
  })

});




