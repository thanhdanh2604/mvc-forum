document.getElementById('submit_button').addEventListener("click", send_link)
function send_link(){
  var value = document.querySelector('[type="month"]').value
  var year = value.slice(0,4);
  var month = value.slice(5,7);
  if(window.location.hostname=='localhost'){
    link ='http://localhost/mvc-summary/';
  }else{
    link ='https://'+window.location.hostname+'/';
  }
  var fulllink = link + 'report_monthly/trang_chu' +'/'+month+'/'+year
  window.location.href= fulllink;
}