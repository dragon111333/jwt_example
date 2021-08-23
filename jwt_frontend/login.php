<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body style="aling:center;">
    <div class="container">
        <div class="row">
            <div class="col">
               <div style="width:30%;margin:auto;">
                    <div class="mb-3">
                        <h1>โปรดเข้าสู่ระบบ</h1>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">ชื่อผู้ใช้</label>
                        <input type="text" class="form-control" id="username" placeholder="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">รหัสผ่าน</label>
                        <input type="password" class="form-control" id="password" placeholder="รหัสผ่าน">
                    </div>
                    <div class="mb-3">
                        <button onClick="login()" class="btn btn-outline-primary w-100">โอเครรรร</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        async function login(){    
                    let d = document;
                    let data = {"username":d.getElementById("username").value
                                ,"password":d.getElementById("password").value}
                    console.log(data);
                    let response = await axios({
                        method: 'post',
                        url: 'http://localhost:3000/login',
                        headers: {
                                "Access-Control-Allow-Origin":"*"
                                , 'Content-Type': 'application/json'
                        },
                        data:JSON.stringify(data)
                    });
                    if(response.data.status=="0"){
                        alert("ไม่พบผู้ใช้")
                    }else if(response.data.status=="1"){
                        localStorage.setItem("access_token",response.data.access_token);
                        location.href = location.origin+"/jwt_auth/";
                    }
        }

    </script>
</body>
</html>