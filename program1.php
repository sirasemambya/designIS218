<?php
//factory, dec, strategy
class player {
  private $id;
  public $fname;
  public $lname;
  public $practicetime;
  public $time_in;
  public function __construct($id, $f_name, $l_name) {
    $this->id = $id;
    $this->fname = $f_name;
    $this->lname = $l_name;
  }

  public function get_ID() {
    return $this->id;
  }

  public function get_name() {
    return $this->lname . ', ' . $this->fname;
  }
}
class playerFact {
  public static function create($id, $f_name, $l_name) {
    return new player($id, $f_name, $l_name);
  }
}
class playerDec {
  protected $player;
  public function __construct(player $player_in) {
    $this->player = $player_in;
  }
  public function practice_time() {
    if($this->player->practicetime == TRUE) {
    } else {
      $this->player->practicetime = TRUE;
      $this->player->time_in = date('D');
      echo $this->player->fname . ' ' . $this->player->lname . ' came to practice on ' . $this->player->time_in;
    }
  }

}
class playerStrat {
  public $strategy = NULL;
  public function __construct(playerDec $dec_in, $command) {
    switch($command) {
      case "practicetime":
        $this->strategy = $dec_in->practice_time();
        break;

    }
  }
}
$player = playerFact::create('1', 'Vince', 'Carter');
$dec =  new playerDec($player);
$status = new playerStrat($dec, 'practicetime');

?>
