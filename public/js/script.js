function togglePasswordVisibility() {
  const passwordInput = document.getElementById('password');
  const togglePassword = document.getElementById('togglePassword');

  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    togglePassword.classList.remove('fa-eye');
    togglePassword.classList.add('fa-eye-slash');
  } else {
    passwordInput.type = 'password';
    togglePassword.classList.remove('fa-eye-slash');
    togglePassword.classList.add('fa-eye');
  }
}
document.getElementById('icon-trigger').addEventListener('click', function() {
  document.getElementById('modal').style.display = 'block';
});

document.getElementById('close-modal').addEventListener('click', function() {
  document.getElementById('modal').style.display = 'none';
});
