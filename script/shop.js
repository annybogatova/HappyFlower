//works only on first .editItem
//rewrite add to cart with fetch

const edit_btn = document.querySelector('.editItem');
const delete_btn = document.querySelector('.deleteItem');

if(edit_btn !== null) {
  edit_btn.addEventListener('click', event => {
    const id = edit_btn.getAttribute('data-product-id');
    storage.setItem("id", id);
    window.location.href = './editItem.html';
  })
}

if(delete_btn !== null){
  delete_btn.addEventListener('click', event => {
    if(confirm("Удалить товар?")){
     let form = new FormData();
     form.set('id', delete_btn.getAttribute('data-product-id'));
     if (confirm("Удалить исходное фото с сервера?")) {
       form.set("delete-img", 'y');
     }
     const url = './script/php/deleteItem.php';
     const request = new Request(url, {
       method: 'POST',
       body: form,
     })

      fetch(request)
        .then(response => {
          return response.text();
        })
        .then(data => {
          console.log(data);
          location.reload();
        })
    }
  })
}

// let holder = document.querySelector('.plants__cards');
// let edit_btn;
//
// holder.onclick = function (evt){
//   let target = evt.target;
//   console.log('target');
//   while (target !== this){
//     if(target.className === 'editItem'){
//       let id = edit_btn.getAttribute('data-product-id');
//       storage.setItem("id", id);
//       alert('ye');
//       window.location.href = './editItem.html';
//     }
//   }
// }

// let edit_btn = document.querySelectorAll('.editItem');
// let addItem_btn = document.querySelector('.addGood');
//
// let btn_parent = document.querySelector('.plants__cards');
//
// function onClick(){
//   let id = edit_btn.getAttribute('data-product-id');
//   storage.setItem("id", id);
//   window.location.href = './editItem.html';
// }
//
// if (edit_btn !== null) {
//   edit_btn.forEach((button) => {
//     button.addEventListener('click', onClick);
//   });
// }
