/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var myRequest = new XMLHttpRequest();
var list =[];
myRequest.open('GET','getlist.php',false);
myRequest.send();
let data = JSON.parse(myRequest.responseText);

for (let key in data) {
    list.push(data[key]);
}
for (let i=0;i<list.length;i++){
    console.log(list[i]);
}
