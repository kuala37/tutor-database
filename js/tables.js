$(document).ready(function() {
  $('form').submit(function(e) {
    e.preventDefault();
    var firstName = $('#inputFirstName').val();
    var lastName = $('#inputLastName').val();
    var username = $('#inputUsername').val();
    var newRow = '<tr><td>#</td><td>' + firstName + '</td><td>' + lastName + '</td><td>' + username + '</td></tr>';
$('table tbody').append(newRow);
$('form')[0].reset();
});
});