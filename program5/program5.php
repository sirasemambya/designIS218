<?php

class shoe {
  private $brand;
  private $year;
  private $cost;
  function __construct($brand, $year, $cost) {
    $this->brand = $brand;
    $this->year = $year;
    $this->cost = $cost;
  }

  function getcost() {
    return $this->cost;
  }
  function getbrand() {
    return $this->brand;
  }

  function getyear() {
    return $this->year;
  }
}
class shoeFactory {
  public static function create($brand, $year, $cost) {
    return new shoe($brand, $year, $cost);
  }
}
class shoeDecorator {
  protected $shoe;
  protected $cost;
  public function __construct(shoe $shoe_in) {
    $this->shoe = $shoe_in;
    $this->resetcost();
  }
  function resetcost() {
    $this->cost = $this->shoe->getcost();
  }
  function showcost() {
    return $this->cost;
  }
}

class nikeshoe extends shoeDecorator {
  private $cd;

  public function __construct(shoeDecorator $cd_in) {
    $this->cd = $cd_in;
    $this->changebrand();
  }
  function changebrand() {
    $this->cd->cost = 'Nike';
  }
}
class adidasshoe extends shoeDecorator {
  private $cd;
  public function __construct(shoeDecorator $cd_in) {
    $this->cd = $cd_in;
    $this->changebrand();
  }
  function changebrand() {
    $this->cd->cost = 'Adidas';
  }
}
class pumashoe extends shoeDecorator {
  private $cd;
  public function __construct(shoeDecorator $cd_in) {
    $this->cd = $cd_in;
    $this->changebrand();
  }
  function changebrand() {
    $this->cd->cost = 'Puma';
  }
}
class costStrat {
  public $strategy = NULL;
  public function __construct(shoeDecorator $cd_in, $cost) {
    switch($cost) {
      case "puma":
        $this->strategy = new pumashoe($cd_in);
	break;
      case "nike":
        $this->strategy = new nikeshoe($cd_in);
	break;
      case "adidas":
        $this->strategy = new adidasshoe($cd_in);
	break;
      default:
        echo "The shoe is not in stock.";
    }
  }
}

$ourshoe = shoeFactory::create('nike', '1987', 'expensive');
$decorator = new shoeDecorator($ourshoe);
$cost = $_POST["brand"];
$paintedshoe = new costStrat($decorator, $brand);
echo 'Your shoe brand is ' . $decorator->showcost();
?>
