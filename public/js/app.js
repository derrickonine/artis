// animation de redirection (fade-out)
function redirectWithAnim(url) {
  document.documentElement.style.transition = 'opacity 0.45s ease';
  document.documentElement.style.opacity = '0';
  setTimeout(function(){ window.location.href = url; }, 450);
}

// attacher comportement pour liens .animate-redirect
document.addEventListener('DOMContentLoaded', function(){
  document.querySelectorAll('a.animate-redirect').forEach(function(a){
    a.addEventListener('click', function(e){
      e.preventDefault();
      redirectWithAnim(this.href);
    });
  });

  // Form validation for register: check required and password strength
  const registerForm = document.getElementById('registerForm');
  if (registerForm) {
    const pw = document.getElementById('password');
    const pwConfirm = document.getElementById('password_confirmation');
    const pwMeterFill = document.querySelector('.pw-meter-fill');

    function strengthScore(password) {
      let score = 0;
      if (password.length >= 8) score += 1;
      if (/[A-Z]/.test(password)) score += 1;
      if (/[a-z]/.test(password)) score += 1;
      if (/[0-9]/.test(password)) score += 1;
      if (/[@$!%*?&]/.test(password)) score += 1;
      return score; // 0 - 5
    }

    function updatePwMeter() {
      const s = strengthScore(pw.value);
      const percent = (s / 5) * 100;
      pwMeterFill.style.width = percent + '%';
      if (percent < 40) pwMeterFill.style.background = '#ef4444';
      else if (percent < 80) pwMeterFill.style.background = '#f59e0b';
      else pwMeterFill.style.background = '#10b981';
    }

    pw && pw.addEventListener('input', updatePwMeter);

    registerForm.addEventListener('submit', function(e){
      // check required inputs
      const required = registerForm.querySelectorAll('[required]');
      let ok = true;
      required.forEach(function(el){
        if (!el.value || el.value.trim() === '') {
          ok = false;
          el.classList.add('input-error');
        } else {
          el.classList.remove('input-error');
        }
      });

      // password rules
      if (pw && pwConfirm) {
        if (pw.value !== pwConfirm.value) {
          ok = false;
          alert('Les mots de passe ne correspondent pas.');
        }
        const s = strengthScore(pw.value);
        if (s < 4) { // require good strength
          ok = false;
          alert('Votre mot de passe doit contenir au moins 8 caractères, majuscule, minuscule, chiffre et caractère spécial.');
        }
      }

      if (!ok) {
        e.preventDefault();
        return false;
      }

      // otherwise allow submit (server-side will re-check)
      return true;
    });
  }
});
