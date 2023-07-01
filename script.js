document.getElementById('healthReportForm').addEventListener('submit', function(event) {
    event.preventDefault();
    var form = document.getElementById('healthReportForm');
    var formData = new FormData(form);

    // Send the form data to PHP using AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'insert.php', true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        alert(xhr.responseText); // Show the response from PHP
      }
    };
    xhr.send(formData);
  });