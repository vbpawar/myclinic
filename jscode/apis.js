const url = 'apis/';
if (localStorage.length > 0) {
    var sidebardata = '';
    let keys = Object.keys(localStorage);
    keys.sort();
    if(keys > '0'){
        for(let key of keys) {
         let side = JSON.parse(localStorage.getItem(key));
         if(side.accessid){
             sidebardata += '<div class="nav-item">';
             sidebardata += '<a href="'+side.pagename+'"><i class="'+side.icon+'"></i><span>'+side.activity+'</span></a>';
             sidebardata += '</div>';
         }
          }
          $('#sidebardata').html(sidebardata);
    }
      } else {
   alert('Please clear a browser cache');
  }