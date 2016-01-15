(function ($) {
    "use strict";

    function getWindowWidth() {
        return $(window).width();
    }

    function getView() {
        return (ww <= 768) ? 'basicDay' : 'month';
    }

    //BEGIN END SIDEBAR LEFT EDIT OR REMOVE
    $('ul.sidebar-list-info li a i.icon-trash').on('click', function () {
        var $ok = window.confirm('Are you sure you want to delete ?');
        if ($ok == true) {
            $(this).parents('li').remove();
        }

    });

    $("ul.sidebar-list-info li a i.icon-note").on('click', function () {
        var $key_cut = $(this).parent().siblings('span.label').text(),
            $old_name = $(this).parents('a').text();
        if ($key_cut != "") {
            $old_name = $(this).parents('a').text().split($key_cut)[0];
        }
        var $old_list_emp = '<input type="text" value="' + $old_name + '" id="txt-new-list" maxlength="15" >';
        // alert($key_cut);
        $(this).parents('a').hide();
        $(this).parents('li').append($old_list_emp);

        $("#txt-new-list").select().blur(function () {
            if ($(this).val().length != 0) {
                var $new_name = '<i class="icon-check"></i>' + $(this).val() + '<span class="label label-primary">' + $key_cut + '</span>' +
                    '<div class="pull-right tab-tools">' +
                    '<i class="icon-note"></i>' +
                    '<i class="icon-trash"></i></div>';
                $(this).siblings('a').html($new_name).show();
                $(this).remove();
            } else alert("Name list not null!");
            //alert("sad");
        }).keyup(function (e) {
            if (e.keyCode == 13) {
                if ($(this).val().length != 0) {
                    var $new_name = '<i class="icon-check"></i>' + $(this).val() + '<span class="label label-primary">' + $key_cut + '</span>' +
                        '<div class="pull-right tab-tools">' +
                        '<i class="icon-note"></i>' +
                        '<i class="icon-trash"></i></div>';
                    $(this).siblings('a').html($new_name).show();
                    $(this).remove()
                } else alert("Name list not null!");
            }
        });
    });
    //BEGIN END SIDEBAR LEFT EDIT OR REMOVE

    /* initialize the external events
     -----------------------------------------------------------------*/

    var eventDrag = function (el) {
        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var $option;
        if ($(el).hasClass('btn-default')) {
            $option = 'btn-default';
        } else if ($(el).hasClass('btn-success')) {
            $option = 'btn-success';
        } else if ($(el).hasClass('btn-warning')) {
            $option = 'btn-warning';
        } else if ($(el).hasClass('btn-danger')) {
            $option = 'btn-danger';
        }
        var eventObject = {
            title: $.trim(el.text()), // use the element's text as the event title
            className: $option //add class corlor
        };

        // store the Event Object in the DOM element so we can get to it later
        el.data('eventObject', eventObject);

        // make the event draggable using jQuery UI
        el.draggable({
            zIndex: 999,
            revert: true,      // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
        });
    }

    $('#external-events div.external-event').each(function () {
        eventDrag($(this));
    });


    /* initialize the calendar
     -----------------------------------------------------------------*/

    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        defaultView: 'agendaWeek',
        allDaySlot: false,
        disableResizing: true,
        axisFormat: 'H(:mm)' + ':00',
        timeFormat: 'H:mm{ - H:mm}',
        columnFormat: 'dddd',
        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar !!!
        drop: function (date, allDay) { // this function is called when something is dropped

            // retrieve the dropped element's stored Event Object
            var originalEventObject = $(this).data('eventObject');

            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);
            // alert(copiedEventObject);
            // assign it the date that was reported
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;

            // render the event on the calendar
            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)

            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);


            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                $(this).remove();
                // alert("dsd");
            }

        },
        windowResize: function (view) {
            var ww = getWindowWidth();
            view = getView();
            var currentView = $('#calendar').fullCalendar('getView');
            if (view != currentView) {
                $('#calendar').fullCalendar('changeView', view);
            }
            if (ww <= 768) {
                $('.fc-header-right .fc-button').hide();
            } else {
                $('.fc-header-right .fc-button').show();
            }
        },
        selectable: true,
        selectHelper: true,
        select: function (start, end) {
            var title = prompt('Event Title:');
            var eventData;
            if (title) {
                eventData = {
                    title: title,
                    start: start,
                    end: end,
                    className: 'btn-default'
                };
                $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
            }
            $('#calendar').fullCalendar('unselect');
        },
        eventLimit: true, // allow "more" link when too many events
        events: [
            {
                title: 'Dr. Anthony \n Dr. Marry Josh',
                start: '2015-04-20T08:00:00',
                end: '2015-04-20T10:00:00',
                className: 'btn-primary',
                allDay: false
            },
            {
                title: 'Dr. Anthony \n Dr. Marry Josh',
                start: '2015-04-21T08:00:00',
                end: '2015-04-21T10:00:00',
                className: 'btn-primary',
                allDay: false
            },
            {
                title: 'Dr. Anthony \n Dr. Marry Josh',
                start: '2015-04-22T08:00:00',
                end: '2015-04-22T10:00:00',
                className: 'btn-primary',
                allDay: false
            },
            {
                title: 'Dr. Sarah Becka \n Dr. David Ranger',
                start: '2015-04-23T07:00:00',
                end: '2015-04-23T09:00:00',
                className: 'btn-primary',
                allDay: false
            },
            {
                title: 'Dr. Anthony',
                start: '2015-04-23T09:00:00',
                end: '2015-04-23T11:00:00',
                className: 'btn-primary',
                allDay: false
            },
            {
                title: 'Dr. Anthony \n Dr. Marry Josh',
                start: '2015-04-24T07:00:00',
                end: '2015-04-24T09:00:00',
                className: 'btn-primary',
                allDay: false
            },
            {
                title: 'Dr. Sarah Becka \n Dr. David Ranger',
                start: '2015-04-25T07:00:00',
                end: '2015-04-25T09:00:00',
                className: 'btn-primary',
                allDay: false
            },
            {
                title: 'Dr. Anthony \n Dr. Marry Josh',
                start: '2015-04-26T09:00:00',
                end: '2015-04-26T11:00:00',
                className: 'btn-primary',
                allDay: false
            },
            {
                title: 'Dr. Anthony \n Dr. Marry Josh',
                start: '2015-04-22T11:00:00',
                end: '2015-04-22T13:00:00',
                className: 'btn-primary',
                allDay: false
            },
            {
                title: 'Dr. Sarah Becka \n Dr. David Ranger',
                start: '2015-04-24T11:00:00',
                end: '2015-04-24T13:00:00',
                className: 'btn-primary',
                allDay: false
            },
            {
                title: 'Dr. Anthony \n Dr. Marry Josh',
                start: '2015-04-25T11:00:00',
                end: '2015-04-25T13:00:00',
                className: 'btn-primary',
                allDay: false
            },
            {
                title: 'Dr. Anthony',
                start: '2015-04-26T11:00:00',
                end: '2015-04-26T13:00:00',
                className: 'btn-primary',
                allDay: false
            },
            {
                title: 'Dr. Sarah Becka \n Dr. David Ranger',
                start: '2015-04-21T13:00:00',
                end: '2015-04-21T15:00:00',
                className: 'btn-primary',
                allDay: false
            },
            {
                title: 'Dr. Anthony',
                start: '2015-04-25T13:00:00',
                end: '2015-04-25T15:00:00',
                className: 'btn-primary',
                allDay: false
            },
            {
                title: 'Dr. Anthony \n Dr. Marry Josh',
                start: '2015-04-22T14:00:00',
                end: '2015-04-22T16:00:00',
                className: 'btn-primary',
                allDay: false
            },
            {
                title: 'Dr. Sarah Becka \n Dr. David Ranger',
                start: '2015-04-23T14:00:00',
                end: '2015-04-23T16:00:00',
                className: 'btn-primary',
                allDay: false
            },
            {
                title: 'Dr. Anthony \n Dr. Marry Josh',
                start: '2015-04-24T15:00:00',
                end: '2015-04-24T17:00:00',
                className: 'btn-primary',
                allDay: false
            },
            {
                title: 'Dr. Anthony \n Dr. Marry Josh',
                start: '2015-04-20T16:00:00',
                end: '2015-04-20T18:00:00',
                className: 'btn-primary',
                allDay: false
            },
            {
                title: 'Dr. David Ranger \n Dr. Nina Cruise',
                start: '2015-04-21T16:00:00',
                end: '2015-04-21T18:00:00',
                className: 'btn-primary',
                allDay: false
            },
            {
                title: 'Dr. Anthony',
                start: '2015-04-23T16:00:00',
                end: '2015-04-23T18:00:00',
                className: 'btn-primary',
                allDay: false
            },
            {
                title: 'Dr. Anthony',
                start: '2015-04-20T18:00:00',
                end: '2015-04-20T20:00:00',
                className: 'btn-primary',
                allDay: false
            },
            {
                title: 'Dr. Anthony \n Dr. Marry Josh',
                start: '2015-04-25T18:00:00',
                end: '2015-04-25T20:00:00',
                className: 'btn-primary',
                allDay: false
            }
        ],
        eventAfterRender: function (event, element, view) {
            var width = $(element).width();

            // Check which class the event has so you know whether it's half or quarter width
            if ($(element).hasClass("HalfClass"))
                width = width / 2;
            if ($(element).hasClass("QuarterClass"))
                width = width / 4;

            // Set the new width
            $(element).css('width', width + 'px');
        }
    });


    //BEGIN ADD CALENDARS
    $('#btn-add-calendar').on('click', function () {
        var $new_list_emp = '<input type="text" value="New Calendar" id="txt-new-list" maxlength="15" >';

        $('ul.sidebar-calendar').append($new_list_emp);
        $('#txt-new-list').select().blur(function () {
            if ($(this).val().length != 0) {
                var $new_list = ' <li>' +
                    '<a href="#tab-inbox" role="tab" class="btn-group dropup btn-block dropdown-toggle" data-hover="dropdown">' +
                    '<i class="icon-check"></i>' +
                    $(this).val() +
                    ' <span class="label label-primary"></span>' +
                    '<span class="pull-right tab-tools">' +
                    ' <i class="icon-note"></i>' +
                    '<i class="icon-trash"></i>' +
                    '</span> </a>' +
                    '<div id="external-events" class="dropdown-menu" role="menu">' +
                    ' <h4>Draggable Events' +
                    '<span class="pull-right"> <a href="#" id="btn-add-event" class="btn-xs"> <i class="icon-plus"></i>' +
                    '</a></span></h4><div class="external-event fc-event ui-draggable empty"></div>' +
                    '<p><input type="checkbox" id="drop-remove">' +
                    ' <label for="drop-remove"> Remove after drop</label></p></div></li>';
                $('ul.sidebar-calendar').append($new_list);

                $(this).remove();
                $('[data-hover="dropdown"]').dropdownHover();
            } else alert("Name list not null!");
        }).keyup(function (e) {
            if (e.keyCode == 13) {
                if ($(this).val().length != 0) {
                    var $new_list = ' <li>' +
                        '<a href="#tab-inbox" role="tab" class="btn-group dropup btn-block dropdown-toggle" data-hover="dropdown">' +
                        '<i class="icon-check"></i>' +
                        $(this).val() +
                        ' <span class="label label-primary"></span>' +
                        '<span class="pull-right tab-tools">' +
                        ' <i class="icon-note"></i>' +
                        '<i class="icon-trash"></i>' +
                        '</span> </a>' +
                        '<div id="external-events" class="dropdown-menu" role="menu">' +
                        ' <h4>Draggable Events' +
                        '<span class="pull-right"> <a href="#" id="btn-add-event" class="btn-xs"> <i class="icon-plus"></i>' +
                        '</a></span></h4><div class="external-event fc-event ui-draggable empty"></div>' +
                        '<p><input type="checkbox" id="drop-remove">' +
                        ' <label for="drop-remove"> Remove after drop</label></p></div></li>';
                    $('ul.sidebar-calendar').append($new_list);

                    $(this).remove();
                    $('[data-hover="dropdown"]').dropdownHover();

                } else alert("Name list not null!");
            }
        });
    });

    //BEGIN ADD CALENDARS

    //BEGIN DELETE EVENT
    $('#external-events .tab-tools i.icon-trash').on('click', function () {
        var $ok = window.confirm('Are you sure you want to delete ?');
        if ($ok == true) {
            $(this).parents('.external-event').remove();
        }

    });

    //BEGIN ADD EVENT
    $('.option-event .event').on('click', function () {
        $('.option-event .event').removeClass('active');
        $(this).addClass('active');
    });
    $('#txt-new').on('click', function () {
        $(this).select();
    });
    $('a#btn-add-event').on('click', function (e) {
        e.preventDefault();
        var $new_list_emp = '<div class="option-event"> <input type="text" value="New Event" id="txt-new" maxlength="15" >' +
            '  <span data-hover="tooltip"  class="event not-specified active" title="Not Specified"></span>   ' +
            ' <span data-hover="tooltip"  class="event low" title="Low"></span>   ' +
            ' <span data-hover="tooltip" class="event medium" title="Medium"></span>    ' +
            '<span data-hover="tooltip"  class="event high" title="High"></span></div>';
        var $me = $(this).parents('#external-events').find('.external-event:last');
        $($new_list_emp).insertAfter($me);
        $('#txt-new').select();
        $('.option-event').keyup(function (e) {
            if (e.keyCode == 13) {
                if ($('#txt-new').val().length != 0) {
                    var $option;
                    if ($('.event.active').hasClass('not-specified')) {
                        $option = 'btn-default';
                    } else if ($('.event.active').hasClass('low')) {
                        $option = 'btn-success';
                    } else if ($('.event.active').hasClass('medium')) {
                        $option = 'btn-warning';
                    } else if ($('.event.active').hasClass('high')) {
                        $option = 'btn-danger';
                    }
                    var $new_list = '<div class="external-event fc-event ' + $option + '">' + $('#txt-new').val() +
                        '<div class="pull-right tab-tools">' +
                        '<i class="icon-note"></i>' +
                        '<i class="icon-trash"></i>' +
                        '</div> </div>';
                    $($new_list).insertAfter($me);
                    $('#external-events div.external-event').each(function () {
                        eventDrag($(this));
                    });
                    edit_event();
                    $(this).remove();
                } else alert("Name not null!");
            }
        });
    });
    //END ADD EVENT

    //BEGIN EDIT EVENT
    var edit_event = function () {
        $('.external-event i.icon-note').on('click', function () {
            var $me = $(this).parents('.external-event'),
                $text = $me.text(),
                $index = $me.index(),
                $option;
            if ($me.hasClass('btn-success')) {
                $option = 'low'
            }
            else if ($me.hasClass('btn-default')) {
                $option = 'not-specified';
            }
            else if ($me.hasClass('btn-warning')) {
                $option = 'medium';
            }
            else if ($me.hasClass('btn-danger')) {
                $option = 'high';
            }

            var $edit_event = '<div class="option-event"> <input type="text" value="' + $text + '" id="txt-new" maxlength="15" >' +
                '  <span data-hover="tooltip"  class="event not-specified" title="Not Specified"></span>   ' +
                ' <span data-hover="tooltip"  class="event low" title="Low"></span>   ' +
                ' <span data-hover="tooltip" class="event medium" title="Medium"></span>    ' +
                '<span data-hover="tooltip"  class="event high" title="High"></span></div>';
            $me.hide();
            $($edit_event).insertAfter($me);
            $('#txt-new').select();
            $('span.event').removeClass('active').each(function () {
                if ($(this).hasClass($option)) {
                    $(this).addClass('active');
                }
            });
            $('.option-event').keyup(function (e) {
                if (e.keyCode == 13) {
                    if ($('#txt-new').val().length != 0) {
                        var $option;
                        if ($('.event.active').hasClass('not-specified')) {
                            $option = 'btn-default';
                        } else if ($('.event.active').hasClass('low')) {
                            $option = 'btn-success';
                        } else if ($('.event.active').hasClass('medium')) {
                            $option = 'btn-warning';
                        } else if ($('.event.active').hasClass('high')) {
                            $option = 'btn-danger';
                        }
                        var $new_list = '<div class="external-event fc-event ' + $option + '">' + $('#txt-new').val() +
                            '<div class="pull-right tab-tools">' +
                            '<i class="icon-note"></i>' +
                            '<i class="icon-trash"></i>' +
                            '</div> </div>';
                        $($new_list).insertAfter($me);
                        $me.remove();
                        $('#external-events div.external-event').each(function () {
                            eventDrag($(this));
                        });
                        $(this).remove();

                    } else alert("Name not null!");
                }
            });
        });
    }
    edit_event();
    //END EDIT EVENT


})(jQuery);


