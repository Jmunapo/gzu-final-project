/**
 *  Document   : summernote-init.js
 *  Author     : redstar
 *  Description: script for set summernote properties
 *
 **/
$('#summernote').summernote({
  placeholder: '',
  tabsize: 2,
  height: 200,
  dialogsInBody: true,
  placeholder: 'write your post here...'
  // toolbar: [
  //   // [groupName, [list of button]]
  //   ['style', ['bold', 'italic', 'underline', 'clear']],
  //   ['font', ['strikethrough', 'superscript', 'subscript']],
  //   ['fontsize', ['fontsize']],
  //   ['color', ['color']],
  //   ['para', ['ul', 'ol', 'paragraph', 'style']],
  //   ['height', ['height']]
  // ]
});
$('#formsummernote').summernote({
  placeholder: '',
  tabsize: 2,
  height: 350
});