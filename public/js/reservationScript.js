document.addEventListener("change",

    function () {
        // input values
        let member = members.find(x => x.id === document.getElementById("ruiter").value);
        let horse = horses.find(x => x.id === document.getElementById("paard").value);
        let duration = document.getElementById("duration").value;

        // reservation info
        let infoMember = document.getElementById("info_member");
        let infoHorse = document.getElementById("info_horse");
        let infoNoJump = document.getElementById("info_no_jumpsport");
        let infoNotAvailable = document.getElementById("info_not_available");
        let infoStartTime = document.getElementById("info_start_time");
        let infoEndTime = document.getElementById("info_end_time");
        let infoPrice = document.getElementById("info_price");

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
            horseReservations.forEach(function (item) {
                datetime = new Date(item['start_time']);
                item['start_time'] = datetime;
                endtime = new Date(datetime.getTime() + item['duration'] * 60000);
                item['end_time'] = endtime;
            })
            console.log(horseReservations);

            let type = horse['type'];

            if (type == 'pony') infoNoJump.hidden = false;
        }

        // price and duration
        if (duration) {
            infoPrice.innerText = duration / 60 * 55;
        }


    }
);