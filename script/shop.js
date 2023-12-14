//works only on first .editItem

let edit_btn = document.querySelector('.editItem');
let addItem_btn = document.querySelector('.addGood');

if(edit_btn !== null) {
  edit_btn.onclick = function (evt) {
    let id = edit_btn.getAttribute('data-product-id');
    storage.setItem("id", id);
    window.location.href = './editItem.php';
  }
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
//       window.location.href = './editItem.php';
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
//   window.location.href = './editItem.php';
// }
//
// if (edit_btn !== null) {
//   edit_btn.forEach((button) => {
//     button.addEventListener('click', onClick);
//   });
// }
