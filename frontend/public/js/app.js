$(document).ready(() => {

    if (location.pathname == '/register') {
        register()
    }

})

// Pagina de cadastro
function register() {
    $('#btn_register').click(e => {
        e.preventDefault()

        console.log($('form'))
    })
}