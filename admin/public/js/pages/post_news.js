//submit_post

$('#submit_post').click(() => {

  $('#submit_post').hide('fast');

  let route = $('#route').val();
  let author = $('#author').val();
  var content = $('#summernote').summernote('code');
  console.log(route);
  const fields = [
    'title',
  ]

  let postData = {
    '_token': $('meta[name=csrf-token]').attr('content'),
    content,
    author
  }

  console.log(postData, route, content);


  requiredF = false;

  fields.forEach(field => {
    postData[field] = $(`#${field}`).val();
    if (!postData[field]) {
      requiredF = true;
    }
  });

  if (requiredF || !content) {
    $('#error_text').html('Title and Content is required!');
    return;
  }
  $('#error_text').html('');

  $.post(route, postData)
    .done((d) => {
      console.log('done', d);
      $('#submit_post').show('slow');
      globalStopLoader('Post', true);
    })
    .fail(() => {
      console.error('Failed');
      $('#submit_post').show('slow');
      $('#error_text').html('Something went wrong please refresh and try again.');
      globalStopLoader('Post');
    })
});