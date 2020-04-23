function constructCourseList(courses) {
  if (typeof courses !== 'object' || !courses.length) {
    return null;
  }
  let li_html = '';
  courses.forEach(cors => {
    let str = JSON.stringify(cors);
    li_html += `
      <li class="clearfix">
        <p class="todo-title">
          ${cors.course_code}
        </p>
        <div class="todo-actionlist pull-right clearfix">
            <a href="${cors.id}" class="todo-remove" onclick='deleteCurriculumCourse(${str})'   data-toggle="tooltip" title="Delete"><i class="fa fa-times"></i></a>
        </div>
      </li>`
  })
  return li_html;
}


function levelChanged(level) {
  const modal = $('#loader-modal');
  $(modal).modal('show');

  const route = $('#level_courses_route').val();
  let curricular_id = $('#carriculum_id').val();

  let postData = {
    '_token': $('meta[name=csrf-token]').attr('content'),
    level,
    curricular_id
  }

  $.post(route, postData)
    .done((data) => {
      removeModal(modal);
      if (!data.length) {
        $('#level_courses').html(`No courses added for this level, click (+) to Add`);
        return;
      }
      let li_html = constructCourseList(data);
      $('#level_courses').html(li_html);
      $('#selected_level').html(level);
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

}

function addCourse(course) {
  if (typeof course !== 'object') {
    return false;
  }

  const modal = $('#loader-modal');
  $(modal).modal('show');

  const route = $('#store_curriculum_course').val();
  let curricular_id = $('#carriculum_id').val();
  let level = $('#level').val();

  let postData = {
    '_token': $('meta[name=csrf-token]').attr('content'),
    level,
    curricular_id,
    course_id: course.id
  }

  $.post(route, postData)
    .done((data) => {
      if (!data.length) {
        $('#level_courses').html(`No courses added for this level, click (+) to Add`);
        return;
      }
      removeModal(modal);
      let li_html = constructCourseList(data);
      $('#level_courses').html(li_html);
    })
    .fail(() => {
      removeModal(modal);
      Swal.fire({
        type: 'error',
        title: 'Oops...',
        text: 'Something went wrong! Make sure you are connected to the internet.',
        footer: '<a href="mailto:support@diamond.co.zw?Subject=Add programme error">Persist? Contact the Webmaster</a>'
      })
    });
}


function deleteCurriculumCourse(del) {
  console.log(del);
  const modal = $('#loader-modal');
  $(modal).modal('show');

  const route = $('#drop_course').val();

  let postData = {
    '_token': $('meta[name=csrf-token]').attr('content'),
    id: del.id
  }

  $.post(route, postData)
    .done(() => removeModal(modal))
    .fail(() => {
      removeModal(modal);
      Swal.fire({
        type: 'error',
        title: 'Oops...',
        text: 'Something went wrong! Make sure you are connected to the internet.',
        footer: '<a href="mailto:support@diamond.co.zw?Subject=Add programme error">Persist? Contact the Webmaster</a>'
      })
    });
}
