$(document).ready(() => {
  $('.accept-applicant').click(function () {
    let uId = $(this).data('userId');

    GZU.applicantID = uId;

    const arr = ['_first', '_second', '_third'];

    arr.forEach((ar, i) => {
      const txt = $(`#${uId}${ar}`).text();
      $(`#label__${i}`).text(txt);
      $(`#option-${i}`).val(txt);
    });

    $('#accept-modal').modal('show');

  })



  $('#submit_accept').click(function () {
    const enrolled_in = $('input[name="options"]:checked').val();



    const route = $('#route').val();
    const intake = $(`#intake`).val()

    if (!intake) {
      return Swal.fire({
        type: 'error',
        text: 'Enter intake period',
      })
    }

    $('.mdl-close').toggleClass('mdl-spiner-active');
    $('.mdl-load').toggleClass('mdl-spiner-active');

    let body = {
      '_token': $('meta[name=csrf-token]').attr('content'),
      applicant_id: GZU.applicantID,
      enrolled_in,
      intake
    }

    return acceptStudent(body, route);

  })

  $('.reject_applicant').click(function () {
    let applicant_id = $(this).data('rejectId');

    const name = $(`#${applicant_id}_name`).text()


    const route = $('#reject_route').val();
    let body = {
      '_token': $('meta[name=csrf-token]').attr('content'),
      applicant_id
    }

    $.post(route, body)
      .done(() => {
        Swal.fire({
          toast: true,
          type: 'success',
          text: `${name} was successfully rejected`,
          showConfirmButton: false,
          timer: 2990
        });

        $('#applicant_total').text((Number($('#applicant_total').text()) - 1).toString());
        const table = $('#allStudents').DataTable();
        console.log(table);
        setTimeout(() => {
          table.row($(`#${applicant_id}_first`)).remove().draw();
        }, 50);


      })
      .fail((error) => {
        Swal.fire({
          type: 'error',
          title: 'Oops...',
          text: 'Something went wrong! Make sure you are connected to the internet.',
          footer: '<a href="mailto:support@diamond.co.zw?Subject=Add course error">Persist? Contact the Webmaster</a>'
        })
      })

  })
});

function acceptStudent(body, route) {

  $.post(route, body)
    .done(() => {
      Swal.fire({
        toast: true,
        type: 'success',
        text: 'New student added successfully',
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
    .fail((error) => {
      $('#loader-modal').css('display', 'none');
      Swal.fire({
        type: 'error',
        title: 'Oops...',
        text: 'Something went wrong! Correct your form and make sure you are connected to the internet.',
        footer: '<a href="mailto:support@diamond.co.zw?Subject=Add course error">Persist? Contact the Webmaster</a>'
      })
    });
}




