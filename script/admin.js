let form = document.querySelector('.submit');
let submit_btn = document.querySelector('.signIn');
let logout_btn = document.querySelector('.logOut');

form.onsubmit = function (evt){
  evt.preventDefault();
  let user = {
    // user: {
    'login' : document.getElementById('login').value,
    'password' : document.getElementById('password').value
    // },
    // 'action': evt
  }
  fetch('/script/php/auth.php', {
    method: "post",
    body: JSON.stringify(user)
  }).then(response => {
    return response.text();
  }).then(data => {
    // console.log(data)
    alert(data);
    window.location.href = './shop.php';
  })
}

// let http = new XMLHttpRequest();
// http.open('POST', 'auth.php', true);
// http.responseType = 'json';
// http.send({'user': 'info'});
//
// let res;
// http.onload = function (){
//   if (http.status !== 200){
//     alert("err");
//   } else {
//     res=http.response;
//     console.log(res);
//   }
// }
