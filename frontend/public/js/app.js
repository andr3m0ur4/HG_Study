//let host = 'http://10.0.0.104:8080'
let host = 'http://localhost:8080'

$(document).ready(() => {

    if (location.pathname == '/register') {
        register()
        showModal()
    }

})

// Pagina de cadastro
function register() {
    $('#form_register').submit(e => {
        

        let data = {}

        $('#form_register').serializeArray().map(x => {
            data[x.name] = x.value
        })

        if (validateRegister(data) && verifyEmail(data) == 0) {
            return true
        } else {
            e.preventDefault()
            console.log('erro')
        }
    })
}

function validateRegister(data) {
    let valid = true

    if (data.name.length < 3) {
        valid = false
    }

    if (data.last_name.length < 3) {
        valid = false
    }

    if (data.email.length < 3) {
        valid = false
    }

    if (data.password.length < 3) {
        valid = false
    }

    return valid
}

function verifyEmail(data) {
    let count

    $.ajax({

        url: host + '/api/v1/users/verifyemail',
        method: 'post',
        data: { email: data.email},
        dataType: 'json',
        async: false,
    
        success: response => {
            count =  response
        }
    })

    return count
}

function showModal() {
    if (location.search == '?success') {
        $('#modal').modal('show')
    }
}