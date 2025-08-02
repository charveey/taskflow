
let btn = document.getElementById('nav-toggle');
let nav = document.querySelector('nav');

if(localStorage.getItem('expandNav') === 'true') {
    document.getElementById('navigation-links').classList.add('collapsed')
    nav.style.width = '60px';
} else {
    document.getElementById('navigation-links').classList.remove('collapsed')
    nav.style.width = '256px';
}

if(window.innerWidth < 640) {
    document.getElementById('navigation-links').classList.add('collapsed');
    nav.style.width = '60px';
}

btn.addEventListener('click', () => {
    if(localStorage.getItem('expandNav') === 'true') {
        localStorage.setItem('expandNav', 'false') 
        nav.style.width = '256px';
    } else {
        localStorage.setItem('expandNav', 'true');
        nav.style.width = '60px';
    } 
    document.getElementById('navigation-links').classList.toggle('collapsed');
})