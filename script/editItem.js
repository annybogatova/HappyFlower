let form = document.querySelector('.edit');
let id= 0;

if(storage.getItem("id") !== null){
  id = storage.getItem("id");
  fetch('./script/php/readsql.php?id='+id)
    .then(response =>{
      return response.json();
    })
    .then(data => {
      document.getElementById('name').value = data['name'];
      document.getElementById('price').value = data['price'];
      document.getElementById('img').value = data['img'];
    });

  document.getElementById('action_btn').textContent = " Изменить ";
  storage.setItem("id", null);
}

form.onsubmit = function (evt){
  evt.preventDefault();
  let good = {
    'name' : document.getElementById('name').value,
    'price' : document.getElementById('price').value,
    'img_source' : document.getElementById('img').value,
    'id' : id
  }
  fetch('/script/php/add.php', {
    method: "post",
    headers:{
      "Content-Type" : "application/json; charset=utf-8"
    },
    body: JSON.stringify(good)
  })
    .then(response => {
    return response.text();
  })
    .then(data => {
    alert(data);
    window.location.href = './shop.php';
  })
}


