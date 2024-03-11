<div class="box-contact-top">

    <div class="contact-top-all">
        <a href="#" target="_blank">
            <img src="images/icon-top-tel.jpg" width="30" height="30"/>
        </a>
        <a href="#" target="_blank">
            <img src="images/icon-top-whatsapp.jpg" width="30"
                 height="30"/></a>
        <a href="#" target="_blank"><img
                    src="images/icon-top-fb.jpg" width="30" height="30"/></a>
        <a href="# target=" _blank"><img src="images/icon-top-line.jpg"
                                         width="30" height="30"/></a></div>

</div>
<script>
    async function callContact() {
        const formData = new FormData();
        formData.append("api", "show")
        const api = await fetch("back-office/backend/api/contact.php", {method: "post", body: formData});
        const res = await api.json();
        res.map((v, i) => {
            document.querySelectorAll(".contact-top-all > a")[0].href = "tel:" + v.f1
            document.querySelectorAll(".contact-top-all > a")[1].href = "tel:" + v.f5
            document.querySelectorAll(".contact-top-all > a")[2].href = "tel:" + v.f7
            document.querySelectorAll(".contact-top-all > a")[3].href = "tel:" + v.f9
        })
    }

    callContact()
</script>
