$(() => {
    if (location.pathname == '/register') {
        register()
    }

    if (location.pathname == '/login') {
        login()
    }
})

const register = () => {
    if ($('#success').length > 0) {
        if ($('#success').html() == 'true') {
            $('.modal-title').html('Parabéns!')
            $('.modal-title').addClass('text-success')
            $('.modal-text').html('Usuário foi cadastrado com sucesso.')
            $('.modal-link').attr('href', '/login')
            $('.modal-link').html('Faça o login agora')
            $('#modal').modal('show')
        } else {
            $('.modal-title').html('Atenção!')
            $('.modal-title').addClass('text-warning')
            $('.modal-text').html('Este e-mail já existe.')
            $('.modal-link').attr('href', '/login')
            $('.modal-link').html('Faça o login agora')
            $('#modal').modal('show')
        }
    }

    if ($('#error').length > 0) {
            $('.modal-title').html('Atenção!')
            $('.modal-title').addClass('text-warning')
            $('.modal-text').html('Prencha todos os campos.')
            $('#modal').modal('show')
    }
}

const login = () => {
    if ($('#error').length > 0) {
        $('.modal-title').html('Atenção!')
        $('.modal-title').addClass('text-danger')
        $('.modal-text').html('Usuário e/ou senha não existe.')
        $('#modal').modal('show')
    }
}