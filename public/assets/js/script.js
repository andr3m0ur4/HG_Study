function readImage(e) {
    if (e.target.files && e.target.files[0]) {
        let file = new FileReader()

        file.onload = e => {
            $('#preview').attr('src', e.target.result)
        }

        file.readAsDataURL(e.target.files[0])
    }
}

function createElement(tagName, className = '') {
    const element = $(`<${tagName}>`)
    element.addClass(className)
    return element
}

class Modal {
    constructor() {
        this.modal = createElement('div', 'modal fade')
        $(this.modal).attr({
            id: 'modal',
            tabindex: -1,
            role: 'dialog',
            'aria-hidden': true
        })

        this.dialog = createElement('div', 'modal-dialog')
        $(this.dialog).attr('role', 'document')

        this.content = createElement('div', 'modal-content')
        this.header = createElement('div', 'modal-header')
        this.h4 = createElement('h4', 'modal-title')
        $(this.h4).attr('id', 'modal-title')

        this.buttonX = createElement('button', 'close')
        $(this.buttonX).attr({
            'data-dismiss': 'modal',
            'aria-label': 'Fechar'
        })
        this.span = createElement('span')
        $(this.span).attr('aria-hidden', true)
        $(this.span).html('&times;')

        this.body = createElement('div', 'modal-body')
        this.p = createElement('p', 'font-weight-bold modal-text')
        this.a = createElement('a', 'modal-link')
        $(this.a).attr('href', '#')

        this.footer = createElement('div', 'modal-footer')

        this.buttonClose = createElement('button', 'btn btn-secondary')
        $(this.buttonClose).attr({
            type: 'button',
            'data-dismiss': 'modal'
        })
        $(this.buttonClose).html('Fechar')
    }
    
    createModal() {
        $(this.modal).html('')
        $(this.modal).append(this.dialog)
        $(this.dialog).append(this.content)
        $(this.content).append(this.header, this.body, this.footer)
        $(this.header).append(this.h4, this.buttonX)
        $(this.buttonX).append(this.span)
        $(this.body).append(this.p, this.a)
        $(this.footer).append(this.buttonClose)
    }

    fillModal(data) {
        this.createModal()

        $(this.h4).html(data.title)
        $(this.h4).removeClass()
        $(this.h4).addClass(data.title_class)
        $(this.p).html(data.text)

        if (data.link_text === '' || data.link_href === '') {
            $(this.a).remove()
        } else {
            $(this.a).html(data.link_text)
            $(this.a).attr('href', data.link_href)
        }
    }

    showModal() {
        $(this.modal).modal('show')
    }
}

class Form {
    constructor(modal) {
        this.form = createElement('form')
        $(this.form).attr('id', 'formPassword')
        $(this.form).submit(modal, savePassword)
        $(this.form).append(new Field('password', 'Senha').div)
        $(this.form).append(new Field('new_password', 'Nova Senha').div)
        $(this.form).append(new Field('new_password2', 'Confirme a Senha').div)

        this.button = createElement('button', 'genric-btn primary radius')
        $(this.button).attr({
            type: 'submit',
            form: 'formPassword'
        })
        $(this.button).html('Salvar Senha')
    }
}

class Field {
    constructor(name, placeholder) {
        this.div = createElement('div', 'mt-10')

        this.input = createElement('input', 'single-input-primary')
        $(this.input).attr({
            type: 'password',
            name,
            placeholder,
            required: ''
        })

        $(this.div).append(this.input)
    }
}

class Comment {
    constructor(comment) {
        this.comment = createElement('div', 'comment-list')
        this.single = createElement('div', 'single-comment justify-content-between d-flex')
        this.user = createElement('div', 'user justify-content-between d-flex')
        this.thumb = createElement('div', 'thumb')
        this.img = createElement('img', 'img-fluid')

        if (comment.picture) {
            $(this.img).attr({
                src: `/img/user/${comment.picture}`,
                alt: 'Foto de Perfil'
            })
        } else {
            $(this.img).attr({
                src: '/img/post.png',
                alt: 'Foto de Perfil'
            })
        }

        this.desc = createElement('div', 'desc')
        this.h5 = createElement('h5')
        this.a = createElement('a')
        $(this.a).attr('href', `/single/${comment.id_user}`)
        $(this.a).text(`${comment.name} ${comment.last_name}`)
        this.date = createElement('p', 'date')
        $(this.date).text(comment.date_create)
        this.message = createElement('p', 'comment')
        $(this.message).text(comment.message)
        this.button = createElement('div', 'reply-btn')
        this.reply = createElement('a', 'btn-reply text-uppercase')
        $(this.reply).attr('href', '#')
        $(this.reply).text('Responder')

        $(this.comment).append(this.single)
        $(this.single).append(this.user, this.button)
        $(this.user).append(this.thumb, this.desc)
        $(this.desc).append(this.h5, this.date, this.message)
        $(this.thumb).append(this.img)
        $(this.button).append(this.reply)
        $(this.h5).append(this.a)
    }
}

function changePassword(e) {
    e.preventDefault()

    const modal = e.data
    const form = new Form(modal)

    modal.fillModal({
        title: 'Alterar Senha',
        title_class: 'text-info',
        text: '',
        link_text: '',
        link_href: ''
    })
    $(modal.body).html(form.form)
    $(modal.footer).prepend(form.button)
    modal.showModal()
}

function savePassword(e) {
    e.preventDefault()
    
    const form = e.target
    const data = new FormData(form)
    const modal = e.data
    
    $.ajax({
        url: '/single/update-password',
        type: 'POST',
        data,
        processData: false,
        contentType: false,
        success: data => {
            $('#modal').modal('hide')
            $(modal.body).html('')
            $(modal.footer).html('')

            setTimeout(() => {
                if (data == 1) {
                    passwordSuccess(modal)
                } else if (data == 2) {
                    passwordDifferent(modal)
                } else {
                    passwordError(modal)
                }
            }, 500)
        }
    })
}

function passwordSuccess(modal) {
    modal.fillModal({
        title: 'Sucesso!',
        title_class: 'text-success',
        text: 'Senha alterada com sucesso.',
        link_text: '',
        link_href: ''
    })
    modal.showModal()
}

function passwordError(modal) {
    modal.fillModal({
        title: 'Erro!',
        title_class: 'text-warning',
        text: 'A senha está errada, tente novamente.',
        link_text: '',
        link_href: ''
    })
    modal.showModal()
}

function passwordDifferent(modal) {
    modal.fillModal({
        title: 'Erro!',
        title_class: 'text-warning',
        text: 'As senhas não são iguais, tente novamente.',
        link_text: '',
        link_href: ''
    })
    modal.showModal()
}

function notLogged(modal) {
    modal.fillModal({
        title: 'Usuário não logado!',
        title_class: 'text-warning',
        text: 'Você não está logado. Por favor faça login.',
        link_text: '',
        link_href: ''
    })
    modal.showModal()

    $(modal.modal).on('hidden.bs.modal', () => {
        window.location.href = '/login'
    })
}

function getComment() {
    $.ajax({
        url: '/blog-single/get-comment',
        type: 'GET',
        dataType: 'json',
        success(data) {
            const comment = new Comment(data)
            $('.comment-sec-area .flex-column').append(comment.comment)

            const divScroll = $(comment.comment).offset().top - 200
            $('html, body').animate({
                scrollTop: divScroll
            }, 500)
        }
    })
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

function register() {
    const modal = new Modal()
    $('body').append(modal.modal)

    if ($('#success').length > 0) {
        if ($('#success').html() == 'true') {
            modal.fillModal({
                title: 'Parabéns!',
                title_class: 'text-success',
                text: 'Usuário foi cadastrado com sucesso.',
                link_text: 'Faça o login agora',
                link_href: '/login'
            })
            modal.showModal()
        } else {
            modal.fillModal({
                title: 'Atenção!',
                title_class: 'text-warning',
                text: 'Este e-mail já existe.',
                link_text: 'Faça o login agora',
                link_href: '/login'
            })
            modal.showModal()
        }
    }

    if ($('#error').length > 0) {
        modal.fillModal({
            title: 'Atenção!',
            title_class: 'text-warning',
            text: 'Preencha todos os campos.',
            link_text: '',
            link_href: ''
        })
        modal.showModal()
    }
}

function login() {
    const modal = new Modal()
    $('body').append(modal.modal)
    
    if ($('#error').length > 0) {
        modal.fillModal({
            title: 'Atenção!',
            title_class: 'text-danger',
            text: 'Usuário e/ou senha não existe.',
            link_text: '',
            link_href: ''
        })
        modal.showModal()
    }
}

function update() {
    const modal = new Modal()
    $('body').append(modal.modal)

    if ($('#success').length > 0) {
        modal.fillModal({
            title: 'Sucesso!',
            title_class: 'text-success',
            text: 'Dados do usuário atualizados com sucesso.',
            link_text: '',
            link_href: ''
        })
        modal.showModal()
    }

    if ($('#error').length > 0) {
        modal.fillModal({
            title: 'Atenção!',
            title_class: 'text-warning',
            text: 'E-mail já existe. Por favor, tente outro.',
            link_text: '',
            link_href: ''
        })
        modal.showModal()
    }

    if ($('#error_picture').length > 0) {
        modal.fillModal({
            title: 'Atenção!',
            title_class: 'text-warning',
            text: 'Arquivo de imagem deve ser no formato PNG ou JPG.',
            link_text: '',
            link_href: ''
        })
        modal.showModal()
    }

    $('#img-picture').change(readImage)
    $('#change-password').click(modal, changePassword)
}

function blogAdd() {
    const modal = new Modal()
    $('body').append(modal.modal)

    if ($('#error_picture').length > 0) {
        modal.fillModal({
            title: 'Atenção!',
            title_class: 'text-warning',
            text: 'Arquivo de imagem deve ser no formato PNG ou JPG.',
            link_text: '',
            link_href: ''
        })
        modal.showModal()
    }

    if ($('#success').length > 0) {
        modal.fillModal({
            title: 'Sucesso!',
            title_class: 'text-success',
            text: 'A sua publicação foi publicada com sucesso.',
            link_text: '',
            link_href: ''
        })
        modal.showModal()

        $(modal.modal).on('hidden.bs.modal', () => {
            window.location.href = '/blog-home'
        })
    }

    $('#img-picture').change(readImage)
}

function blogUpdate() {
    const modal = new Modal()
    $('body').append(modal.modal)

    if ($('#error_picture').length > 0) {
        modal.fillModal({
            title: 'Atenção!',
            title_class: 'text-warning',
            text: 'Arquivo de imagem deve ser no formato PNG ou JPG.',
            link_text: '',
            link_href: ''
        })
        modal.showModal()
    }

    if ($('#success').length > 0) {
        modal.fillModal({
            title: 'Sucesso!',
            title_class: 'text-success',
            text: 'A sua publicação foi atualizada com sucesso.',
            link_text: '',
            link_href: ''
        })
        modal.showModal()

        $(modal.modal).on('hidden.bs.modal', () => {
            window.location.href = '/blog-single/' + parseInt(location.pathname.slice(25))
        })
    }

    $('#img-picture').change(readImage)
}

function blogSingle() {
    const modal = new Modal()
    $('body').append(modal.modal)

    $('#comment').click(e => {
        const textarea = $(e.target).parent().prev().find('textarea')
        const message = $(textarea).val()
        const post_id = $(textarea).data('post')
        $(textarea).val('')

        if (message) {
            $.ajax({
                url: '/blog-single/comment-add',
                type: 'POST',
                data: {
                    message,
                    post_id
                },
                dataType: 'json',
                success(data) {
                    if (data.login) {
                        notLogged(modal)
                    } else if (data.success) {
                        getComment()
                    }
                }
            })
        }
    })
}