var button_load = document.getElementById("btn_load");
var content = document.getElementById("div_content");

if(button_load){
  button_load.addEventListener("click",function(){
   //Load JSON
    var request = new XMLHttpRequest();
    request.open('GET','http://localhost/wordpress/wp-json/wp/v2/posts');
    request.onload = function(){
      if(request.status >= 200 && request.status <400){
        var data = JSON.parse(request.responseText);
        console.log("đã có dữ liệu");
      }else{
        console.log("đã kết nối đến server, nhưng có lỗi");
      }
    };
    request.onerror = function(){
    console.log("kết nối thất bại");
 };
 request.send();
 });
}