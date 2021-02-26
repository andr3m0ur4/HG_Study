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

const createDiv = divClass => {
    const div = $('<div>')
    div.addClass(divClass)
    return div
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

const noLogin = () => {
    createModal(
        'Usuário não logado!',
        'text-warning',
        'Você não está logado. Por favor faça login.'
    )

    $('#modal').on('hidden.bs.modal', () => {
        window.location.href = '/login'
    })
}

const createComment = (comment) => {
    let div = createDiv('comment-list')
    let div2 = createDiv('single-comment justify-content-between d-flex')
    let div3 = createDiv('user justify-content-between d-flex')
    let div4 = createDiv('thumb')
    let img = $('<img>')

    if (comment.picture) {
        img.attr({
            src: `/img/user/${comment.picture}`,
            alt: 'Foto de Perfil'
        })
    } else {
        img.attr({
            src: '/img/post.png',
            alt: 'Foto de Perfil'
        })
    }
    img.addClass('img-fluid')
    
    let div5 = createDiv('desc')
    let h5 = $('<h5>')
    let a = $('<a>')
    a.attr('href', `/single/${comment.id_user}`)
    a.text(`${comment.name} ${comment.last_name}`)
    
    let p = $('<p>')
    p.addClass('date')
    p.text(comment.date_create)
    let p2 = $('<p>')
    p2.addClass('comment')
    p2.text(comment.message)
    
    let div6 = createDiv('reply-btn')
    let a2 = $('<a>')
    a2.attr('href', '#')
    a2.addClass('btn-reply text-uppercase')
    a2.text('Responder')

    div.append(div2)
    div2.append(div3)
    div2.append(div6)
    div3.append(div4)
    div3.append(div5)
    div5.append(h5)
    div5.append(p)
    div5.append(p2)
    div4.append(img)
    div6.append(a2)
    h5.append(a)
    
    return div
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

    if (location.pathname.slice(0, 12) == '/blog-single') {
        blogSingle()
    }

    if (location.pathname == '/blog-single/blog-add') {
        blogAdd()
    }

    if (location.pathname.slice(0, 24) == '/blog-single/blog-update') {
        blogUpdate()
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
        createModal(
            'Atenção!',
            'text-warning',
            'Preencha todos os campos.'
        )
    }
}

const login = () => {
    if ($('#error').length > 0) {
        createModal(
            'Atenção!',
            'text-danger',
            'Usuário e/ou senha não existe.'
        )
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
        createModal(
            'Atenção!',
            'text-warning',
            'E-mail já existe. Por favor, tente outro.'
        )
    }

    if ($('#error_picture').length > 0) {
        createModal(
            'Atenção!',
            'text-warning',
            'Arquivo de imagem deve ser no formato PNG ou JPG.'
        )
    }

    $('#img-picture').change(readImage)
    $('#change-password').click(changePassword)
}

const blogAdd = () => {
    if ($('#error_picture').length > 0) {
        createModal(
            'Atenção!',
            'text-warning',
            'Arquivo de imagem deve ser no formato PNG ou JPG.'
        )
    }

    if ($('#success').length > 0) {
        createModal(
            'Sucesso!',
            'text-success',
            'A sua publicação foi publicada com sucesso.'
        )

        $('#modal').on('hidden.bs.modal', () => {
            window.location.href = '/blog-home'
        })
    }

    $('#img-picture').change(readImage)
}

const blogUpdate = () => {
    if ($('#error_picture').length > 0) {
        createModal(
            'Atenção!',
            'text-warning',
            'Arquivo de imagem deve ser no formato PNG ou JPG.'
        )
    }

    if ($('#success').length > 0) {
        createModal(
            'Sucesso!',
            'text-success',
            'A sua publicação foi atualizada com sucesso.'
        )

        $('#modal').on('hidden.bs.modal', () => {
            window.location.href = '/blog-single/' + parseInt(location.pathname.slice(25))
        })
    }

    $('#img-picture').change(readImage)
}

const blogSingle = () => {
    $('#comment').click(e => {
        let message = $(e.target).parent().prev().find('textarea').val()
        let post_id = $(e.target).parent().prev().find('textarea').data('post')
        let user_id = $(e.target).parent().prev().find('textarea').data('user')
        $(e.target).parent().prev().find('textarea').val('')

        if (message) {
            $.ajax({
                url: '/blog-single/comment-add',
                type: 'POST',
                data: {
                    message,
                    post_id,
                    user_id
                },
                dataType: 'json',
                success(data) {
                    if (data.login) {
                        noLogin()
                    } else if (data.success) {
                        $.ajax({
                            url: '/blog-single/get-comment',
                            type: 'GET',
                            dataType: 'json',
                            success(data) {
                                const comment = createComment(data)
                                $('.comment-sec-area .flex-column').append(comment)

                                const divScroll = comment.offset().top - 200
                                $('html, body').animate({
                                    scrollTop: divScroll
                                }, 500)
                            }
                        })
                    }
                }
            })
        }
    })
}