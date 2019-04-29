/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
var myRequest = new XMLHttpRequest();
var list =[];
myRequest.open('GET','getlist.php',false);
myRequest.send();
let data = JSON.parse(myRequest.responseText);

for (let key in data) {
    list.push(data[key]);
}
console.log(list);
$(".list").autocomplete({source:list});
});
