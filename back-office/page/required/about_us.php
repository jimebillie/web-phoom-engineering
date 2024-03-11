<div>
    <h1>
        หน้า About Us
    </h1>
</div>
<div class="card card-body " style="background-color: #f8f8f8">
    <div class="alert alert-info">
        <b>จัดการข้อมูลหน้า About us</b>
    </div>
    <form id="form1">
        <textarea id="summernote1" name="editordata"></textarea>
        <p></p>
        <button type="submit" class="btn btn-warning">
            บันทึกการเปลี่ยนแปลง
        </button>
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
    const displayLoad = document.querySelectorAll(".wrapLoad")[0];
    $(document).ready(function () {
        $('#summernote1').summernote();
    });

    document.getElementById("form1").addEventListener("submit", (e) => {
        e.preventDefault();
        const formData = new FormData;
        formData.append("data", document.getElementById("summernote1").value);
        saveForm1(formData);
    });

    async function saveForm1(formData) {
        displayLoad.style.display = "flex";
        const api = await fetch("../backend/api/save_aboutus.php", {method: "post", body: formData});
        const res = await api.json();
        if (res.status === 200) {
            displayLoad.style.display = "none";
            alert("แก้ไขเรียบร้อย")
        }
    }

    async function showForm1() {
        const api = await fetch("../backend/api/show_aboutus.php", {method: "post"});
        const res = await api.json();
        if (res.status === 200) {
            $('#summernote1').summernote('code', res.data);
        }
    }

    showForm1();

</script>