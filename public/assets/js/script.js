



document.getElementById("updateBtn").onclick = function () {
  let inputs = document.querySelectorAll("#profileForm input");
  let select = document.querySelectorAll("#profileForm select");
  inputs.forEach((input) => (input.disabled = false));
  select.forEach((select) => (select.disabled = false));
  document.getElementById("saveBtn").style.display = "inline-block";
  document.getElementById("updateBtn").style.display = "none";
};

// document.addEventListener("DOMContentLoaded", () => {
//   document.getElementById("adminUpdateBtn").onclick = function () {
//     let fields = document.querySelectorAll(
//       "#productForm input, #productForm textarea"
//     );

//     fields.forEach(field => field.disabled = false);

//     document.getElementById("adminSaveBtn").style.display = "inline-block";
//     this.style.display = "none";
//   };
// });

// window.onload = function () {
//   console.log("window loaded");

//   const editBtn = document.getElementById("adminUpdateBtn");

//   if (!editBtn) {
//     console.log("❌ Edit button NOT found in DOM");
//     return;
//   }

//   console.log("✅ Edit button FOUND");

//   editBtn.onclick = function () {
//     alert("EDIT CLICKED");

//     const inputs = document.querySelectorAll("#productForm input");

//     inputs.forEach(input => {
//       input.disabled = false;
//     });

//     document.getElementById("adminSaveBtn").style.display = "inline-block";
//     editBtn.style.display = "none";
//   };
// };



// document.getElementById("updateBtn").onclick = function () {
  
//   let inputs = document.querySelectorAll("#productView input, #productView textarea");
//   inputs.forEach((input) => (input.disabled = false));

//   // Toggle buttons
//   document.getElementById("saveBtn").style.display = "inline-block";
//   document.getElementById("updateBtn").style.display = "none";
// };

// const logoutBtn = document.getElementById("logoutBtn");
// const deleteBtn = document.getElementById("deleteBtn");

// const profileBtn = document.getElementById("profileBtn");
// const searchBtn = document.getElementById("searchBtn");
// const searchBar = document.getElementById("searchBar");

// if ("/profile") {
//   logoutBtn.classList.remove("hide");
//   deleteBtn.classList.remove("hide");
//   productBtn.classList.remove("hide");

//   profileBtn.classList.add("hide");
//   searchBtn.classList.add("hide");
//   searchBar.classList.add("hide");
// } else {
//   logoutBtn.classList.add("hide");
//   deleteBtn.classList.add("hide");
// }
