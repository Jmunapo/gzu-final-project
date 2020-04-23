$('#add_new').click(() => {
  let modalTrgt = $('#add_new').data('modalTarget');
  $(`#${modalTrgt}`).modal('show');
  setTimeout(() => {
    $(".add-new-val").val('');
  }, 100)
})

$('#submit_school').click(() => {
  $('.mdl-close').toggleClass('mdl-spiner-active'); //top-right spinner
  $('.mdl-load').toggleClass('mdl-spiner-active'); //top-right spinner

  const route = $('#route').val();
  const fields = [
    'school_name',
    'date-2',
    'about_school',
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
  postData['start_date'] = postData['date-2'];

  if (requiredF) {
    $('#error_text').html('School Name is required!');
    stopLoader();
    return;
  }
  $('#error_text').html('');

  $.post(route, postData)
    .done(() => {
      console.log('done');
      stopLoader(true);
    })
    .fail(() => {
      console.error('Failed')
      $('#error_text').html('Something went wrong please try again.');
      stopLoader();
    })
})

function stopLoader(close = false) {
  if (close) {
    $('.mdl-load').toggleClass('mdl-spiner-active');
    $('.load-done').toggleClass('mdl-spiner-active');
    setTimeout(() => {
      $('.load-done').toggleClass('mdl-spiner-active');
      $('.mdl-close').toggleClass('mdl-spiner-active');
      let modalTrgt = $('#add_new').data('modalTarget');
      $(`#${modalTrgt}`).modal('hide');

      Swal.fire({
        toast: true,
        type: 'success',
        text: 'School added successfully',
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



$('#add_deprtmnt_submit').click(() => {

  const modal = $('#loader-modal');

  $(modal).modal('show');


  const route = $('#route_dep').val();
  const fields = [
    'department_name',
    'school_id',
    'start_date',
    'about_department',
  ]

  let postData = {
    '_token': $('meta[name=csrf-token]').attr('content')
  }


  requiredF = false;

  fields.forEach(field => {
    postData[field] = $(`#${field}`).data("val") || $(`#${field}`).val();
    if ((field === 'department_name' || field === 'school_id') && !postData[field]) {
      requiredF = true;
    }
  });
  console.log(postData, route);



  if (requiredF) {
    removeModal(modal)
    Swal.fire({
      type: 'error',
      text: 'Please fill in all required fields with (*)',
    })
    return;
  }

  $.post(route, postData)
    .done(() => {
      removeModal(modal)
      Swal.fire({
        toast: true,
        type: 'success',
        text: 'Department added successfully',
        showConfirmButton: false,
        timer: 2990
      })

      setTimeout(() => window.location.reload(), 3000);

    })
    .fail(() => {

      removeModal(modal);
      Swal.fire({
        type: 'error',
        title: 'Oops...',
        text: 'Something went wrong! Correct your form and make sure you are connected to the internet.',
        footer: '<a href="mailto:support@diamond.co.zw?Subject=Add programme error">Persist? Contact the Webmaster</a>'
      })
    })
})

