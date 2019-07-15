// var rIndex,
//     table = document.getElementById("table");
//
// function checkEmptyInput() {
//     var isEmpty = true,
//         cid = document.getElementById("#cid").value,
//         fname = document.getElementById("#fname").value,
//         lname = document.getElementById("#lname").value,
//         caddress = document.getElementById("#caddress").value,
//         cnumber = document.getElementById("#cnumber").value;
//
//     if(cid ===  ""){
//         alert("Customer ID Can not be Empty");
//         isEmpty = true;
//     }
//     else if(fname === ""){
//         alert("First Name Can not be Empty");
//         isEmpty = true;
//     }
//     else if (lname === ""){
//         alert("Last Name Can not be Empty");
//         isEmpty = true;
//     }
//     else if (caddress === ""){
//         alert("Customer Address can not be Empty");
//         isEmpty = true;
//     }
//     else  if (cnumber === ""){
//         alert("Contact Number Can not be Empty");
//         isEmpty = true;
//     }
//     return isEmpty;
// }
//
//
// function addCustomer() {
//     if (!checkEmptyInput) {
//     var newRow = table.insertRow(table.length),
//         cell1 = newRow.insertCell(0),
//         cell2 = newRow.insertCell(1),
//         cell3 = newRow.insertCell(2),
//         cell4 = newRow.insertCell(3),
//         cell5 = newRow.insertCell(4),
//         cid = document.getElementById("#cid").value,
//         fname = document.getElementById("#fname").value,
//         lname = document.getElementById("#lname").value,
//         caddress = document.getElementById("#caddress").value,
//         cnumber = document.getElementById("#cnumber").value;
//
//     cell1.innerHTML = cid;
//     cell2.innerHTML = fname;
//     cell3.innerHTML = lname;
//     cell4.innerHTML = caddress;
//     cell5.innerHTML = cnumber;
//
//     selectedRowToInput();
//     }
// }
// function selectedRowToInput() {
//
//     for (var i=0;i<table.rows.length;i++){
//         table.rows[i].onclick = function () {
//             rIndex=this.rowIndex;
//             document.getElementById("cid").value = this.cells[0].innerHTML;
//             document.getElementById("fname").value = this.cells[1].innerHTML;
//             document.getElementById("lname").value = this.cells[2].innerHTML;
//             document.getElementById("caddress").value = this.cells[3].innerHTML;
//             document.getElementById("cnumber").value = this.cells[4].innerHTML;
//         };
//     }
// }
// selectedRowToInput();
//
// function editCustomer() {
//     var cid = document.getElementById("cid").value,
//         fname = document.getElementById("fname").value,
//         lname = document.getElementById("lname").value,
//         caddress = document.getElementById("caddress").value,
//         cnumber = document.getElementById("cnumber").value;
//
//     table.rows[rIndex].cells[0].innerHTML = cid;
//     table.rows[rIndex].cells[1].innerHTML = fname;
//     table.rows[rIndex].cells[2].innerHTML = lname;
//     table.rows[rIndex].cells[3].innerHTML = caddress;
//     table.rows[rIndex].cells[4].innerHTML = cnumber;
// }
//
// function deleteCustomer() {
//     table.deleteRow(rIndex);
//
//
//     document.getElementById("cid").value = "" ;
//     document.getElementById("fname").value = "" ;
//     document.getElementById("lname").value = "" ;
//     document.getElementById("caddress").value = "" ;
//     document.getElementById("cnumber").value = "" ;
// }

// var rIndex,
//     table = document.getElementById("table");
//
// function addDataToTable() {
//     if (!checkEmptyDetails()) {
//         var newRow = table.insertRow(table.length),
//             // cells are depend on your table
//             cell1 = newRow.insertCell(0),
//             cell2 = newRow.insertCell(1),
//             cell3 = newRow.insertCell(2),
//             cell4 = newRow.insertCell(3),
//             cell5 = newRow.insertCell(4),
//
//
//             //here , use id to the input
//             ///=============================
//             //get values from input fields
//             cid = document.getElementById("cid").value,
//             fname = document.getElementById("fname").value,
//             lname = document.getElementById("lname").value,
//             caddress = document.getElementById("caddress").value,
//             cnumber = document.getElementById("cnumber").value,
//
// // //set values to the table
// //             cell1.innerHTML = cid;
// //     cell2.innerHTML = fname;
// //     cell3.innerHTML = lname;
// //     cell4.innerHTML = caddress;
// //     cell5.innerHTML = cnumber;
// //
// //
// //
// //         selectedRow();
// //     }
// // }
//
//
// function selectedRow() {
//     for (var i = 1; i < table.rows.length; i++) {
//         table.rows[i].onclick = function () {
//             rIndex = this.rowIndex;
//             document.getElementById("cid").value = this.cells[0].innerHTML;
//             document.getElementById("fname").value = this.cells[1].innerHTML;
//             document.getElementById("lname").value = this.cells[2].innerHTML;
//             document.getElementById("caddress").value = this.cells[3].innerHTML;
//             document.getElementById("cnumber").value = this.cells[4].innerHTML;
//
//         };
//     }
// }
//
// selectedRow();
//
// function removeRow() {
//     table.deleteRow(rIndex);
//     document.getElementById("cid").value = "";
//     document.getElementById("fname").value = "";
//     document.getElementById("lname").value = "";
//     document.getElementById("caddress").value = "";
//     document.getElementById("cnumber").value = "";
//
// }
//
// function checkEmptyDetails() {
//     var isEmpty = false;
//     cid = document.getElementById("cid").value,
//         fname = document.getElementById("fname").value,
//         lname = document.getElementById("lname").value,
//         caddress = document.getElementById("caddress").value,
//         cNumber = document.getElementById("cnumber").value,
//
//
//     if (cid == "") {
//         alert("! Customer ID Cannot be  Empty ")
//         isEmpty = true;
//     }
//     if (fname == "") {
//         alert("! First Name Cannot be  Empty")
//         isEmpty = true;
//     }
//     if (lname == "") {
//         alert("! Last Name can not be  Empty")
//         isEmpty = true;
//     }
//     // if (
//     //     $("#btn-validation").click(function () {
//     //         var value = $("#cnumber").val();
//     //         var regEx = /\d{3}-\d{7}/;
//     //         var result = regEx.test(value);
//     //         if (!result) {
//     //             alert("Contact Number is Invalid");
//     //         }
//     //     })) ;
//     if (caddress == "") {
//         alert("! Customer Address Cannot Be Empty")
//         isEmpty = true;
//     }
//
//     if (cnumber == "") {
//         alert("! Contact Number Cannot Be Empty")
//         isEmpty = true;
//     }
//     return isEmpty;
// }
//
// function updatedetails() {
//     var cid = document.getElementById("cid").value,
//         fname = document.getElementById("fname").value,
//         lname = document.getElementById("lname").value,
//         caddress = document.getElementById("caddress").value,
//         cnumber = document.getElementById("cnumber").value;
//
//     if (!checkEmptyDetails()) {
//         table.rows[rIndex].cells[0].innerHTML = cid;
//         table.rows[rIndex].cells[1].innerHTML = fname;
//         table.rows[rIndex].cells[2].innerHTML = lname;
//         table.rows[rIndex].cells[3].innerHTML = caddress;
//         table.rows[rIndex].cells[4].innerHTML = cnumber;
//
//     }
// }
//
