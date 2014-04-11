<?php
// Inputs
?>
<!DOCTYPE html>
<html>
  <head>
    <? require 'templates/header.add' ?>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="page-header">
          <h1>Password Generator <small>All fields are required</small>
        </div>
        <p>This password generator works by mixing all of the given elements in a random order plus a secret key word that will be displayed with the password. Uses date, time, given fields, keyword, and part of an MD5 hash.</p>
        <p>This information is not saved</p>
        <form class="form">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email">
          </div>
          <div class="form-group">
            <label for="itemName">Password is for</label>
            <input type="text" class="form-control" id="itemName">
          </div>
        </form>
        <button class="btn btn-primary col-lg-12 btn-block btn-large generate">Generate</button>
        <div class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h3>Password</h3>
              </div>
              <div class="modal-body">
                <div class="success hide">
                  <p class="password"></p>
                  <button class="btn btn-info" id="copy">Copy Password</button>
                </div>
                <div class="fail hide">
                  
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-large btn-success pull-left" data-dismiss="modal">Done</button>
                <button class="btn btn-large btn-warning pull-right generate">Regenerate
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      $(document).ready(function() {
        $('.generate').click(function() {
          $.post('generate.php', {name: $('#name').val(), email: $('#email').val(), item: $('#itemName').val()})
          .done(function(data) {
            var returned = $.parseJSON(data);
            $('.modal').modal('show');
            if(returned.result == "worked") {
              $('.success').removeClass('hide');
              $('.password').text(returned.password);
              $('.keyword').text(returned.keyword);
            } else {
              $('.fail').removeClass('hide');
              $('.fail').text('<p>' + returned.reason + '</p>');
            }
          });
        });
      });
    </script>
  </body>
</html>
