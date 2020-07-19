let host = 'http://10.0.0.104:8080'

$(document).ready(() => {

    if (location.pathname == '/register') {
        register()
    }

})

// Pagina de cadastro
function register() {
    $('#form_register').submit(e => {
        e.preventDefault()

        let data = {}

        $('#form_register').serializeArray().map(x => {
            if (x.name == 'password') {
                data[x.name] = CryptoJS.MD5(x.value).toString()
            } else {
                data[x.name] = x.value
            }
        })

        $.ajax({

            url: host + '/api/v1/users/add',
            method: 'post',
            data: data,

            success: response => {
                console.log(response)
            }
        })
        
    })
}