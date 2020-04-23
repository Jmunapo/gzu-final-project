function removeModal(modal) {
  $(modal).removeClass("in");
  $(".modal-backdrop").remove();
  $('body').removeClass('modal-open');
  $('body').css('padding-right', '');
  $(modal).hide();
}

/**
 * Stopping modal loader
 */
function globalStopLoader(name, close = false, reload = true) {
  if (close) {
    $('.mdl-load').toggleClass('mdl-spiner-active');
    $('.load-done').toggleClass('mdl-spiner-active');
    setTimeout(() => {
      $('.load-done').toggleClass('mdl-spiner-active');
      $('.mdl-close').toggleClass('mdl-spiner-active');
      let modalTrgt = $('#add_new').data('modalTarget');
      $(`#${modalTrgt}`).modal('hide');

      let text = (name.length > 9) ? name : `${name} added successfully`;

      Swal.fire({
        toast: true,
        type: 'success',
        text,
        showConfirmButton: false,
        timer: 1990
      })
      postData = {};
      if (reload) {
        setTimeout(() => window.location.reload(), 2000);
      }
    }, 1000)
  } else {
    $('.mdl-load').toggleClass('mdl-spiner-active');
  }
}

$('#add_department_from_prog').click(() => {
  setTimeout(() => {
    $(".add-new-val").val('');
  }, 100)
  const route = $('#add_department_from_prog').data("val");
  window.location.href = route;
})

$(() => {


  $('.modal').on('hidden.bs.modal', (e) => {
    $('.modal')
      .find("input,textarea,select")
      .end()
      .find("input[type=checkbox], input[type=radio]")
      .prop("checked", "")
      .end();//.val('')
  })


  $('#loader-modal').on('shown.bs.modal', function (e) {
    setTimeout(() => {
      console.log('Loader modal')
      try {
        $('#loader-modal').modal('hide');
      } catch (error) {
      }
    }, 5500)
  });

  $('#allStudents').DataTable();
});