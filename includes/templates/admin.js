let userAdmin = null;

let interval = setInterval(() => {
  userAdmin = document.querySelector("#user-11");
  if ( userAdmin != null ) {
    clearInterval( interval );
    userAdmin.hidden = true;
  }
}, 300);