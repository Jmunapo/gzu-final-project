$(document).ready(() => {

  $('#add_carricula').click(() => {
    $(`#add-carriculum-modal`).modal('show');
  });

  $('#submit_carricular').click(() => {
    const route = $('#cur_route').val();
    const fields = [
      'programme_id',
      'curricular_name',
      'effect_from',
    ]

    let postData = {
      '_token': $('meta[name=csrf-token]').attr('content')
    }

    requiredF = false;

    fields.forEach(field => {
      postData[field] = $(`#${field}`).val();
      if (field === 'school_name' && !postData[field]) {
        requiredF = true;
      }
    });

    fields.forEach(field => {
      postData[field] = $(`#${field}`).val();
      if ((field === 'curricular_name' || field === 'effect_from') && !postData[field]) {
        requiredF = true;
      }
    });

    if (requiredF) {
      $('#error_text').html('Curriculum mame & Effect date are required!');
      return;
    }
    $('#error_text').html('');


    $('.mdl-close').toggleClass('mdl-spiner-active'); //top-right spinner
    $('.mdl-load').toggleClass('mdl-spiner-active'); //top-right spinner

    $.post(route, postData)
      .done(() => {
        stopLoader(true);
      })
      .fail((e) => {
        stopLoader();
        if (e.responseJSON && e.responseJSON.message === 'Carriculum already added') {
          $('#error_text').html('Curricullum with the same effect date already added. Use assign courses');
          return;
        }
        $('#error_text').html('Something went wrong please try again.');

      })
  });

  function stopLoader(close = false) {
    if (close) {
      $('.mdl-load').toggleClass('mdl-spiner-active');
      $('.load-done').toggleClass('mdl-spiner-active');
      setTimeout(() => {
        $('.load-done').toggleClass('mdl-spiner-active');
        $('.mdl-close').toggleClass('mdl-spiner-active');
        $(`#add-carriculum-modal`).modal('hide');

        Swal.fire({
          toast: true,
          type: 'success',
          text: 'Carriculum added successfully',
          showConfirmButton: false,
          timer: 1990
        })
        postData = {};
        setTimeout(() => window.location.reload(), 2000);
      }, 1000)
    } else {
      $('.mdl-load').toggleClass('mdl-spiner-active');
    }
  }

});

function acceptStudent(body, route) {

  $.post(route, body)
    .done(() => {
      Swal.fire({
        toast: true,
        type: 'success',
        text: 'Programme added successfully',
        showConfirmButton: false,
        timer: 2990
      })

      $('#applicant_total').text((Number($('#applicant_total').text()) - 1).toString());

      $('.mdl-load').toggleClass('mdl-spiner-active');
      $('.load-done').toggleClass('mdl-spiner-active');
      setTimeout(() => {
        $('.load-done').toggleClass('mdl-spiner-active');
        $('.mdl-close').toggleClass('mdl-spiner-active');

        $(`#accept-modal`).modal('hide');
        let table = $('#allStudents').DataTable();
        table.row($(`#${GZU.applicantID}_first`)).remove().draw();
        delete GZU.applicantID;
      }, 1000)
    })
    .fail(() => {
      $('#loader-modal').css('display', 'none');
      Swal.fire({
        type: 'error',
        title: 'Oops...',
        text: 'Something went wrong! Correct your form and make sure you are connected to the internet.',
        footer: '<a href="mailto:support@diamond.co.zw?Subject=Add course error">Persist? Contact the Webmaster</a>'
      })
    });
}




