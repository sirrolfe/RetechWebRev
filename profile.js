window.onload = function() {
  // Fetch profile data
  fetch('getProfile.php')
  .then(response => response.json())
  .then(data => {
    // Set user data
    document.getElementById('fullName').innerText = data.FullName;
    document.getElementById('email').innerText = data.Email;
    document.getElementById('phoneNumber').innerText = data.PhoneNumber;
    document.getElementById('city').innerText = data.City;
    document.getElementById('userPic').src = data.Picture || 'default_pic.png'; // set default pic if no pic found
    document.getElementById('cityUpdate').value = data.City;
    document.getElementById('phoneNumberUpdate').value = data.PhoneNumber;
  })
  .catch((error) => {
    console.error('Error:', error);
  });

  // Form submission event
  document.getElementById('updateForm').addEventListener('submit', function(e) {
    e.preventDefault();
    // TODO: implement update functionality
  });

  // File input change event
  document.getElementById('profilePicInput').addEventListener('change', function() {
    // TODO: implement picture upload functionality
  });
}
