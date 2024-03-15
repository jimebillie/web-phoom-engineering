<div class="footer">
    <div class="box-footer-top">
        <div class="box-main">
            <div class="box-footer-left">
                <div class="title-footer">NAVIGATION:</div>
                <div class="menu-footer">
                    <a href="index.php">HOME</a><br/>
                    <a href="aboutus.php">ABOUT US</a><br/>
                    <a href="gypsumplant.php">GYPSUM PLANT</a><br/>
                    <a href="project.php">PROJECT</a><br/>
                    <a href="contactus.php">CONTACT US</a></div>
            </div>
            <div class="box-footer-center">
                <div class="title-footer">CONTACT US:</div>
                <div class="contact-footer-01"><a href=""></a></div>
                <div class="contact-footer-02"></div>
                <div class="contact-footer-03">
                </div>
            </div>
            <div class="box-footer-right">
                <div class="title-footer">FOLLOW US:</div>
                <div class="icon-footer"><a href="" target="_blank"><img
                                src="images/icon-footer-06.jpg" width="49" height="49"/></a><a
                            href="" target="_blank"><img
                                src="images/icon-footer-04.jpg" width="49" height="49"/></a>
                    <a
                            href="https://line.me/ti/p/~Pongsathorn-pec" target="_blank"><img
                                src="images/icon-footer-05.jpg" width="49" height="49"/></a></div>
            </div>


        </div>
    </div>

    <div class="copy">© phoom-engineering.com . All Rights Reserved.</div>

</div>
<script>
    async function callContact() {
        const formData = new FormData();
        formData.append("api", "show")
        const api = await fetch("back-office/backend/api/contact.php", {method: "post", body: formData});
        const res = await api.json();
        res.map((v, i) => {

            document.querySelector(".contact-footer-01 > a").href = "tel:" + v.f1
            document.querySelector(".contact-footer-01 > a").innerHTML = v.f1
            document.querySelector(".contact-footer-02").innerHTML = v.f2
            document.querySelector(".contact-footer-03").innerHTML = v.f3

            document.querySelectorAll(".icon-footer > a")[0].href = v.f5
            document.querySelectorAll(".icon-footer > a")[1].href = v.f7
            document.querySelectorAll(".icon-footer > a")[1].href = v.f9
            setTimeout(() => {
                document.querySelector(".google_map").innerHTML = v.f10
            }, 500)
        })
    }

    callContact()
</script>