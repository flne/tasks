<?php 
	class rectangle {
		private $a;
		private $b;
		public function __construct($m) {
			$this->a = $m['a'];
			$this->b = $m['b'];
    	}
		public function area() {
			return $this->a * $this->b;
		}
		public function get($s) {
			echo "Прямоугольник, сторона a = $this->a, b = $this->b, площадь = $s<br>";
		}
	}
	class triangle {
		private $a;
		private $b;
		private $c;
		public function __construct($m) {
			$this->a = $m['a'];
			$this->b = $m['b'];
			$this->c = $m['c'];
    	}
		public function area() {
			return 0.25 * sqrt(($this->a + $this->b + $this->c) * ($this->b + $this->c - $this->a) * ($this->a + $this->c - $this->b) * ($this->a + $this->b - $this->c));
		}
		public function get($s) {
			echo "Треугольник, сторона a = $this->a, b = $this->b, c = $this->c, площадь = $s<br>";
		}
	}
	class circle {
		private $radius;
		public function __construct($m) {
			$this->radius = $m['radius'];
    	}
		public function area() {
			return 2 * M_PI * $this->radius;
		}	
		public function get($s) {
			echo "Круг, радиус = $this->radius, площадь = $s<br>";
		}	
	}

	$decode = json_decode(file_get_contents('figures.json'), true);

	foreach ($decode as $k => $v) {
		$figures[] = new $v['type']($v);
		$areas[] = $figures[$k]->area(); 
	}

	array_multisort($areas, SORT_DESC, $figures);

	foreach ($decode as $k => $v) 
		$figures[$k]->get($areas[$k]);
	