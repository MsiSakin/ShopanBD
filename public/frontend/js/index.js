// $(document).ready(function () {
//     // MDB Lightbox Init
//     $(function () {
//       $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
//     });
//   });

  //Cart counter
  var counter=document.querySelector('.counter');
  let count=0;
  function changeCounter(button) {
    if(button == plus){
      count +=1;
    }
    else if(button == minus){
      if(count>0){
        count -=1 ;
      }
      
    }
    counter.innerHTML=count;
  }