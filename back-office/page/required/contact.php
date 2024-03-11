<div>
    <h1>
        หน้า Contact
    </h1>
</div>
<div class="card card-body " style="background-color: #f8f8f8">
    <div class="alert alert-info">
        <b>จัดการข้อมูลหน้า Contact</b>
    </div>
    <form id="form1">
        <div class="col-12 col-md-6">
            <div>เบอร์โทร :</div>
            <input id="f1" type="text" class="form-control" required>
        </div>
        <p></p>
        <div class="col-12 col-md-6">
            <div>Email :</div>
            <input id="f2" type="text" class="form-control" required>
        </div>
        <p></p>
        <div class="col-12 col-md-6">
            <div>ที่อยู่ :</div>
            <input id="f3" type="text" class="form-control" required>
        </div>
        <p></p>
        <div class="col-12 col-md-6">
            <div>WhatApp text :</div>
            <input id="f4" type="text" class="form-control" required>
        </div>
        <p></p>
        <div class="col-12 col-md-6">
            <div>WhatApp link :</div>
            <input id="f5" type="text" class="form-control" required>
        </div>
        <p></p>
        <div class="col-12 col-md-6">
            <div>FB text :</div>
            <input id="f6" type="text" class="form-control" required>
        </div>
        <p></p>
        <div class="col-12 col-md-6">
            <div>FB link :</div>
            <input id="f7" type="text" class="form-control" required>
        </div>
        <p></p>
        <div class="col-12 col-md-6">
            <div>Line text :</div>
            <input id="f8" type="text" class="form-control" required>
        </div>
        <p></p>
        <div class="col-12 col-md-6">
            <div>Line link :</div>
            <input id="f9" type="text" class="form-control" required>
        </div>
        <p></p>
        <div class="col-12">
            <div>Map :</div>
            <textarea id="f10" type="text" class="form-control"></textarea>
        </div>
        <p></p>
        <div class="col-12">
            <button type="submit" class="btn btn-success">บันทึก</button>
        </div>
    </form>
</div>


<!---
// Loading page ..
-->
<style>
    .wrapLoad {
        background-color: rgba(0, 0, 0, 0.7);
        position: fixed;
        width: 100%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 5;
    }

    .wrapLoad:before {
        content: "Loading...";
        font-size: 25px;
        font-weight: bold;
        color: white;
    }
</style>
<div class="wrapLoad"></div>

<!---
// Loading page ..
-->


<script>

    document.getElementById("form1").addEventListener("submit", (e) => {
        e.preventDefault()
        const call = async () => {
            const formData = new FormData();
            formData.append("api", "save")
            formData.append("f1", document.getElementById("f1").value)
            formData.append("f2", document.getElementById("f2").value)
            formData.append("f3", document.getElementById("f3").value)
            formData.append("f4", document.getElementById("f4").value)
            formData.append("f5", document.getElementById("f5").value)
            formData.append("f6", document.getElementById("f6").value)
            formData.append("f7", document.getElementById("f7").value)
            formData.append("f8", document.getElementById("f8").value)
            formData.append("f9", document.getElementById("f9").value)
            formData.append("f10", document.getElementById("f10").value)
            const api = await fetch("../backend/api/contact.php", {method: "post", body: formData});
            const res = await api.json();
            if (res.status === 200) {
                alert("บันทึกสำเร็จ");
                location.reload();
            }
        }
        call();
    })

    async function callContact() {
        const formData = new FormData();
        formData.append("api", "show")
        const api = await fetch("../backend/api/contact.php", {method: "post", body: formData});
        const res = await api.json();
        res.map((v, i) => {
            document.getElementById("f1").value=v.f1
            document.getElementById("f2").value=v.f2
            document.getElementById("f3").value=v.f3
            document.getElementById("f4").value=v.f4
            document.getElementById("f5").value=v.f5
            document.getElementById("f6").value=v.f6
            document.getElementById("f7").value=v.f7
            document.getElementById("f8").value=v.f8
            document.getElementById("f9").value=v.f9
            document.getElementById("f10").value=v.f10
        })

    }
    callContact()
</script>