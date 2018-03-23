<?php

if(empty($_POST)) {

        // init game status with empty JSON array
        header('Content-Type: application/json');
        $data = '{ "grid" : [" "," "," "," "," ","X"," "," "," "], "winner" : " "}';
        echo ($data);

} else {

  //header('Content-Type: application/json');

  $grid = $_POST['jsonData'];

  // IF 'X' WINS
  if (
    // HORIZONTAL WINS
       ($grid[0] == 'X' && $grid[1] =='X' && $grid[2] == 'X') ||
       ($grid[3] == 'X' && $grid[4] =='X' && $grid[5] == 'X') ||
       ($grid[6] == 'X' && $grid[7] =='X' && $grid[8] == 'X') ||
    // DIAGONAL WINS
       ($grid[0] == 'X' && $grid[4] =='X' && $grid[8] == 'X') ||
       ($grid[2] == 'X' && $grid[4] =='X' && $grid[6] == 'X') ||
    // VERTICAL WINS
       ($grid[0] == 'X' && $grid[3] =='X' && $grid[6] == 'X') ||
       ($grid[1] == 'X' && $grid[4] =='X' && $grid[7] == 'X') ||
       ($grid[2] == 'X' && $grid[5] =='X' && $grid[8] == 'X')

        ) {

          $response['winner'] = 'X';

       }
        // IF 'O' WINS
        else if (
          // HORIZONTAL WINS
             ($grid[0] == 'O' && $grid[1] =='O' && $grid[2] == 'O') ||
             ($grid[3] == 'O' && $grid[4] =='O' && $grid[5] == 'O') ||
             ($grid[6] == 'O' && $grid[7] =='O' && $grid[8] == 'O') ||
          //DIAGONAL WINS
             ($grid[0] == 'O' && $grid[4] =='O' && $grid[8] == 'O') ||
             ($grid[2] == 'O' && $grid[4] =='O' && $grid[6] == 'O') ||
          //VERTICAL WINS
             ($grid[0] == 'O' && $grid[3] =='O' && $grid[6] == 'O') ||
             ($grid[1] == 'O' && $grid[4] =='O' && $grid[7] == 'O') ||
             ($grid[2] == 'O' && $grid[5] =='O' && $grid[8] == 'O')
        ){

            $response['winner'] = 'O';

        }

        else if(isDraw($grid)) {

            $response['winner'] = ' ';

        }

        else {

          foreach($grid as &$value ) {
            if ($value == ' ') {
                $value = 'O';
                break;
              }
          }

          if(
            // HORIZONTAL WINS
               ($grid[0] == 'O' && $grid[1] =='O' && $grid[2] == 'O') ||
               ($grid[3] == 'O' && $grid[4] =='O' && $grid[5] == 'O') ||
               ($grid[6] == 'O' && $grid[7] =='O' && $grid[8] == 'O') ||
            //DIAGONAL WINS
               ($grid[0] == 'O' && $grid[4] =='O' && $grid[8] == 'O') ||
               ($grid[2] == 'O' && $grid[4] =='O' && $grid[6] == 'O') ||
            //VERTICAL WINS
               ($grid[0] == 'O' && $grid[3] =='O' && $grid[6] == 'O') ||
               ($grid[1] == 'O' && $grid[4] =='O' && $grid[7] == 'O') ||
               ($grid[2] == 'O' && $grid[5] =='O' && $grid[8] == 'O')

          ) {
            $response['winner'] = 'O';
          }
          else {
            $response['winner'] = '';
          }


        }

        $response['grid'] = $grid;

    echo json_encode($response);

}


function isDraw($grid) {

  foreach($grid as $value ) {
    if ($value == ' ')
      return false;
  }

   return true;
}
 ?>
