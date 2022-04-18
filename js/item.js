var x;

function checkitem(){
  x = document.getElementById('itemname').innerHTML;
  alert(x);
 window.location.href="shopping.php?data=" +x;
  
}