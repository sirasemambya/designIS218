<?php
class shoes {
  private $make;
  private $year;
  private $color;
  function __construct($make, $year, $color) {
    $this->make = $make;
    $this->year = $year;
    $this->color = $color;
  }

  function getMake() {
    return $this->make;
  }

  function getyear() {
    return $this->year;
  }
  function getColor() {
    return $this->color;
  }
  function getMakeAndYear() {
    return $this->getMake() . ' ' . $this->getyear();
  }
}
//factory
class shoeFactory {
  public static function create($make, $year, $color) {
    return new shoe($make, $year, $color);
  }
}
//decorator
class shoeDecorator {
  protected $shoe;
  protected $color;

  public function __construct(shoe $shoe_in) {
    $this->shoe = $shoe_in;
    $this->resetColor();
  }
  function resetColor() {
    $this->color = $this->shoe->getColor();
  }
  function showColor() {
    return $this->color;
  }
}
class redshoe extends shoeDecorator {
  private $cd;
  public function __construct(shoeDecorator $cd_in) {
    $this->cd = $cd_in;
    $this->changeColor();
  }
  function changeColor() {
    $this->cd->color = 'Red';
  }
}
class greenshoe extends shoeDecorator {
  private $cd;
  public function __construct(shoeDecorator $cd_in) {
    $this->cd = $cd_in;
    $this->changeColor();
  }
  function changeColor() {
    $this->cd->color = 'Green';
  }
}
class blueshoe extends shoeDecorator {
  private $cd;
  public function __construct(shoeDecorator $cd_in) {
    $this->cd = $cd_in;
    $this->changeColor();
  }
  function changeColor() {
    $this->cd->color = 'Blue';
  }
}


//strategy
class shoeStrat {
  public $strategy = NULL;
  public function __construct(shoeDecorator $cd_in, make) {
    switch($color) {
      case "nike":
        $this->strategy = new nikeshoe($cd_in);
	break;
      case "adidas":
        $this->strategy = new adidasshoe($cd_in);
	break;
      case "puma":
        $this->strategy = new pumashoe($cd_in);
	break;
      default:
        echo "We do not have that brand";
    }
  }
}

$ourshoe = shoeFactory::create('Nike', '1995', 'purple');
$decorator = new shoeDecorator($ourshoe);
$color = $_POST["make"];
$paintedshoe = new shoeStrat($decorator, $make);
echo '<br>';
echo 'Your shoes brand is ' . $decorator-> showMake();
?>
