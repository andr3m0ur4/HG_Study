const readImage = (e) => {
    if (e.target.files && e.target.files[0]) {
        let file = new FileReader()

        file.onload = e => {
            $('#preview').attr('src', e.target.result)
        }

        file.readAsDataURL(e.target.files[0])
    }
}

const createModal = (title, title_class, text, link_href = '', link_text = '') => {
    $('.modal-title').html(title)
    $('.modal-title').addClass(title_class)
    $('.modal-body').html('')

    if ($('.modal-text').length > 0) {
        $('.modal-text').html(text)
    } else {
        const modal_text = $('<div>')
        modal_text.addClass('modal-text')
        modal_text.html(text)
        $('.modal-body').append(modal_text)
    }

    if ($('.modal-link').length > 0) {
        $('.modal-link').attr('href', link_href)
        $('.modal-link').html(link_text)
    } else {
        const modal_link = $('<div>')
        modal_link.addClass('modal-link')
        modal_link.attr('href', link_href)
        modal_link.html(link_text)
        $('.modal-body').append(modal_link)
    }

    $('#btn-confirm').addClass('d-none')
    $('#modal').modal('show')
}

const createField = (name, placeholder) => {
    const input = $('<input>')
    input.attr({
        type: 'password',
        name,
        placeholder,
        required: ''
    })
    input.addClass('single-input-primary')

    const div = $('<div>')
    div.addClass('mt-10')
    div.append(input)

    return div
}

const createForm = () => {
    const form = $('<form>')

    let field = createField('password', 'Senha')
    form.append(field)

    field = createField('new_password', 'Nova Senha')
    form.append(field)

    field = createField('new_password2', 'Confirme a Senha')
    form.append(field)
    
    return form
}

const changePassword = e => {
    e.preventDefault()

    const form = createForm()
    $('.modal-title').html('Alterar Senha')
    $('.modal-title').addClass('text-info')
    $('.modal-title').removeClass('text-warning')
    $('.modal-body').html(form)

    $('#btn-confirm').removeClass('d-none')
    $('#btn-confirm').html('Salvar Senha')
    $('#btn-confirm').on('click', savePassword)
    $('#modal').modal('show')
}

const savePassword = () => {
    const form = $('.modal-body').find('form')
    let password = form.find('input[name=password]').val()
    let new_password = form.find('input[name=new_password]').val()
    let new_password2 = form.find('input[name=new_password2]').val()

    $.ajax({
        url: '/single/update-password',
        type: 'POST',
        data: {
            password,
            new_password,
            new_password2
        },
        success: data => {
            $('#modal').modal('hide')
            $('#btn-confirm').off('click')

            setTimeout(() => {
                if (data == 1) {
                    passwordSuccess()
                } else if (data == 2) {
                    passwordDifferent()
                } else {
                    passwordError()
                }
            }, 500)
        }
    })
}

const passwordSuccess = () => {
    createModal(
        'Sucesso!',
        'text-success',
        'Senha alterada com sucesso.'
    )
}

const passwordError = () => {
    createModal(
        'Erro!',
        'text-warning',
        'A senha está errada, tente novamente.'
    )
}

const passwordDifferent = () => {
    createModal(
        'Erro!',
        'text-warning',
        'As senhas não são iguais, tente novamente.'
    )
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
            createModal(
                'Parabéns!',
                'text-success',
                'Usuário foi cadastrado com sucesso.',
                '/login',
                'Faça o login agora'
            )
        } else {
            createModal(
                'Atenção!',
                'text-warning',
                'Este e-mail já existe.',
                '/login',
                'Faça o login agora'
            )
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
        createModal(
            'Sucesso!',
            'text-success',
            'Dados do usuário atualizados com sucesso.'
        )
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

    $('#img-picture').change(readImage)
    $('#change-password').click(changePassword)
}