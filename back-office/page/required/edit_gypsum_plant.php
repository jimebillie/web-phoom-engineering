<?php
if (!isset($_GET['id'])) {
    ?>
    <script>window.location.href = "?p=gypsumplant"</script>
    <?php
}
?>
<div>
    <h1>
        แก้ไข Gypsum Plant
    </h1>
</div>
<div class="card card-body " style="background-color: #f8f8f8">
    <div class="alert alert-warning">
        <div style="cursor: pointer; text-decoration:underline" onclick="history.back()">ย้อนกลับ</div>
        <b>แก้ไข Gypsum Plant</b>
    </div>
    <form id="form1">
        <div class="row">
            <div class="col-12 col-md-6">
                <label for="name_plant">(ชื่อ Plant) :</label>
                <input id="name_plant" class="form-control" type="text" required>
            </div>
        </div>
        <p></p>
        <div class="row">
            <p></p>
            <div class="col-12 col-md-6">
                (รูปหน้าปรกเดิม) :
                <div class="exampleImg1"></div>
            </div>
            <p></p>
            <div class="col-12 col-md-6">
                <label for="file1">(รูปหน้าปรกใหม่) :</label>
                <input id="file1" class="form-control" type="file">
            </div>
            <p></p>
            <div class="exampleImg2"></div>
        </div>
        <p></p>
        <div class="row">
            <div class="col-12">
                <label for="summernote1">(รายละเอียด) :</label>
                <textarea id="summernote1"></textarea>
            </div>
        </div>
        <p></p>
        <button type="submit" class="btn btn-warning">
            แก้ไข
        </button>
    </form>
</div>
<p></p>
<p></p>
<div class="card card-body " style="background-color: #f8f8f8">
    <div class="alert alert-info">
        จัดการรูปภาพเพิ่มเดิม
    </div>
    <form id="form3">
        <div class="col-12 col-md-6">
            <label for="file3">
                (รูปภาพเพิ่มเติมใหม่) :
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

    async function getGypsumById(id = <?=$_GET['id']?>) {
        const formData = new FormData();
        formData.append("api", "getGypsumById");
        formData.append("id", id);
        const api = await fetch("../backend/api/gypsumplant.php", {
            method: "post",
            body: formData
        });
        const res = await api.json();
        if (res.length > 0) {
            res.map((v, i) => {
                document.getElementById("name_plant").value = v.name_plant
                const img = document.createElement('img');
                img.src = "../upload/" + v.img
                img.style.width = "200px";
                document.querySelector(".exampleImg1").innerHTML = ""
                document.querySelector(".exampleImg1").appendChild(img);
                $('#summernote1').summernote("code", v.detail);
                if (v.img_other !== "no") {
                    const x = v.img_other.split(",")
                    const tbody = document.getElementById("tbody2");
                    tbody.innerHTML = "";
                    x.map((value, index) => {
                        const tr = document.createElement("tr");
                        const img1 = document.createElement("img");
                        const td0 = document.createElement("td");
                        const td1 = document.createElement("td");
                        const td2 = document.createElement("td");
                        const div = document.createElement("div");
                        tr.id = "tr" + value.id;
                        img1.src = "../upload/" + value;
                        img1.style.width = "100px";
                        img1.style.height = "50px";
                        img1.style.objectFit = "cover";
                        img1.style.objectPosition = "center";
                        img1.style.cursor = "pointer";
                        img1.addEventListener("click", (e) => {
                            window.open("../upload/" + value, "_bank", "width=800,height=500,top=300,left=300");
                        });
                        td0.textContent = index + 1;
                        tr.appendChild(td0);
                        td1.appendChild(img1)
                        tr.appendChild(td1);
                        div.addEventListener('click', () => {
                            if (confirm("ต้องการลบหรือไม่ ?") === true) {
                                displayLoad.style.display = "flex";
                                delImgOther(i)
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
            })
        } else {
            window.location.href = "?p=gypsumplant"
        }
    }

    getGypsumById();


    function delImgOther(i) {
        const callAPI = async () => {
            const formData = new FormData();
            formData.append("api", "delImgOther");
            formData.append("id", <?=$_GET['id']?>);
            formData.append("i", i);
            const api = await fetch("../backend/api/gypsumplant.php", {
                method: "post",
                body: formData
            });
            const res = await api.json();
            if (res.status === 200) {
                setTimeout(() => {
                    displayLoad.style.display = "none";
                    document.getElementById("file3").value = null;
                    document.querySelector(".exampleImg3").innerHTML = "";
                    getGypsumById();
                }, 1000);
            } else {
                displayLoad.style.display = "none";
            }
        }
        callAPI();
    }

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
    document.getElementById("form3").addEventListener('submit', (e) => {
        e.preventDefault();
        const inpFile3 = document.getElementById("file3").files[0];
        const callAPI = async () => {
            const formData = new FormData();
            formData.append("api", "saveImgOther");
            formData.append("id", <?=$_GET['id']?>);
            formData.append("img", inpFile3);
            const api = await fetch("../backend/api/gypsumplant.php", {
                method: "post",
                body: formData
            });
            const res = await api.json();
            if (res.status === 200) {
                setTimeout(() => {
                    displayLoad.style.display = "none";
                    document.getElementById("file3").value = null;
                    document.querySelector(".exampleImg3").innerHTML = "";
                    getGypsumById();
                }, 1000);
            } else {
                displayLoad.style.display = "none";
            }
        }
        callAPI();
    })


    $(document).ready(function () {
        $('#summernote1').summernote();
    });
    document.getElementById("file1").addEventListener("change", (e) => {
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
    document.getElementById("form1").addEventListener('submit', (e) => {
        e.preventDefault();
        displayLoad.style.display = "flex";
        if (document.getElementById("summernote1").value === "") {
            alert("โปรดกรอกข้อมูล รายละเอียด")
            setTimeout(() => {
                displayLoad.style.display = "none";
            }, 300);
        } else {
            let inpFile1 = null;
            if (document.getElementById("file1").files.length > 0) {
                inpFile1 = document.getElementById("file1").files[0];
            }
            const formData = new FormData();
            formData.append("api", "editGypsumById");
            formData.append("id", <?=$_GET['id']?>);
            formData.append("name_plant", document.getElementById("name_plant").value);
            formData.append("img", inpFile1);
            formData.append("detail", document.getElementById("summernote1").value);
            const callAPI = async () => {
                const api = await fetch("../backend/api/gypsumplant.php", {
                    method: "post",
                    body: formData
                });
                const res = await api.json();
                if (res.status === 200) {
                    alert("บันทึกเรียบร้อย");
                    displayLoad.style.display = "none";
                    location.reload();
                } else {
                    alert("มีข้อผิดพลาด");
                }
            }
            callAPI();
        }
    })


</script>
