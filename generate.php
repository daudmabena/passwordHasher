<?php
  // Pulling _POST data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $for = $_POST['item'];

  // Generating keywords
  $keywords = array('excacerbate', 'diehard', 'trustworthy', 'complicated', 'encrypted', 'corrupted', 'amalgamate', 'rhetorical', 'necessary', 'unwilling', 'impatient');
  $symbols = array('!', '@', '#', '$','%', '^', '&', '*', '(', ')');
  $hashed = array();
  $which = rand(0, sizeOf($keywords));
  $keyword = $keyword[$which];
  $hash = md5($keyword);
  $data = array(
    'name' => str_split($name),
    'email' => str_split($email),
    'for' => str_split($for),
  );

  // Hashing process
  // Starting with the keywords
  $split = str_split($hash);
  for($i = 0; $i < rand(5, 10); $i++) {
    $which = rand(0, sizeOf($split));
    $md5_hash .= $split[$which];
  }

  // Moving to the provided info
  for($i = 0; $i < rand(2, 4); $i++) {
    foreach($data as $key => $value) {
      $which = rand(0, sizeOf($value));
      $str_hash .= $value[$offset];
    }
  }

  // And now the symbols
  for($i = 0; $i < rand(3, 5); $i++) {
    $which = rand(0, sizeOf($symbols));
    $sym_hash .= $symbols[$which];
  }

  $whichOnes = array('no', 'no', 'no');

  // Now to put it all together
  $hash = $md5_hash . $sym_hash . $str_hash;

  echo json_encode(array('result' => 'worked', 'password' => $hash,));
?>
