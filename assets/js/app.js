/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../css/reset.css');
require('../css/app.css');
require('../css/fullcalendar.css');
require('fullcalendar');
require('bootstrap/dist/css/bootstrap.min.css');


// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
const $ = require('jquery');

import 'fullcalendar';
import 'moment';


console.log('Hello Webpack Encore! Edit me in assets/js/app.js');


var CheminComplet = document.location.href;
var CheminRepertoire  = CheminComplet.substring( 0 ,CheminComplet.lastIndexOf( "/" ) );


if (CheminRepertoire == 'http://127.0.0.1:8000/pro/dashboard'){



    // actuellement BOUCLE INFINI !
    // while ( typeof test != null) {

    var url = 'http://127.0.0.1:8000/indexpro/calendar/4';

    var request = new XMLHttpRequest();
    request.open('GET', url);
    request.responseType = 'json';


    request.send();

    var test;

    request.onload = function() {
        test = request.response;
    }



    console.log(test);

    // }

    $('#calendar').fullCalendar({

        firstDay: 1,
        formatDate: 'd/m/Y',
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month, agendaWeek, agendaDay'
        },
        height: 350,
        events: '/indexpro/calendar/4',
        timeFormat: 'H:mm',
        eventBackgroundColor: '#121959',
        eventTextColor: 'white'
    })
}


