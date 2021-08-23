const route = require("express")();
const TokenManager = require("./token_manager");

route.use(require("cors")());
route.use(require("express").json());

let user = [
    {id:"1",username : "thewin",lname :"zaza",password:"555",tel:"888-888" },
    {id:"2",username : "wow",lname :"lnw",password:"777",tel:"333-333" }
];

route.get("/",(req,res)=>{
    res.send("hello");
})

route.post("/login",(req,res)=>{
    let userData = req.body;
    let userLoginData = user.find((value)=>{return (value.username==userData.username&&value.password==userData.password)});
    if(userLoginData==undefined){
        res.send(JSON.stringify({status:"0"}));
    }else{
        let accessToken = TokenManager.getGenerateAccessToken({"id":userLoginData.id});
        res.send(JSON.stringify({status:"1","access_token":accessToken}));
    }
})

route.post("/check_authen",(req,res)=>{
    let jwtStatus = TokenManager.checkAuthentication(req);
    if(jwtStatus!=false){
        res.send(jwtStatus);
    }else{
        res.send(false);
    }
});

route.post("/get_user_data",(req,res)=>{
    let jwtStatus = TokenManager.checkAuthentication(req);
    if(jwtStatus!=false){
        res.send(user.find((value)=>{return(value.id == jwtStatus.id)}));
    }else{
        res.send(false);
    }   
})

route.listen(3000,(err)=>{
    console.log("server started !!!");
})