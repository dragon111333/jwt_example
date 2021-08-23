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
               <div style="width:30%;margin:auto;" id="user_data">
                    <div class="mb-3">
                        <h1>ยินดีต้อนรับ</h1>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
    <script>
        window.onload = async ()=>{    
                        let response = await axios({
                            method: 'post',
                            url: 'http://localhost:3000/get_user_data',
                            headers: {
                                        "Access-Control-Allow-Origin":"*",
                                        'Authorization': 'Bearer '+localStorage.getItem("access_token")
                                    }
                        });
                        if(response.data!=false){
                            console.log(response.data);
                        }else{
                            location.href = location.origin+"/jwt_auth/login.php";
                        }
                        // <div class="mb-3">
                        // </div>
                    };
                  
      

    </script>
</body>
</html>