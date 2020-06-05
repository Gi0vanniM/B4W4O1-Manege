document.addEventListener("change", updateForm);

function updateForm() {
    let member = members.find(x => x.id === document.getElementById("ruiter").value);
    let infoMember = document.getElementById("info_Member");
    let memberName = (member != null) ? member['name'] : "";

    let horse = horses.find(x=> x.id === document.getElementById("paard").value);
    let infoHorse = document.getElementById("info_Horse");

    let type = horse['type'];
    let no_jump = document.getElementById("no_jumpsport");

    let not_available = document.getElementById("not_available");

    console.log(members);

    infoMember.innerHTML = memberName;
    infoHorse.innerHTML = horse['name'];

    if (type == 'pony') no_jump.hidden = false;

}