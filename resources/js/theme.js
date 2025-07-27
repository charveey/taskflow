
let btn = document.getElementById('theme-toggle');
let innerToggle = document.getElementById('theme-inner-toggle');

if(localStorage.getItem('theme') === 'dark') {
    document.documentElement.classList.add('dark')
    innerToggle.style.left = 'calc(100% - 24px)';
} else {
    document.documentElement.classList.remove('dark')
    innerToggle.style.left = '4px';
}

btn.addEventListener('click', () => {
    localStorage.getItem('theme') === 'dark' ? localStorage.setItem('theme', 'light') : localStorage.setItem('theme', 'dark');
    document.documentElement.classList.toggle('dark');
    innerToggle.style.left = localStorage.getItem('theme') === 'dark' ?  'calc(100% - 24px)' : '4px';
})