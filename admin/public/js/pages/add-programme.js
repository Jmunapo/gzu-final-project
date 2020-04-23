$('#add_programme_submit').click(() => {

  const modal = $('#loader-modal');

  $(modal).modal('show');


  const route = $('#route').val();
  const fields = [
    'department_id',
    'graduate_level',
    'programme_name',
    'fees_new',
    'fees_returning',
    'conventional_duration',
    'block_duration',
    'normal_entry_requirements',
    'mature_entry_requirements',
    'special_entry_requirements',
    'notes'
  ]

  let postData = {
    '_token': $('meta[name=csrf-token]').attr('content')
  }

  requiredF = false;

  fields.forEach(field => {
    postData[field] = $(`#${field}`).data("val") || $(`#${field}`).val();
    if ((field === 'graduate_level' || field === 'programme_name' || field === 'fees_new' || field === 'fees_returning') && !postData[field]) {
      requiredF = true;
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

  postData['programme_name'] = postData['programme_name'].toUpperCase();

  $.post(route, postData)
    .done(() => {
      removeModal(modal);
      Swal.fire({
        toast: true,
        type: 'success',
        text: 'Programme added successfully',
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
        footer: '<a href="mailto:support@diamond.co.zw?Subject=Add programme error">Persist? Contact the Webmaster</a>'
      })
    });

  function clearInputs(fields) {
    fields.forEach(field => {
      $(`#${field}`).val('');
    });
    window.location.reload();
  }
})


