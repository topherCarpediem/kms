$("#user-profile").click(function(){
  $("#editProfile").modal("show")
  //console.log("hey")
})

$("#submit_pass").click(function(){

  let old_password = document.getElementById('old_password')
  let password_1 = document.getElementById('password_1')
  let password_2 = document.getElementById('password_2')
  
  let data = {
    old_password: old_password.value,
    password_1: password_1.value,
    password_2: password_2.value
  }

  let http = new XMLHttpRequest()
  http.onreadystatechange = function(){
    if(http.status == 200 && http.readyState == 4){
      if(http.response.status != 'Password successfully changed.'){
        let response = JSON.parse(http.response)
        $("#status").html("<p class='alert alert-danger'>"+ response.status +"<p>")
        setTimeout(function() {
          $("#status").html('')
        }, 3000);
      }else{
        $("#status").html("<p class='alert alert-success'>"+ response.status +"<p>")
        setTimeout(function() {
          $("#status").html('')
        }, 3000);
      }
    }
  }

  http.open('post', 'changepass.php')
  http.send(JSON.stringify(data))

    old_password.value = ""
    password_1.value = ""
    password_2.value = ""
})