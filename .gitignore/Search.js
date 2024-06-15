
function filterProfiles() {
    let input = document.getElementById('searchString').value.toLowerCase();
    let profiles = document.querySelectorAll('.navCard');
    profiles.forEach(profile => {
        let description = profile.querySelector('.desc').innerText.toLowerCase();
        if (description.includes(input)) {
            profile.classList.remove('hide');
        } else {
            profile.classList.add('hide');
        }
    });
}
