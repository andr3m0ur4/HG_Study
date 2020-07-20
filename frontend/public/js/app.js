let host = 'http://10.0.0.104:8080'
//let host = 'http://10.0.0.104:8080'

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
            data[x.name] = x.value
        })

        console.log(verifyEmail(data))

        if (validateRegister(data) && verifyEmail(data) == 0) {
            console.log('scesso')
        } else {
            console.log('erro')
        }

        //console.log(validadeRegister(data))
        
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

/*
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
*/