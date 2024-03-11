class change_cover_image {
    constructor(url) {
        this.url_img_cover = url;
        this.push_url_tag_image();
    }

    push_url_tag_image() {
        document.querySelectorAll(".login-bg-fixed > .wrap-image-cover-pc  > #wrap-tag-image1")[0].innerHTML = `<img class="img-cover"
             src="${this.url_img_cover}"
             alt="image">`
        document.querySelectorAll(".login-bg-fixed > .wrap-panel-login > #wrap-tag-image2")[0].innerHTML = `<img class="img-cover"
             src="${this.url_img_cover}"
             alt="image">`
    }
}

function open_pass(t){
    t.classList.add('d-none')
    document.querySelectorAll(".fa-eye-slash")[0].classList.remove('d-none')
    document.querySelectorAll("#wrap-password > input")[0].setAttribute("type", 'text')
}
function close_pass(t){
    t.classList.add('d-none')
    document.querySelectorAll(".fa-eye")[0].classList.remove('d-none')
    document.querySelectorAll("#wrap-password > input")[0].setAttribute("type", 'password')
}


