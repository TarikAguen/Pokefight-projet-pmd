const loader = document.querySelector('.loader')
window.addEventListener('load', () => {
    function animate() {
        loader.classList.add('fondu-out');

    }
    window.setTimeout(animate, 5000)
})