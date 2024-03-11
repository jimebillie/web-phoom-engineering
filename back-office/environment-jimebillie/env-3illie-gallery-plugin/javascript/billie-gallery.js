class billie_gallery {
    constructor() {
        this.subImage = ``
            , this.web_body = document.querySelector("body")
            , this.Open_Gallery()
    }

    csl(v) {
        console.log(v)
    }

    Open_Gallery() {

        document.querySelectorAll("img[billie-gallery]").forEach((e) => {
            e.addEventListener("click", () => {
                this.Gallery_Name(e),
                    this.Body_sub_image(),
                    this.Show_Gallery(e),
                    this.On_click_sub_img(),
                    this.Close_Gallery()
            })
        })


    }

    Body_sub_image() {
        for (let i = 0; i < document.querySelectorAll(`img[billie-gallery='${this.val_gal}']`).length; i += 1) {
            this.subImage += `<img src='${document.querySelectorAll(`img[billie-gallery='${this.val_gal}']`)[i].attributes.src.value}' alt='${document.querySelectorAll(`img[billie-gallery='${this.val_gal}']`)[i].attributes.alt.value}' billie-gallery-sub='${i}'>`

        }
    }

    On_click_sub_img() {
        for (let i = 0; i < document.querySelectorAll(`img[billie-gallery='${this.val_gal}']`).length; i += 1) {
            document.querySelector(`[billie-gallery-sub='${i}']`).addEventListener("click", (e) => {
                document.querySelector(".Wrap-Now-Image-Gallery > img").setAttribute("src", e.target.attributes.src.value)
                    , document.querySelector(".Wrap-Now-Image-Gallery > img").setAttribute("alt", e.target.attributes.alt.value)
            })
        }
    }


    Gallery_Name(gn) {
        this.val_gal = gn.attributes['billie-gallery'].value
    }

    Count_img_From_Gallery_Name() {
        /*
          Count img From Gallery Name
          */
        return document.querySelectorAll(`img[billie-gallery="${this.val_gal}"]`).length
    }

    Body_html_Gallery() {
        return `
        <div class="Wrap-BG-All-Gallery">
            <div class="Wrap-btn-Close-Gallery">
                <span></span><span></span>
            </div>
            
            <div class="Wrap-Now-Image-Gallery">
                <img src="" alt="">
            </div>
            <div class="Wrap-Bar-Other-image">
                <div class="Wrap-Name-Gallery">
                    <b>Gallery Name : <span class="name_gallery"></span></b>
                </div>
                <div class="Wrap-Other-Image">
                   
                </div>
            </div>
        </div>`

    }

    Show_Gallery(e) {
        /* Show Gallery */


        /**
         * Insert body gallery to after body & Image
         */
        this.web_body.style.overflowY = "hidden"
            , this.web_body.style.overflowX = "hidden"
            , this.web_body.innerHTML += this.Body_html_Gallery()
            , document.querySelector(".Wrap-Name-Gallery > b >span.name_gallery").innerHTML = this.val_gal
            , document.querySelector(".Wrap-Name-Gallery > b >span.name_gallery").innerHTML += "<br> Total Image : " + this.Count_img_From_Gallery_Name()
            , document.querySelector(".Wrap-Now-Image-Gallery > img").setAttribute("src", e.attributes.src.value)


        document.querySelector(".Wrap-Bar-Other-image > .Wrap-Other-Image").innerHTML += this.subImage

        /**
         * The page is responsive while resizing the display, and then after the DOM has loaded.
         */
        this.size_img_now = document.querySelector(".Wrap-Now-Image-Gallery > img").width
        this.Responsive_Window_with_Image(window.innerWidth),
            window.addEventListener("resize", (wd_size) => {
                this.Responsive_Window_with_Image(wd_size.target.innerWidth)
            })

        /**
         * The element's opacity will be 1 when mouse over it , and then it will be 0.2 when mouse out.
         */
        const w_b_o_i = document.querySelector(".Wrap-Bar-Other-image");
        let timeout;
        w_b_o_i.addEventListener("mouseenter", (e) => {
            // Clear timeout
            if (timeout) {
                clearTimeout(timeout);
            }
            e.target.classList.remove("_leave");
            e.target.classList.add("_hover");
        });

        w_b_o_i.addEventListener("mouseleave", (e2) => {
            // Set timeout
            timeout = setTimeout(() => {
                e2.target.classList.remove("_hover");
                e2.target.classList.add("_leave");
            }, 2500);
        });

    }


    /**
     *
     * @param wd_size Display width
     * @disc Function responsive the picture
     */
    Responsive_Window_with_Image(wd_size) {
        if(document.querySelector(".Wrap-Now-Image-Gallery") !== null) {
            wd_size <= this.size_img_now
                ? (
                    document.querySelector(".Wrap-Now-Image-Gallery").style.height = "unset",
                        document.querySelector(".Wrap-Now-Image-Gallery > img").style.height = "unset",
                        document.querySelector(".Wrap-Now-Image-Gallery > img").style.width = "100%"
                )
                : (
                    document.querySelector(".Wrap-Now-Image-Gallery").style.height = "100%",
                        document.querySelector(".Wrap-Now-Image-Gallery > img").style.height = "100%",
                        document.querySelector(".Wrap-Now-Image-Gallery > img").style.width = "unset"
                )
        }
    }

    Close_Gallery() {
        /* Close Gallery */
        document.querySelector(".Wrap-btn-Close-Gallery").addEventListener("click", () => {
            this.web_body.style.overflowY = "auto"
                , this.web_body.style.overflowX = "auto"
                , document.querySelector(".Wrap-BG-All-Gallery").remove()
                , this.subImage = ``
                , this.Open_Gallery()
        })
    }


}

new billie_gallery();


