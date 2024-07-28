<?php
// 課題1 カード残高計算プログラム

$input_first_line = trim(fgets((STDIN)));
$input_first_line = str_replace(array("\r\n", "\r", "\n"), '', $input_first_line);

// 1行目の取得を初期残高と乗車回数へ分割代入
[$initial_amount, $ride_count] = explode(" ", $input_first_line);

$results = [];

$sapica = new Sapica($initial_amount);

for ($i = 0; $i < $ride_count; $i++) {
  $amount = trim(fgets(STDIN));
  $amount = str_replace(array("\r\n", "\r", "\n"), '', $amount);

  $sapica->payment($amount);

  array_push($results, [$sapica->getAmount(), $sapica->getPoint()]);
}

foreach ($results as $result) {
  echo $result[0] . " " .  $result[1] . "\n";
}

class Sapica
{
  /**
   * @var int $amount カード内残高
   * @var int $point カード内ポイント
   * @var $point_rate 購入時のポイント変換レート
   */

  private $amount;
  private $point = 0;
  private $point_rate = 0.1;

  public function __construct($amount)
  {
    $this->amount = $amount;
  }

  /**
   * カード内の残高を取得する
   *
   * @return int
   */
  public function getAmount()
  {
    return $this->amount;
  }

  /**
   * カード内のポイントを取得する
   *
   * @return int
   */
  public function getPoint()
  {
    return $this->point;
  }

  /**
   * 購入処理
   * ポイントが購入額を上回っていた場合、ポイントを使用
   *
   * @param int $amount
   * @return void
   */
  public function payment($amount)
  {
    if ($this->point >= $amount) {
      $this->point -= $amount;
    } else {
      $this->point += $amount * $this->point_rate;
      $this->amount -= $amount;
    }
  }
}
