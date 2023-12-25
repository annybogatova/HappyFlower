// const form = document.querySelector('.edit');
const act_btn = document.querySelector('.changeDB');
let id = "0";

if(storage.getItem("id") !== "null"){

  const load_file = document.getElementById('file_load');
  load_file.setAttribute("style", "display:none");

  id = storage.getItem("id");
  fetch('./script/php/readsql.php?id='+id)
    .then(response =>{
      return response.json();
    })
    .then(data => {
      document.getElementById('name').value = data['name'];
      document.getElementById('price').value = data['price'];
      // document.getElementById('img').value = data['img'];
    });

  document.querySelector('.changeDB').textContent = " Изменить ";
  storage.setItem("id", null);
} else {
  document.querySelector('.changeDB').textContent = " Добавить ";
}

act_btn.addEventListener('click', (event) => {
  event.preventDefault();
  const form = new FormData(document.querySelector('.edit'));
  form.append('id', id);
  const url = './script/php/add.php'
  const request = new Request(url, {
    method: 'POST',
    body:form
  });

  fetch(request)
    .then(response => {
      return response.text();
    })
    .then(data => {
      console.log(data);
      window.location.href = './shop.php';
    });
})

// form.onsubmit = function (evt){
//   evt.preventDefault();
//   // let good = {
//   //   'name' : document.getElementById('name').value,
//   //   'price' : document.getElementById('price').value,
//   //   // 'img_source' : document.getElementById('img').value,
//   //   'id' : id
//   // }
//
//
//
//   const good = new FormData();
//   good.set('name', document.getElementById('name').value);
//   good.set('price', document.getElementById('price').value);
//   good.set('id', id);
//   good.set('img', (document.getElementsByName('plant_img')[0]).files[0]);
//
//   fetch('./script/php/add.php', {
//     method: "POST",
//     body: good
//     // headers:{
//     //   "Content-Type" : "application/json; charset=utf-8"
//     // },
//     // body: JSON.stringify(good)
//   })
//     .then(response => {
//       return response.text();
//     })
//     .then(data => {
//       alert(data);
//       window.location.href = './shop.php';
//     })
// }






// let form = document.querySelector('.edit');
// let id = 0;
//
// if(storage.getItem("id") !== "null"){
//   id = storage.getItem("id");
//   fetch('./script/php/readsql.php?id='+id)
//     .then(response =>{
//       return response.json();
//     })
//     .then(data => {
//       document.getElementById('name').value = data['name'];
//       document.getElementById('price').value = data['price'];
//       // document.getElementById('img').value = data['img'];
//     });
//
//   document.getElementById('action_btn').textContent = " Изменить ";
//   storage.setItem("id", null);
// } else {
//   document.getElementById('action_btn').textContent = " Добавить ";
// }
//
// form.onsubmit = function (evt){
//   evt.preventDefault();
//   // let good = {
//   //   'name' : document.getElementById('name').value,
//   //   'price' : document.getElementById('price').value,
//   //   // 'img_source' : document.getElementById('img').value,
//   //   'id' : id
//   // }
//
//   let good = new FormData();
//   good.set('name', document.getElementById('name').value);
//   good.set('price', document.getElementById('price').value);
//   good.set('id', id);
//   good.set('img', (document.getElementsByName('plant_img'))[0].files[0]);
//
//   fetch('./script/php/add.php', {
//     method: "POST",
//     body: good
//     // headers:{
//     //   "Content-Type" : "application/json; charset=utf-8"
//     // },
//     // body: JSON.stringify(good)
//   })
//     .then(response => {
//     return response.text();
//   })
//     .then(data => {
//     alert(data);
//     window.location.href = './shop.php';
//   })
// }
//
//
