// Link for plugin:      https://imask.js.org/
// Include with npm:  https://www.npmjs.com/package/imask
// Include with CDN:  <script src="https://unpkg.com/imask"></script>

// Init phone mask
const maskElement = document.querySelector('.phone__input')
const maskOptions = {
    mask: '+{38}(000)000-00-00',
}
const mask = IMask(maskElement, maskOptions)
