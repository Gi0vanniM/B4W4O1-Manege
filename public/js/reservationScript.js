// Some elements
let submitButton = document.getElementById("submitButton");
// reservation info
let infoMember = document.getElementById("info_member");
let infoHorse = document.getElementById("info_horse");
let infoNoJump = document.getElementById("info_no_jumpsport");
let infoStartTime = document.getElementById("info_start_time");
let infoEndTime = document.getElementById("info_end_time");
let infoDate = document.getElementById("info_date");
let infoNotAvailable = document.getElementById("info_not_available");
let infoNotStartTime = document.getElementById("info_not_start_time");
let infoNotEndTime = document.getElementById("info_not_end_time");
let infoPrice = document.getElementById("info_price");
// modal elements
let modalText = document.getElementById("modal_text");
let modalHorse = document.getElementById("modal_horse");
let modalButton = document.getElementById("modal_button");

update();

document.addEventListener("change", update);

function update() {

    // input values
    let member = members.find(x => x.id === document.getElementById("ruiter").value);
    let horse = horses.find(x => x.id === document.getElementById("paard").value);
    let dateTime = new Date(document.getElementById("date").value + "T" + document.getElementById("time").value);
    let duration = document.getElementById("duration").value;
    let endTime = new Date(dateTime.getTime() + duration * 60000);

    let resText = "";

    let validTime = false;

    // member stuff
    if (member) {
        infoMember.innerHTML = member['name'] || '-';
    }

    // do horse related stuff
    if (horse) {
        infoHorse.innerHTML = horse['name'] || '-';

        // Calculate the ending time of the reservations so that we can later use it to see
        // if the reservation we are making currently does not override another reservation
        // this will also be redone in the model before it gets stored in the database.
        let horseReservations = reservations.filter(x => x.horse_id === horse['id']);
        // check if the filter found reservations
        if (horseReservations.length) {
            // let infoNotAvailableLoop = 0;
            // let validTimeLoop = 0;
            horseReservations.forEach(function (item) {
                // get the starting and ending times
                let rDateTime = new Date(item['start_time']);
                // item['start_time'] = rDateTime;
                let rEndTime = new Date(rDateTime.getTime() + item['duration'] * 60000);
                // item['end_time'] = rEndTime;

                // check if times overlap if not validTime will be true otherwise it will display a message
                if (!isNaN(dateTime)) {
                    if (endTime <= rDateTime || dateTime >= rEndTime) {
                        infoNotAvailable.hidden = true;
                        // submitButton.disabled = false;
                        validTime = true;
                    } else {
                        validTime = false;
                        infoNotAvailable.hidden = false;
                        submitButton.disabled = true;
                        infoNotStartTime.innerText = stringDateTime(rDateTime);
                        infoNotEndTime.innerText = stringDateTime(rEndTime);
                    }
                }
                // print horse reservations
                if (rDateTime >= Date.now() || rEndTime >= Date.now()) {
                    resText += `${stringDateTime(rDateTime)} tot ${stringTime(rEndTime)} \n`;
                }

            })

            // if the filter found no reservations this else statement will run
        } else {
            validTime = true;
            infoNotAvailable.hidden = true;
        }


        // modal
        modalButton.disabled = false;
        modalHorse.innerText = horse['name'];
        modalText.innerText = resText;

        // type
        let type = horse['type'];

        if (type == 'pony') {
            infoNoJump.hidden = false;
        } else {
            infoNoJump.hidden = true;
        }
    } else {
        modalButton.disabled = true;
    }

    // price and duration
    if (duration) {
        infoPrice.innerText = duration / 60 * 55;
    }

    if (!isNaN(dateTime)) {
        infoStartTime.innerText = stringTime(dateTime);
        infoEndTime.innerText = stringTime(endTime);
        infoDate.innerText = stringDate(dateTime);
    }

    if (validTime && member && horse && duration) {
        submitButton.disabled = false;
    } else {
        submitButton.disabled = true;
    }


}


function addZero(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}

function stringTime(time) {
    return addZero(time.getHours()) + ":"
        + addZero(time.getMinutes());
}

function stringDate(date) {
    return addZero(date.getDate()) + "-"
        + addZero(date.getMonth() + 1) + "-"
        + addZero(date.getFullYear());
}

function stringDateTime(dateTime) {
    return addZero(dateTime.getDate()) + "-"
        + addZero(dateTime.getMonth() + 1) + "-"
        + addZero(dateTime.getFullYear()) + " "
        + addZero(dateTime.getHours()) + ":" + addZero(dateTime.getMinutes());
}