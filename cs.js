
let grid = [' ',' ',' ',' ',' ',' ',' ',' ',' '];

let divs;

let gameOver = false;

let gameOn = false;

function onDivClick(index) {

      if(!gameOn)
        changeStateToGameOn();

      if(divs === undefined) {
            populateDivs();
      }

      if(!gameOver && grid[index] == ' ') {

        grid[index] = 'X';
        divs[index].textContent = 'X';

        $jsonData = JSON.parse(JSON.stringify(grid));

      $.ajax({
      type : 'POST',
      url : './play/ss.php',
      data : {
          'jsonData' : $jsonData
      },
      datatype : 'json',
      success : function ($response)
      {
        $data = JSON.parse($response);
        if($data.winner != '') {
                  if($data.winner == ' ')
                      document.getElementById("state").textContent = "It's a draw!";
                  else {
                      document.getElementById("state").textContent = "Winner is " + $data.winner + "!";
                  }
                  gameOver = true;
              }
              console.log($data)
              grid = $data.grid;
              for(var i = 0; i < 9; i++) {
                divs[i].textContent = grid[i];
              }
      }, false : function(e) {
            alert('failed');
        }

  });

        // $.post("play/ss.php", {grid}, function(resp) {
        //       //var resp = JSON.parse(response)
        //       if(resp.winner != '') {
        //           if(resp.winner == ' ')
        //               document.getElementById("state").textContent = "It's a draw!";
        //           else {
        //               document.getElementById("state").textContent = "Winner is " + resp.winner + "!";
        //           }
        //           gameOver = true;
        //       }
        //       console.log(resp)
        //       grid = resp.grid;
        //       for(var i = 0; i < 9; i++) {
        //         divs[i].textContent = grid[i];
        //       }
        // });

      }
}

function onSignUpClick() {

  var username = document.getElementById("username").value;
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;

  var userData = { username : username, email : email, password : password };

  var jsonData = JSON.stringify(userData);

  if(email == null || email == "" ) {
    $.ajax({
    type : 'POST',
    url : 'http://130.245.171.78/login/index.php',
    data : jsonData,
    datatype : 'json',
    success : function ($response)
    {
      $data = JSON.parse($response);
      console.log($data);

    }, false : function(e) {
          alert('failed');
      }

    });
  }
  else {
    $.ajax({
    type : 'POST',
    url : 'http://130.245.171.78/adduser',
    data : jsonData,
    datatype : 'json',
    success : function ($response)
    {
      $data = JSON.parse($response);
      console.log($data);

    }, false : function(e) {
          alert('failed');
      }

    });
  }

}

function onLogInClick() {
  var username = document.getElementById("logInUsername").value;
  var password = document.getElementById("logInPswd").value;

  var userData = { username : username, password : password };

  var jsonData = JSON.stringify(userData);

  $.ajax({
  type : 'POST',
  url : 'http://130.245.171.78/login/index.php',
  data : jsonData,
  datatype : 'json',
  success : function ($response)
  {
    $data = JSON.parse($response);
    console.log($data);


  }, false : function(e) {
        alert('failed');
    }

});
}

function onVerifyClick() {
  var email = document.getElementById("verifyEmail").value;
  var key = document.getElementById("verifyKey").value;

  var userData = { email : email, key : key };

  var jsonData = JSON.stringify(userData);

  $.ajax({
  type : 'POST',
  url : 'http://130.245.171.78/verify/index.php',
  data : jsonData,
  datatype : 'json',
  success : function ($response)
  {
    $data = JSON.parse($response);
    console.log($data);


  }, false : function(e) {
        alert('failed');
    }

});
}

function changeStateToGameOn() {
    document.getElementById("state").textContent = "Game on!";
    gameOn = true;
}

function populateDivs() {
      divs = new Array(9);
      for(var i = 0; i < 9; i++) {

        divs[i] = document.getElementById(i);

      }
}
