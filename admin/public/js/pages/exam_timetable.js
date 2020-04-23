/**
 *  Document   : exam_timetable.js
 *  Author     : Joemags
 *  Description: Add exam timetable script
 *
 **/
var AppCalendar = function () {
  return {
    init: function () {
      this.initCalendar()
    },
    initCalendar: function () {
      if (jQuery().fullCalendar) {

        var r = {
          left: "prev,next,today",
          center: "title",
          right: "month,agendaWeek"
        };

        let events = [];

        venue_ttable.forEach(vnu => {
          events.push({
            title: vnu.course_code,
            start: new Date(vnu.exam_date),
            end: new Date(new Date(vnu.exam_date).getTime() + 1000 * 60 * 60 * 3),
            backgroundColor: "#009900"
          })
        });

        $("#calendar").fullCalendar("destroy");
        $("#calendar").fullCalendar({
          header: r,
          defaultView: "month",
          slotMinutes: 15,
          editable: !0,
          droppable: !0,
          events,
        })
      }
    }
  }
}();
jQuery(document).ready(function () {
  'use strict';
  AppCalendar.init()
});

