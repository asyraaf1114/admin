let sections = document.querySelectorAll('section');
let navlinks = document.querySelectorAll('div ul li a');

window.onscroll = () => {
    sections.forEach(sec => {
        let top = window.scrollY + (50/100)*window.innerHeight;
        let offset = sec.offsetTop;
        let height = sec.offsetHeight;
        let id = sec.getAttribute('id');

        if (top >= offset && top < offset + height) {
            navlinks.forEach(links => {
                links.classList.remove('active');
                document.querySelector('div ul li a[href*=' + id + ']').classList.add('active');
            });
        }
    });
}

$('#data-table-basic').DataTable();