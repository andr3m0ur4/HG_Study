const readImage = (e) => {
    if (e.target.files && e.target.files[0]) {
        let file = new FileReader()

        file.onload = e => {
            $('#preview').attr('src', e.target.result)
        }

        file.readAsDataURL(e.target.files[0])
    }
}

$(() => {
    if (location.pathname == '/register') {
        register()
    }

    if (location.pathname == '/login') {
        login()
    }

    if (location.pathname == '/single/update') {
        update()
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

const update = () => {
    if ($('#success').length > 0) {
        $('.modal-title').html('Sucesso!')
        $('.modal-title').addClass('text-success')
        $('.modal-text').html('Dados do usuário atualizados com sucesso.')
        $('#modal').modal('show')
    }

    if ($('#error').length > 0) {
        $('.modal-title').html('Atenção!')
        $('.modal-title').addClass('text-warning')
        $('.modal-text').html('E-mail já existe. Por favor, tente outro.')
        $('#modal').modal('show')
    }

    if ($('#error_picture').length > 0) {
        $('.modal-title').html('Atenção!')
        $('.modal-title').addClass('text-warning')
        $('.modal-text').html('Arquivo de imagem deve ser no formato PNG ou JPG.')
        $('#modal').modal('show')
    }

    $('#imgPicture').change(readImage)
}