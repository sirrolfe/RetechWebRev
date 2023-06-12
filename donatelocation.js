document.querySelectorAll('.choose-location').forEach(function(button) {
  button.addEventListener('click', function() {
      alert('You have chosen ' + this.previousElementSibling.previousElementSibling.textContent);
  });
});
