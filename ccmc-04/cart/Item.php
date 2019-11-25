<?php
/**
 * 商品クラス
 */
class Item {
	/**
	 * 属性
	 * @var string $name  商品名
	 * @var int    $price 価格
	 */
	private $name;
	private $price;

	/**
	 * コンストラクタ
	 * @param string $name  商品名
	 * @param int    $price 価格
	 */
	function __construct(string $name, int $price) {
		$this->name = $name;
		$this->price = $price;
	}

	/** アクセサメソッド群 */

	function setName(string $name):void {
		$this->name = $name;
	}
	function getName():string {
		return $this->name;
	}

	function setPrice(int $price):void {
		$this->price = $price;
	}
	function getPrice():string {
		return number_format($this->price);
	}
}
?>