<div>
    <h1>
        หน้า Project
    </h1>
</div>
<div class="card card-body " style="background-color: #f8f8f8">
    <div class="alert alert-info">
        <b>เพิ่ม Project ใหม่</b>
    </div>
    <form id="form1">
        <div class="row">
            <div class="col-12 col-md-6">
                <label for="name_project">(ชื่อ Project) :</label>
                <input id="name_project" class="form-control" type="text" required>
            </div>
        </div>
        <p></p>
        <div class="row">
            <div class="col-12 col-md-6">
                <label for="year">(ปี) :</label>
                <input id="year" class="form-control" type="text" required>
            </div>
        </div>
        <p></p>
        <div class="row">
            <div class="col-12 col-md-6">
                <label for="file1">(รูปหน้าปรก) :</label>
                <input id="file1" class="form-control" type="file" required>
            </div>
            <p></p>
            <div class="exampleImg1"></div>
            <p></p>
        </div>
        <p></p>
        <div class="row">
            <div class="col-12">
                <label for="summernote1">(รายละเอียด) :</label>
                <textarea id="summernote1"></textarea>
            </div>
        </div>
        <p></p>
        <button type="submit" class="btn btn-success">
            บันทึก
        </button>
    </form>
    <p></p>
    <p></p>
    <div class="col-12" style="overflow-x: auto">
        <table class="table table-striped table-bordered table-hover w-100">
            <thead style="white-space: nowrap; font-weight: bold">
            <tr>
                <th style="width: 10px">
                    #
                </th>
                <th style="width: 20px">
                    ชื่อ
                </th>
                <th style="width: 10px">
                    รูปภาพหน้าปรก
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
    });
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
    document.getElementById("form1").addEventListener('submit', (e) => {
        e.preventDefault();
        displayLoad.style.display = "flex";
        if (document.getElementById("summernote1").value === "") {
            alert("โปรดกรอกข้อมูล รายละเอียด")
            setTimeout(() => {
                displayLoad.style.display = "none";
            }, 300);
        } else {
            const inpFile1 = document.getElementById("file1").files[0];
            const formData = new FormData();
            formData.append("api", "save_main");
            formData.append("name_project", document.getElementById("name_project").value);
            formData.append("year", document.getElementById("year").value);
            formData.append("img", inpFile1);
            formData.append("detail", document.getElementById("summernote1").value);
            const callAPI = async () => {
                const api = await fetch("../backend/api/project.php", {
                    method: "post",
                    body: formData
                });
                const res = await api.json();
                if (res.status === 200) {
                    setTimeout(() => {
                        displayLoad.style.display = "none";
                        document.getElementById("name_project").value = null
                        document.getElementById("year").value = null
                        document.getElementById("file1").value = null;
                        document.querySelector(".exampleImg1").innerHTML = null;
                        document.getElementById("summernote1").value = null
                        $('#summernote1').summernote('code', null);
                        showForm1();
                    }, 1000);
                } else {
                    displayLoad.style.display = "none";
                }
            }
            callAPI();
        }
    })

    async function showForm1() {
        const formData = new FormData();
        formData.append("api", "show_main")
        const api = await fetch("../backend/api/project.php", {
            method: "post",
            body: formData
        });
        const res = await api.json();
        if (res.length > 0) {
            document.getElementById("tbody1").innerHTML = null
            res.map((v, i) => {
                const tr = document.createElement('tr');
                const td1 = document.createElement('td');
                const td2 = document.createElement('td');
                const td3 = document.createElement('td');
                const td4 = document.createElement('td');
                const img = document.createElement('img');
                const del = document.createElement('div');
                const edit = document.createElement('div');
                td1.textContent = i + 1;
                td2.textContent = v.name_project + "( ปี " + v.year + " )";
                img.src = "../upload/" + v.img;
                img.style.width = "100px";
                img.style.height = "50px";
                img.style.objectFit = "cover";
                img.style.objectPosition = "center";
                img.style.cursor = "pointer";
                img.addEventListener("click", (e) => {
                    window.open("../upload/" + v.img, "_bank", "width=800,height=500,top=300,left=300");
                });
                td3.append(img);
                del.style.cursor = "pointer";
                del.textContent = "ลบ"
                del.classList.add('btn');
                del.classList.add('btn-danger');
                del.addEventListener("click", (e) => {
                    if (confirm("ต้องการลบ " + v.name_plant + " ใช่ไหม ?")) {
                        del_main(v.id);
                    }
                });
                edit.style.cursor = "pointer";
                edit.textContent = "แก้ไข"
                edit.classList.add('btn');
                edit.classList.add('btn-warning');
                edit.classList.add('ms-2');
                edit.addEventListener("click", (e) => {
                    window.location.href = "?p=edit_project&id=" + v.id + "&name=" + v.name_project;
                });
                td4.append(del)
                td4.append(edit)
                tr.appendChild(td1);
                tr.appendChild(td2);
                tr.appendChild(td3);
                tr.appendChild(td4);
                document.getElementById("tbody1").appendChild(tr);
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

    showForm1()

    async function del_main(id) {
        displayLoad.style.display = "flex"
        const formData = new FormData();
        formData.append("api", "del_main");
        formData.append("id", id);
        const api = await fetch("../backend/api/project.php", {
            method: "post",
            body: formData
        });
        const res = await api.json();
        if (res.status === 200) {
            alert("ลบข้อมูลเรียบร้อย");
            displayLoad.style.display = "none"
            await showForm1();
        }
    }


</script>
