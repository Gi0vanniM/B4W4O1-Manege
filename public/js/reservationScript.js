document.addEventListener("change", updateForm);

function updateForm() {
    let member = members.find(x => x.id === document.getElementById("ruiter").value);
    let infoMember = document.getElementById("info_Member");

    let horse = horses.find(x=> x.id === document.getElementById("paard").value);
    let infoHorse = document.getElementById("info_Horse");

    console.log(members);

    infoMember.innerHTML = member['name'];
    infoHorse.innerHTML = horse['name'];
}