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

function profile_dropdown(){
  document.getElementById('profile_dropdown').classList.toggle("show");
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