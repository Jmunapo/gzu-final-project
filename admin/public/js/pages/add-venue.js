var getDates = function (startDate, endDate) {
  var dates = [];

  var currDate = moment(moment(startDate).subtract(1, "d")).startOf('day');
  var lastDate = moment(moment(endDate).add(1, 'd')).startOf('day');

  while (currDate.add(1, 'days').diff(lastDate) < 0) {
    let date = currDate.clone().toDate();
    let day = moment(date).day();
    let check = (day !== 0 && day !== 6) ? true : false;
    if (check) {
      dates.push(moment(date).format("YYYY-MM-DD"));
    }

  }

  return dates;
};

$('#addVenue').click(() => {
  $(`#add-venue-modal`).modal('show');
});

$('#submit_venue').click(() => {
  $('.mdl-close').toggleClass('mdl-spiner-active'); //top-right spinner
  $('.mdl-load').toggleClass('mdl-spiner-active'); //top-right spinner

  let route = $('#venue_route').val();
  console.log(route);
  const fields = [
    'venue_name',
    'venue_key',
    'capacity',
  ]

  let postData = {
    '_token': $('meta[name=csrf-token]').attr('content')
  }

  console.log(postData, route);


  requiredF = false;

  fields.forEach(field => {
    postData[field] = $(`#${field}`).val();
    if (!postData[field]) {
      requiredF = true;
    }
    if (field === 'venue_key' && postData[field]) {
      postData[field] = postData[field].toUpperCase();
    }
  });

  if (requiredF) {
    $('#error_text').html('All fields are required!');
    globalStopLoader('Venue');
    return;
  }
  $('#error_text').html('');

  $.post(route, postData)
    .done(() => {
      console.log('done');
      globalStopLoader('Venue', true);
    })
    .fail(() => {
      console.error('Failed')
      $('#error_text').html('Something went wrong please try again.');
      globalStopLoader('Venue');
    })
});

$('#generateTTable').click(() => {
  $(`#generate-ttable-modal`).modal('show');
});

$('#generate_ttable').click(() => {
  $('.mdl-close').toggleClass('mdl-spiner-active'); //top-right spinner
  $('.mdl-load').toggleClass('mdl-spiner-active'); //top-right spinner

  let route = $('#timetable_route').val();
  console.log(route);
  const start_date = $('#start_date').val();
  const end_date = $('#end_date').val();

  let postData = {
    '_token': $('meta[name=csrf-token]').attr('content'),
    start_date,
    end_date
  }



  let requiredF = (!start_date || !end_date) ? true : false;

  if (requiredF) {
    $('#_error_text').html('All fields are required!');
    globalStopLoader('Venue');
    return;
  }


  if (moment().isAfter(start_date) || moment(start_date).isAfter(end_date)) {
    $('#_error_text').html('Correct your dates!');
    globalStopLoader('Venue');
    return;
  }

  let dateArray = getDates(start_date, end_date);
  console.log(dateArray);
  if (!dateArray.length || dateArray.length < 12 || dateArray.length > 15) {
    $('#_error_text').html(`Invalid date range! It should be at least 12 days not ${dateArray.length} day(s)`);
    globalStopLoader('Venue');
    return;
  }

  postData['dates'] = dateArray;



  console.log(postData, route, dateArray);

  $('#_error_text').html('');


  $.post(route, postData)
    .done(() => {
      console.log('done');
      globalStopLoader('Timetable was successfully generated', true);
    })
    .fail((msg) => {
      if (msg.responseJSON && msg.responseJSON === 'add_venue') {
        $(`#generate-ttable-modal`).modal('hide');
        Swal.fire({
          type: 'error',
          title: 'Please add a venue',
          text: 'Please add at lease 1 venue',
        })
        return;
      } else {
        $('#_error_text').html('Error something went wrong, make sure you are connected');
      }
      globalStopLoader('Timetable');
    })
});
