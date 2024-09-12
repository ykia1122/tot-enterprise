function openRegisterModal(){
    document.getElementById('signup-modal').style.display='block';
  }

  function closeRegisterModal(){
    document.getElementById('signup-modal').style.display='none';
  }

  function openLoginModal(){
    document.getElementById('login-modal').style.display='block';
  }

  function closeLoginModal(){
    document.getElementById('login-modal').style.display='none';
  }

function openProfileModal(){
  document.getElementById('profile-modal').style.display='block';
}

function closeProfileModal(){
  document.getElementById('profile-modal').style.display='none';
}

function editEmail(){
    document.getElementById('chgemail').disabled = false;
}

function editUname(){
  document.getElementById('chguname').disabled = false;
}

function openPasswordModal(){
  document.getElementById('password-modal').style.display='block';
}

function closePasswordModal(){
  document.getElementById('password-modal').style.display='none';
}

function minusItem(){
  if(document.getElementById('quantity').value -1 > 0)
      document.getElementById('quantity').value--;
  else
      document.getElementById('quantity').value = 1;
}


function plusItem(){
  if(document.getElementById('quantity').value ++ < document.getElementById("max-quan").value)
      document.getElementById('quantity').value;
  else
      document.getElementById('quantity').value = document.getElementById("max-quan").value;
}

function openCartModal(){
  document.getElementById('cart-modal').style.display='block';
}

function closeCartModal(){
  document.getElementById('cart-modal').style.display='none';
}
