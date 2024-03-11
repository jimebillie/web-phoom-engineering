<div>
    <div>
        <h1>
            หน้าแรก
        </h1>
    </div>
    <div class="card card-body " style="background-color: #f8f8f8">
        <div class="alert alert-info">
            <b>จัดการรูปภาพ Slide ใหม่</b>
        </div>
        <div>
            <form id="form1">
                <div class="col-12 col-md-6">
                    <label for="file1">
                        (แสดงบน Desktop) :
                    </label>
                    <input id="file1" class="form-control" type="file" required>
                </div>
                <p></p>
                <div class="exampleImg1"></div>
                <p></p>
                <div class="col-12 col-md-6">
                    <label for="file2">
                        (แสดงบน Mobile) :
                    </label>
                    <input id="file2" class="form-control" type="file" required>
                </div>
                <p></p>
                <div class="exampleImg2"></div>
                <p></p>
                <button type="submit" class="btn btn-success">
                    บันทึก
                </button>
            </form>
            <p></p>
            <p></p>
            <div class="col-12 col-md-6" style="overflow-x: auto">
                <table class="table table-striped table-bordered table-hover w-100">
                    <thead style="white-space: nowrap; font-weight: bold">
                    <tr>
                        <th style="width: 10px">
                            #
                        </th>
                        <th style="width: 20px">
                            แสดงบน Desktop
                        </th>
                        <th style="width: 10px">
                            แสดงบน Mobile
                        </th>
                        <th>
                            จัดการ
                        </th>
                    </tr>
                    </thead>
                    <tbody id="tbody1" class="text-nowrap">
                    <tr>
                        <td colspan="4" style="text-align: center">
                            <small>Loading...</small>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <p></p>
    <p></p>

    <div class="card card-body " style="background-color: #f8f8f8">
        <div class="alert alert-info">
            <b>จัดการข้อมูลเกี่ยวกับบริษัทของเรา ในหน้าแรก</b>
        </div>
        <form id="form2">
            <textarea id="summernote1" name="editordata"></textarea>
            <p></p>
            <button type="submit" class="btn btn-warning">
                บันทึกการเปลี่ยนแปลง
            </button>
        </form>
    </div>
    <p></p>
    <p></p>
    <div class="card card-body " style="background-color: #f8f8f8">
        <div class="alert alert-info">
            <b>จัดการรูปภาพลูกค้าของฉัน</b>
        </div>
        <form id="form3">
            <div class="col-12 col-md-6">
                <label for="file3">
                    (รูปภาพลูกค้าใหม่) :
                </label>
                <input id="file3" class="form-control" type="file" required>
            </div>
            <p></p>
            <div class="exampleImg3"></div>
            <p></p>
            <button type="submit" class="btn btn-success">
                บันทึก
            </button>
        </form>
        <p></p>
        <div class="col-12 col-md-6" style="overflow-x: auto">
            <table class="table table-striped table-bordered table-hover w-100">
                <thead style="white-space: nowrap; font-weight: bold">
                <tr>
                    <th style="width: 10px">
                        #
                    </th>
                    <th style="width: 10px">
                        รูป
                    </th>
                    <th>
                        จัดการ
                    </th>
                </tr>
                </thead>
                <tbody id="tbody2" class="text-nowrap">
                <tr>
                    <td colspan="3" style="text-align: center">
                        <small>Loading...</small>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <p></p>
    <p></p>
    <div class="card card-body " style="background-color: #f8f8f8">
        <div class="alert alert-info">
            <b>จัดการ GYPSUM PLANT หน้าแรก</b>
        </div>
        <form id="form4">
            <textarea id="summernote2" name="editordata"></textarea>
            <p></p>
            <button type="submit" class="btn btn-warning">
                บันทึกการเปลี่ยนแปลง
            </button>
        </form>
    </div>
    <p></p>
    <p></p>
    <div class="card card-body" style="background-color: #f8f8f8">
        <div class="alert alert-info">
            <b>จัดการ PROJECT หน้าแรก</b>
        </div>
        <form id="form5">
            <textarea id="summernote3" name="editordata"></textarea>
            <p></p>
            <button type="submit" class="btn btn-warning">
                บันทึกการเปลี่ยนแปลง
            </button>
        </form>
    </div>


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
    const displayLoad = document.querySelectorAll(".wrapLoad")[0];

    $(document).ready(function () {
        $('#summernote1').summernote();
        $('#summernote2').summernote();
        $('#summernote3').summernote();
    });

    async function callSlideCustomer() {
        const api = await fetch("../backend/api/home/select_all_customer.php", {
            method: "post"
        });
        const res = await api.json();
        if (res.length > 0) {
            const tbody = document.getElementById("tbody2");
            tbody.innerHTML = "";
            res.map((value, index) => {
                const tr = document.createElement("tr");
                const img1 = document.createElement("img");
                const td0 = document.createElement("td");
                const td1 = document.createElement("td");
                const td2 = document.createElement("td");
                const div = document.createElement("div");
                tr.id = "tr" + value.id;
                img1.src = "../upload/" + value.img;
                img1.style.width = "100px";
                img1.style.height = "50px";
                img1.style.objectFit = "cover";
                img1.style.objectPosition = "center";
                img1.style.cursor = "pointer";
                img1.addEventListener("click", (e) => {
                    window.open("../upload/" + value.img, "_bank", "width=800,height=500,top=300,left=300");
                });
                td0.textContent = index + 1;
                tr.appendChild(td0);
                td1.appendChild(img1)
                tr.appendChild(td1);
                div.addEventListener('click', () => {
                    if (confirm("ต้องการลบหรือไม่ ?") === true) {
                        document.querySelectorAll(".wrapLoad")[0].style.display = "flex";
                        del_img_customer(value.id, value.img);
                    }
                });
                div.innerHTML = "ลบ";
                div.classList.add("btn");
                div.classList.add("btn-danger");
                td2.appendChild(div);
                tr.appendChild(td2);
                tbody.appendChild(tr);
            })
        } else {
            document.getElementById("tbody2").innerHTML = "";
            const tr = document.createElement("tr");
            const td = document.createElement("td");
            td.textContent = "ยังไม่มีข้อมูล";
            td.colSpan = 3;
            td.style.textAlign = "center";
            tr.appendChild(td);
            document.getElementById("tbody2").appendChild(tr);
        }
    }

    callSlideCustomer();

    async function callSlideImg() {
        const api = await fetch("../backend/api/home/select_all_img.php", {
            method: "post"
        });
        const res = await api.json();
        if (res.length > 0) {
            const tbody = document.getElementById("tbody1");
            tbody.innerHTML = "";
            res.map((value, index) => {
                const tr = document.createElement("tr");
                const img1 = document.createElement("img");
                const img2 = document.createElement("img");
                const td0 = document.createElement("td");
                const td1 = document.createElement("td");
                const td2 = document.createElement("td");
                const td3 = document.createElement("td");
                const div = document.createElement("div");
                tr.id = "tr" + value.id;
                img1.src = "../upload/" + value.img_desktop;
                img1.style.width = "100px";
                img1.style.height = "50px";
                img1.style.objectFit = "cover";
                img1.style.objectPosition = "center";
                img1.style.cursor = "pointer";
                img1.addEventListener("click", (e) => {
                    window.open("../upload/" + value.img_desktop, "_bank", "width=800,height=500,top=300,left=300");
                });
                img2.src = "../upload/" + value.img_mobile;
                img2.style.width = "50px";
                img2.style.height = "50px";
                img2.style.objectFit = "cover";
                img2.style.objectPosition = "center";
                img2.style.cursor = "pointer";
                img2.addEventListener("click", (e) => {
                    window.open("../upload/" + value.img_mobile, "_bank", "width=800,height=500,top=300,left=300");
                });
                td0.textContent = index + 1;
                tr.appendChild(td0);
                td1.appendChild(img1);
                tr.appendChild(td1);
                td2.appendChild(img2);
                tr.appendChild(td2);
                div.addEventListener('click', () => {
                    if (confirm("ต้องการลบหรือไม่ ?") === true) {
                        document.querySelectorAll(".wrapLoad")[0].style.display = "flex";
                        del_img(value.id, value.img_desktop, value.img_mobile);
                    }
                });
                div.innerHTML = "ลบ";
                div.classList.add("btn");
                div.classList.add("btn-danger");
                td3.appendChild(div);
                tr.appendChild(td3);
                tbody.appendChild(tr);
            })
        } else {
            document.getElementById("tbody1").innerHTML = "";
            const tr = document.createElement("tr");
            const td = document.createElement("td");
            td.textContent = "ยังไม่มีข้อมูล";
            td.colSpan = 4;
            td.style.textAlign = "center";
            tr.appendChild(td);
            document.getElementById("tbody1").appendChild(tr);
        }
    }

    callSlideImg();

    document.getElementById("file1").addEventListener("change", (e) => {
        const divExmImg = document.querySelector(".exampleImg1");
        divExmImg.innerHTML = "";
        const reader = new FileReader();
        reader.onload = function (r) {
            const img = document.createElement("img");
            const p = document.createElement("p");
            img.src = r.target.result;
            img.style.width = "200px";
            divExmImg.appendChild(img);
            divExmImg.appendChild(p);
        }
        reader.readAsDataURL(e.target.files[0])
    });
    document.getElementById("file2").addEventListener("change", (e) => {
        const divExmImg = document.querySelector(".exampleImg2");
        divExmImg.innerHTML = "";
        const reader = new FileReader();
        reader.onload = function (r) {
            const img = document.createElement("img");
            const p = document.createElement("p");
            img.src = r.target.result;
            img.style.width = "200px";
            divExmImg.appendChild(img);
            divExmImg.appendChild(p);
        }
        reader.readAsDataURL(e.target.files[0])
    });
    document.getElementById("file3").addEventListener("change", (e) => {
        const divExmImg = document.querySelector(".exampleImg3");
        divExmImg.innerHTML = "";
        const reader = new FileReader();
        reader.onload = function (r) {
            const img = document.createElement("img");
            const p = document.createElement("p");
            img.src = r.target.result;
            img.style.width = "200px";
            divExmImg.appendChild(img);
            divExmImg.appendChild(p);
        }
        reader.readAsDataURL(e.target.files[0])
    });
    document.getElementById("form1").addEventListener('submit', (e) => {
        e.preventDefault();
        document.querySelectorAll(".wrapLoad")[0].style.display = "flex";
        const inpFile1 = document.getElementById("file1").files[0];
        const inpFile2 = document.getElementById("file2").files[0];
        const formData = new FormData();
        formData.append("img_desktop", inpFile1);
        formData.append("img_mobile", inpFile2);
        const callAPI = async () => {
            const api = await fetch("../backend/api/home/save_img.php", {
                method: "post",
                body: formData
            });
            const res = await api.json();
            if (res.status === 200) {
                setTimeout(() => {
                    document.querySelectorAll(".wrapLoad")[0].style.display = "none";
                    document.getElementById("file1").value = null;
                    document.getElementById("file2").value = null;
                    document.querySelector(".exampleImg1").innerHTML = "";
                    document.querySelector(".exampleImg2").innerHTML = "";
                    callSlideImg();
                }, 1000);
            } else {
                document.querySelectorAll(".wrapLoad")[0].style.display = "none";
            }
        }
        callAPI();
    })

    async function del_img(id, img_desktop, img_mobile) {
        const formData = new FormData;
        formData.append("id", id);
        formData.append("img_desktop", img_desktop);
        formData.append("img_mobile", img_mobile);
        const api = await fetch("../backend/api/home/del_img.php", {
            method: "POST",
            body: formData
        });
        const res = await api.json();
        if (res.status === 200) {
            setTimeout(() => {
                callSlideImg();
                document.querySelectorAll(".wrapLoad")[0].style.display = "none";
            }, 1000);
        } else {
            document.querySelectorAll(".wrapLoad")[0].style.display = "none";
        }
    }

    async function del_img_customer(id, img) {
        const formData = new FormData;
        formData.append("id", id);
        formData.append("img", img);
        const api = await fetch("../backend/api/home/del_customer.php", {
            method: "POST",
            body: formData
        });
        const res = await api.json();
        if (res.status === 200) {
            setTimeout(() => {
                callSlideCustomer();
                document.querySelectorAll(".wrapLoad")[0].style.display = "none";
            }, 1000);
        } else {
            document.querySelectorAll(".wrapLoad")[0].style.display = "none";
        }
    }

    async function callApiAboutCompany() {
        const api = await fetch("../backend/api/home/show_about_company.php", {method: "post"});
        const res = await api.json();
        if (res.status === 200) {
            $('#summernote1').summernote('code', res.data);
        }
    }

    callApiAboutCompany();

    async function callApiShowAboutHomeGypsumPlant() {
        const api = await fetch("../backend/api/home/show_about_gypsum_plant.php", {method: "post"});
        const res = await api.json();
        if (res.status === 200) {
            $('#summernote2').summernote('code', res.data);
        }
    }

    callApiShowAboutHomeGypsumPlant();

    async function callApiShowAboutHomeProject() {
        const api = await fetch("../backend/api/home/show_about_project.php", {method: "post"});
        const res = await api.json();
        if (res.status === 200) {
            $('#summernote3').summernote('code', res.data);
        }
    }

    callApiShowAboutHomeProject();

    document.getElementById("form2").addEventListener("submit", (e) => {
        e.preventDefault();
        const formData = new FormData;
        formData.append("data", document.getElementById("summernote1").value);
        callApiSaveAboutCompany(formData);
    });

    document.getElementById("form4").addEventListener("submit", (e) => {
        e.preventDefault();
        const formData = new FormData;
        formData.append("data", document.getElementById("summernote2").value);
        callApiSaveAboutHomeGypsumPlant(formData);
    });
    document.getElementById("form5").addEventListener("submit", (e) => {
        e.preventDefault();
        const formData = new FormData;
        formData.append("data", document.getElementById("summernote3").value);
        callApiSaveAboutHomeProject(formData);
    });

    async function callApiSaveAboutCompany(formData) {
        displayLoad.style.display = "flex";
        const api = await fetch("../backend/api/home/save_about_company.php", {method: "post", body: formData});
        const res = await api.json();
        if (res.status === 200) {
            displayLoad.style.display = "none";
            alert("แก้ไขเรียบร้อย")
        }
    }

    async function callApiSaveAboutHomeGypsumPlant(formData) {
        displayLoad.style.display = "flex";
        const api = await fetch("../backend/api/home/save_about_gypsum_plant.php", {
            method: "post",
            body: formData
        });
        const res = await api.json();
        if (res.status === 200) {
            displayLoad.style.display = "none";
            alert("แก้ไขเรียบร้อย")
        }
    }

    async function callApiSaveAboutHomeProject(formData) {
        displayLoad.style.display = "flex";
        const api = await fetch("../backend/api/home/save_about_project.php", {method: "post", body: formData});
        const res = await api.json();
        if (res.status === 200) {
            displayLoad.style.display = "none";
            alert("แก้ไขเรียบร้อย")
        }
    }

    document.getElementById("form3").addEventListener('submit', (e) => {
        e.preventDefault();
        document.querySelectorAll(".wrapLoad")[0].style.display = "flex";
        const inpFile3 = document.getElementById("file3").files[0];
        const formData = new FormData();
        formData.append("img", inpFile3);
        const callAPI = async () => {
            const api = await fetch("../backend/api/home/save_customer.php", {
                method: "post",
                body: formData
            });
            const res = await api.json();
            if (res.status === 200) {
                setTimeout(() => {
                    document.querySelectorAll(".wrapLoad")[0].style.display = "none";
                    document.getElementById("file3").value = null;
                    document.querySelector(".exampleImg3").innerHTML = "";
                    callSlideCustomer();
                }, 1000);
            } else {
                document.querySelectorAll(".wrapLoad")[0].style.display = "none";
            }
        }
        callAPI();
    })

</script>